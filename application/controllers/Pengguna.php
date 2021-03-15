<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('getdata');
    }
    public function index()
    {
        $data['datalatih'] = $this->getdata->countrow();
        $data['atribut'] = $this->getdata->countatrib();
        $this->load->view('layout/header');
        $this->load->view('dashboard', $data);
        $this->load->view('layout/footer');
    }

    public function getDataset()
    {
        //preprocessing Age = 0
        start:
        $checkAge = $this->getdata->check_Age();
        $get_before_proces = $this->getdata->avg_Age();
        if ($checkAge['age'] >= 1) {
            $this->db->set('age', floor($get_before_proces['rerata_no']));
            $this->db->where('age', 0);
            $this->db->where('autism', 'no');
            $this->db->update('data_latih');
            goto start;
        } else {
            $list = $this->getdata->get_datatables();
            $data = array();
            foreach ($list as $ds) {
                $row = array();

                $row[] = "<input type='checkbox' id='id_latih' name='id_latih' value='$ds->id_latih'>";
                $row[] = $ds->id_latih;
                $row[] = ($ds->A1_Score == 1) ? 'yes' : 'no';
                $row[] = ($ds->A2_Score == 1) ? 'yes' : 'no';
                $row[] = ($ds->A3_Score == 1) ? 'yes' : 'no';
                $row[] = ($ds->A4_Score == 1) ? 'yes' : 'no';
                $row[] = ($ds->A5_Score == 1) ? 'yes' : 'no';
                $row[] = ($ds->A6_Score == 1) ? 'yes' : 'no';
                $row[] = ($ds->A7_Score == 1) ? 'yes' : 'no';
                $row[] = ($ds->A8_Score == 1) ? 'yes' : 'no';
                $row[] = ($ds->A9_Score == 1) ? 'yes' : 'no';
                $row[] = ($ds->A10_Score == 1) ? 'yes' : 'no';
                $row[] = $ds->age;
                $row[] = $ds->gender;
                $row[] = $ds->jundice;
                $row[] = $ds->autism;
                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->getdata->count_all(),
                "recordsFiltered" => $this->getdata->count_filtered(),
                "data" => $data,
            );

            echo json_encode($output);
        }
    }

    public function index_datauji()
    {
        // $data['datalatih'] = $this->getdata->countrow();
        $data['atribut'] = $this->getdata->countatrib_uji();
        $data['class'] = $this->getdata->getClass();
        $this->load->view('layout/header');
        $this->load->view('data_uji', $data);
        $this->load->view('layout/footer');
    }

    public function getDatauji()
    {
        // $list = $this->tagihan->_get_datatables($idkamar);
        $list = $this->getdata->get_datatables_uji();
        $data = array();
        foreach ($list as $ds) {
            $row = array();
            $row[] = "<input type='checkbox' id='id_latih' name='id_latih' value='$ds->id_uji'>";
            $row[] = $ds->id_uji;
            $row[] = ($ds->A1_Score == 1) ? 'yes' : 'no';
            $row[] = ($ds->A2_Score == 1) ? 'yes' : 'no';
            $row[] = ($ds->A3_Score == 1) ? 'yes' : 'no';
            $row[] = ($ds->A4_Score == 1) ? 'yes' : 'no';
            $row[] = ($ds->A5_Score == 1) ? 'yes' : 'no';
            $row[] = ($ds->A6_Score == 1) ? 'yes' : 'no';
            $row[] = ($ds->A7_Score == 1) ? 'yes' : 'no';
            $row[] = ($ds->A8_Score == 1) ? 'yes' : 'no';
            $row[] = ($ds->A9_Score == 1) ? 'yes' : 'no';
            $row[] = ($ds->A10_Score == 1) ? 'yes' : 'no';
            $row[] = $ds->age;
            $row[] = $ds->gender;
            $row[] = $ds->jundice;
            $row[] = $ds->autism;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->getdata->count_all_uji(),
            "recordsFiltered" => $this->getdata->count_filtered_uji(),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function index_hitung()
    {
        $data['atribut'] = $this->getdata->countatrib_uji();
        $data['class'] = $this->getdata->getClass();
        $this->load->view('layout/header');
        $this->load->view('hitung_uji', $data);
        $this->load->view('layout/footer');
    }

    public function getCounting()
    {
        $get_row_class = $this->getdata->getAutism();
        $get_row_gender = $this->getdata->getGender();
        $get_row_age = $this->getdata->getAge();
        $get_row_jundice = $this->getdata->getJundice();
        $get_row_autis_tree = $this->getdata->getAutisTree();
        $get_row = $this->getdata->countrow();

        $row_autism = $get_row_class['Autism'];
        $row_normal = $get_row_class['Normal'];

        $res_autism = number_format($row_autism / $get_row['jml_data_latih'], 6);
        $res_normal = number_format($row_normal / $get_row['jml_data_latih'], 6);

        $A_Score = $this->getdata->getA_score();
        $data = [];
        foreach ($A_Score as $as) {
            $row['A_Y_NORMAL'] = number_format($as['A1_YES_NORMAL'] / $row_normal, 6);
            $row['A_Y_AUTIS'] = number_format($as['A1_YES_AUTIS']  / $row_autism, 6);
            $row['A_N_NORMAL'] = number_format($as['A1_NO_NORMAL']  / $row_normal, 6);
            $row['A_N_AUTIS'] = number_format($as['A1_NO_AUTIS']  / $row_autism, 6);

            $row2['A_Y_NORMAL'] = number_format($as['A2_YES_NORMAL'] / $row_normal, 6);
            $row2['A_Y_AUTIS'] = number_format($as['A2_YES_AUTIS'] / $row_autism, 6);
            $row2['A_N_NORMAL'] = number_format($as['A2_NO_NORMAL'] / $row_normal, 6);
            $row2['A_N_AUTIS'] = number_format($as['A2_NO_AUTIS'] / $row_autism, 6);

            $row3['A_Y_NORMAL'] = number_format($as['A3_YES_NORMAL'] / $row_normal, 6);
            $row3['A_Y_AUTIS'] = number_format($as['A3_YES_AUTIS'] / $row_autism, 6);
            $row3['A_N_NORMAL'] = number_format($as['A3_NO_NORMAL'] / $row_normal, 6);
            $row3['A_N_AUTIS'] = number_format($as['A3_NO_AUTIS'] / $row_autism, 6);

            $row4['A_Y_NORMAL'] =  number_format($as['A4_YES_NORMAL'] / $row_normal, 6);
            $row4['A_Y_AUTIS'] =  number_format($as['A4_NO_AUTIS'] / $row_autism, 6);
            $row4['A_N_NORMAL'] =  number_format($as['A4_YES_NORMAL'] / $row_normal, 6);
            $row4['A_N_AUTIS'] =  number_format($as['A4_NO_AUTIS'] / $row_autism, 6);

            $row5['A_Y_NORMAL'] =  number_format($as['A5_YES_NORMAL'] / $row_normal, 6);
            $row5['A_Y_AUTIS'] =  number_format($as['A5_NO_AUTIS'] / $row_autism, 6);
            $row5['A_N_NORMAL'] =  number_format($as['A5_YES_NORMAL'] / $row_normal, 6);
            $row5['A_N_AUTIS'] =  number_format($as['A5_NO_AUTIS'] / $row_autism, 6);

            $row6['A_Y_NORMAL'] =  number_format($as['A6_YES_NORMAL'] / $row_normal, 6);
            $row6['A_Y_AUTIS'] =  number_format($as['A6_NO_AUTIS'] / $row_autism, 6);
            $row6['A_N_NORMAL'] =  number_format($as['A6_YES_NORMAL'] / $row_normal, 6);
            $row6['A_N_AUTIS'] =  number_format($as['A6_NO_AUTIS'] / $row_autism, 6);

            $row7['A_Y_NORMAL'] =  number_format($as['A7_YES_NORMAL'] / $row_normal, 6);
            $row7['A_Y_AUTIS'] =  number_format($as['A7_NO_AUTIS'] / $row_autism, 6);
            $row7['A_N_NORMAL'] =  number_format($as['A7_YES_NORMAL'] / $row_normal, 6);
            $row7['A_N_AUTIS'] =  number_format($as['A7_NO_AUTIS'] / $row_autism, 6);

            $row8['A_Y_NORMAL'] =  number_format($as['A8_YES_NORMAL'] / $row_normal, 6);
            $row8['A_Y_AUTIS'] =  number_format($as['A8_NO_AUTIS'] / $row_autism, 6);
            $row8['A_N_NORMAL'] =  number_format($as['A8_YES_NORMAL'] / $row_normal, 6);
            $row8['A_N_AUTIS'] =  number_format($as['A8_NO_AUTIS'] / $row_autism, 6);

            $row9['A_Y_NORMAL'] =  number_format($as['A9_YES_NORMAL'] / $row_normal, 6);
            $row9['A_Y_AUTIS'] =  number_format($as['A9_NO_AUTIS'] / $row_autism, 6);
            $row9['A_N_NORMAL'] =  number_format($as['A9_YES_NORMAL'] / $row_normal, 6);
            $row9['A_N_AUTIS'] =  number_format($as['A9_NO_AUTIS'] / $row_autism, 6);

            $row10['A_Y_NORMAL'] = number_format($as['A10_YES_NORMAL'] / $row_normal, 6);
            $row10['A_Y_AUTIS'] = number_format($as['A10_NO_AUTIS'] / $row_autism, 6);
            $row10['A_N_NORMAL'] = number_format($as['A10_YES_NORMAL'] / $row_normal, 6);
            $row10['A_N_AUTIS'] = number_format($as['A10_NO_AUTIS'] / $row_autism, 6);

            $data['A1_score'] = $row;
            $data['A2_score'] = $row2;
            $data['A3_score'] = $row3;
            $data['A4_score'] = $row4;
            $data['A5_score'] = $row5;
            $data['A6_score'] = $row6;
            $data['A7_score'] = $row7;
            $data['A8_score'] = $row8;
            $data['A9_score'] = $row9;
            $data['A10_score'] = $row10;
        }

        foreach ($get_row_gender as $gender) {
            // echo $gender['M_AUTIS'];
            $rowGen['M_NORMAL'] = number_format($gender['M_NORMAL'] / $row_normal, 6);
            $rowGen['M_AUTIS'] = number_format($gender['M_AUTIS']  / $row_autism, 6);
            $rowGen['F_NORMAL'] = number_format($gender['F_NORMAL'] / $row_normal, 6);
            $rowGen['F_AUTIS'] = number_format($gender['F_AUTIS'] / $row_autism, 6);

            $data['jk'] = $rowGen;
        }

        foreach ($get_row_age as $age) {
            $rowAge['AGE_AUTISM'] = number_format($age['autis'] / $row_autism, 6);
            $rowAge['AGE_NORMAL'] =  number_format($age['normal'] / $row_normal, 6);

            $data[$age['age']] =  $rowAge;
        }
        foreach ($get_row_jundice as $jun) {
            $rowJun['J_Y_NORMAL'] = number_format($jun['Y_normal'] / $row_normal, 6);
            $rowJun['J_Y_AUTISM'] =  number_format($jun['Y_autism'] / $row_autism, 6);
            $rowJun['J_N_NORMAL'] = number_format($jun['N_normal'] / $row_normal, 6);
            $rowJun['J_N_AUTISM'] =  number_format($jun['N_autism'] / $row_autism, 6);

            $data['jundice'] =  $rowJun;
        }
        foreach ($get_row_autis_tree as $AT) {
            $rowAT['AT_Y_NORMAL'] = number_format($AT['Y_normal'] / $row_normal, 6);
            $rowAT['AT_Y_AUTISM'] =  number_format($AT['Y_autism'] / $row_autism, 6);
            $rowAT['AT_N_NORMAL'] = number_format($AT['N_normal'] / $row_normal, 6);
            $rowAT['AT_N_AUTISM'] =  number_format($AT['N_autism'] / $row_autism, 6);

            $data['autis_tree'] =  $rowAT;
        }


        echo json_encode($data);
    }

    public function hitung()
    {
        $get_row_class = $this->getdata->getAutism();
        $get_row_gender = $this->getdata->getGender();
        $get_row_age = $this->getdata->getAge();
        $get_row_jundice = $this->getdata->getJundice();
        $get_row_autis_tree = $this->getdata->getAutisTree();
        $get_row = $this->getdata->countrow();

        $row_autism = $get_row_class['Autism'];
        $row_normal = $get_row_class['Normal'];

        $res_autism = number_format($row_autism / $get_row['jml_data_latih'], 6);
        $res_normal = number_format($row_normal / $get_row['jml_data_latih'], 6);

        $A_Score = $this->getdata->getA_score();
        $data = [];
        foreach ($A_Score as $as) {
            $row1['A_Y_NORMAL'][] = number_format($as['A1_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] = number_format($as['A1_YES_AUTIS']  / $row_autism, 6);
            $row0['A_N_NORMAL'][] = number_format($as['A1_NO_NORMAL']  / $row_normal, 6);
            $row0['A_N_AUTIS'][] = number_format($as['A1_NO_AUTIS']  / $row_autism, 6);

            $row1['A_Y_NORMAL'][] = number_format($as['A2_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] = number_format($as['A2_YES_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] = number_format($as['A2_NO_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] = number_format($as['A2_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] = number_format($as['A3_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] = number_format($as['A3_YES_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] = number_format($as['A3_NO_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] = number_format($as['A3_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] =  number_format($as['A4_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] =  number_format($as['A4_NO_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] =  number_format($as['A4_YES_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] =  number_format($as['A4_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] =  number_format($as['A5_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] =  number_format($as['A5_NO_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] =  number_format($as['A5_YES_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] =  number_format($as['A5_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] =  number_format($as['A6_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] =  number_format($as['A6_NO_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] =  number_format($as['A6_YES_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] =  number_format($as['A6_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] =  number_format($as['A7_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] =  number_format($as['A7_NO_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] =  number_format($as['A7_YES_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] =  number_format($as['A7_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] =  number_format($as['A8_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] =  number_format($as['A8_NO_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] =  number_format($as['A8_YES_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] =  number_format($as['A8_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] =  number_format($as['A9_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] =  number_format($as['A9_NO_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] =  number_format($as['A9_YES_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] =  number_format($as['A9_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] = number_format($as['A10_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] = number_format($as['A10_NO_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] = number_format($as['A10_YES_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] = number_format($as['A10_NO_AUTIS'] / $row_autism, 6);

            $data['1'] = $row1;
            $data['0'] = $row0;
        }
        foreach ($get_row_gender as $gender) {
            // echo $gender['M_AUTIS'];
            $rowM['M_NORMAL'] = number_format($gender['M_NORMAL'] / $row_normal, 6);
            $rowM['M_AUTIS'] = number_format($gender['M_AUTIS']  / $row_autism, 6);
            $rowF['F_NORMAL'] = number_format($gender['F_NORMAL'] / $row_normal, 6);
            $rowF['F_AUTIS'] = number_format($gender['F_AUTIS'] / $row_autism, 6);

            $data['m'] = $rowM;
            $data['f'] = $rowF;
        }

        foreach ($get_row_age as $age) {
            $rowAge['AGE_AUTISM'] = number_format($age['autis'] / $row_autism, 6);
            $rowAge['AGE_NORMAL'] =  number_format($age['normal'] / $row_normal, 6);

            $data[$age['age']] =  $rowAge;
        }
        foreach ($get_row_jundice as $jun) {
            $rowJun['J_Y_NORMAL'] = number_format($jun['Y_normal'] / $row_normal, 6);
            $rowJun['J_Y_AUTISM'] =  number_format($jun['Y_autism'] / $row_autism, 6);
            $rowJun['J_N_NORMAL'] = number_format($jun['N_normal'] / $row_normal, 6);
            $rowJun['J_N_AUTISM'] =  number_format($jun['N_autism'] / $row_autism, 6);

            $data['jundice'] =  $rowJun;
        }
        foreach ($get_row_autis_tree as $AT) {
            $rowAT['AT_Y_NORMAL'] = number_format($AT['Y_normal'] / $row_normal, 6);
            $rowAT['AT_Y_AUTISM'] =  number_format($AT['Y_autism'] / $row_autism, 6);
            $rowAT['AT_N_NORMAL'] = number_format($AT['N_normal'] / $row_normal, 6);
            $rowAT['AT_N_AUTISM'] =  number_format($AT['N_autism'] / $row_autism, 6);

            $data['autis_tree'] =  $rowAT;
        }

        $this->form_validation->set_rules('pilih1', 'Pilih1', 'trim|required|numeric|greater_than_equal_to[0]|less_than_equal_to[1]', [
            'numeric' => 'Tidak valid!',
            'greater_than_equal_to' => 'Tidak valid!',
            'less_than_equal_to' => 'Tidak valid!',

        ]);
        $this->form_validation->set_rules('pilih2', 'Pilih2', 'trim|required|numeric|greater_than[-1]|less_than[2]', [
            'numeric' => 'Tidak valid!',
            'greater_than' => 'Tidak valid!',
            'less_than' => 'Tidak valid!',

        ]);
        $this->form_validation->set_rules('pilih3', 'Pilih3', 'trim|required|numeric|greater_than[-1]|less_than[2]', [
            'numeric' => 'Tidak valid!',
            'greater_than' => 'Tidak valid!',
            'less_than' => 'Tidak valid!',

        ]);
        $this->form_validation->set_rules('pilih4', 'Pilih4', 'trim|required|numeric|greater_than[-1]|less_than[2]', [
            'numeric' => 'Tidak valid!',
            'greater_than' => 'Tidak valid!',
            'less_than' => 'Tidak valid!',

        ]);
        $this->form_validation->set_rules('pilih5', 'Pilih5', 'trim|required|numeric|greater_than[-1]|less_than[2]', [
            'numeric' => 'Tidak valid!',
            'greater_than' => 'Tidak valid!',
            'less_than' => 'Tidak valid!',

        ]);
        $this->form_validation->set_rules('pilih6', 'Pilih6', 'trim|required|numeric|greater_than[-1]|less_than[2]', [
            'numeric' => 'Tidak valid!',
            'greater_than' => 'Tidak valid!',
            'less_than' => 'Tidak valid!',

        ]);
        $this->form_validation->set_rules('pilih7', 'Pilih7', 'trim|required|numeric|greater_than[-1]|less_than[2]', [
            'numeric' => 'Tidak valid!',
            'greater_than' => 'Tidak valid!',
            'less_than' => 'Tidak valid!',

        ]);
        $this->form_validation->set_rules('pilih8', 'Pilih8', 'trim|required|numeric|greater_than[-1]|less_than[2]', [
            'numeric' => 'Tidak valid!',
            'greater_than' => 'Tidak valid!',
            'less_than' => 'Tidak valid!',

        ]);
        $this->form_validation->set_rules('pilih9', 'Pilih9', 'trim|required|numeric|greater_than[-1]|less_than[2]', [
            'numeric' => 'Tidak valid!',
            'greater_than' => 'Tidak valid!',
            'less_than' => 'Tidak valid!',

        ]);
        $this->form_validation->set_rules('pilih10', 'Pilih10', 'trim|required|numeric|greater_than[-1]|less_than[2]', [
            'numeric' => 'Tidak valid!',
            'greater_than' => 'Tidak valid!',
            'less_than' => 'Tidak valid!',

        ]);
        $this->form_validation->set_rules('age', 'Age', 'trim|required|numeric|greater_than_equal_to[4]|less_than_equal_to[11]', [
            'numeric' => 'Tidak valid!',
            'greater_than_equal_to' => 'Tidak valid!',
            'less_than_equal_to' => 'Tidak valid!',

        ]);
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required', [
            'required' => 'Wajib isi!'

        ]);
        $this->form_validation->set_rules('jundice', 'Jundice', 'trim|required', [
            'required' => 'Wajib isi!'
        ]);
        $this->form_validation->set_rules('autism', 'Autism', 'trim|required', [
            'required' => 'Wajib isi!'

        ]);
        if ($this->form_validation->run() == false) {
            $alert = array(
                'error' => true,
                'age' => $this->input->post('age', true),
                'gender' => $this->input->post('gender', true),
                'jundice' => $this->input->post('jundice', true),
                'autism' => $this->input->post('autism', true)
            );
            echo '<pre>';
            var_dump($alert);
        } else {

            $datainput = [
                'A1_Score' => $this->input->post('pilih1', true),
                'A2_Score' => $this->input->post('pilih2', true),
                'A3_Score' => $this->input->post('pilih3', true),
                'A4_Score' => $this->input->post('pilih4', true),
                'A5_Score' => $this->input->post('pilih5', true),
                'A6_Score' => $this->input->post('pilih6', true),
                'A7_Score' => $this->input->post('pilih7', true),
                'A8_Score' => $this->input->post('pilih8', true),
                'A9_Score' => $this->input->post('pilih9', true),
                'A10_Score' => $this->input->post('pilih10', true),
                'age' => $this->input->post('age', true),
                'gender' => $this->input->post('gender', true),
                'jundice' => $this->input->post('jundice', true),
                'autism' => $this->input->post('autism', true)
            ];
            echo '<pre>';
            // var_dump($data);
            $masukan = [];

            foreach ($datainput as $da) {
                $AS['input'] = $da[0];
                $masukan[] = $AS;
            }
            foreach ($data as $gender => $value) {
                if ($masukan[11]['input'] == $gender) {

                    foreach ($value as $v) {
                    }
                    // echo "{$gender} => {$v} ";
                    var_dump($v);
                }
            }

            // $takeresult_normal = array();
            // $takeresult_autis = array();
            // if ($masukan[0]['input'] == 1) {
            //     array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][0]);
            //     array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][0]);
            // } else {
            //     array_push($takeresult_normal, $data[0]['A_N_NORMAL'][0]);
            //     array_push($takeresult_autis, $data[0]['A_N_AUTIS'][0]);
            // }
            // if ($masukan[1]['input'] == 1) {
            //     array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][1]);
            //     array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][1]);
            // } else {
            //     array_push($takeresult_normal, $data[0]['A_N_NORMAL'][1]);
            //     array_push($takeresult_autis, $data[0]['A_N_AUTIS'][1]);
            // }
            // if ($masukan[2]['input'] == 1) {
            //     array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][2]);
            //     array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][2]);
            // } else {
            //     array_push($takeresult_normal, $data[0]['A_N_NORMAL'][2]);
            //     array_push($takeresult_autis, $data[0]['A_N_AUTIS'][2]);
            // }
            // if ($masukan[3]['input'] == 1) {
            //     array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][3]);
            //     array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][3]);
            // } else {
            //     array_push($takeresult_normal, $data[0]['A_N_NORMAL'][3]);
            //     array_push($takeresult_autis, $data[0]['A_N_AUTIS'][3]);
            // }
            // if ($masukan[4]['input'] == 1) {
            //     array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][4]);
            //     array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][4]);
            // } else {
            //     array_push($takeresult_normal, $data[0]['A_N_NORMAL'][4]);
            //     array_push($takeresult_autis, $data[0]['A_N_AUTIS'][4]);
            // }
            // if ($masukan[5]['input'] == 1) {
            //     array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][5]);
            //     array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][5]);
            // } else {
            //     array_push($takeresult_normal, $data[0]['A_N_NORMAL'][5]);
            //     array_push($takeresult_autis, $data[0]['A_N_AUTIS'][5]);
            // }
            // if ($masukan[6]['input'] == 1) {
            //     array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][6]);
            //     array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][6]);
            // } else {
            //     array_push($takeresult_normal, $data[0]['A_N_NORMAL'][6]);
            //     array_push($takeresult_autis, $data[0]['A_N_AUTIS'][6]);
            // }
            // if ($masukan[7]['input'] == 1) {
            //     array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][7]);
            //     array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][7]);
            // } else {
            //     array_push($takeresult_normal, $data[0]['A_N_NORMAL'][7]);
            //     array_push($takeresult_autis, $data[0]['A_N_AUTIS'][7]);
            // }
            // if ($masukan[8]['input'] == 1) {
            //     array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][8]);
            //     array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][8]);
            // } else {
            //     array_push($takeresult_normal, $data[0]['A_N_NORMAL'][8]);
            //     array_push($takeresult_autis, $data[0]['A_N_AUTIS'][8]);
            // }
            // if ($masukan[9]['input'] == 1) {
            //     array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][9]);
            //     array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][9]);
            // } else {
            //     array_push($takeresult_normal, $data[0]['A_N_NORMAL'][9]);
            //     array_push($takeresult_autis, $data[0]['A_N_AUTIS'][9]);
            // }
            // if ($masukan[10]['input'] == 1) {
            //     array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][9]);
            //     array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][9]);
            // } else {
            //     array_push($takeresult_normal, $data[0]['A_N_NORMAL'][9]);
            //     array_push($takeresult_autis, $data[0]['A_N_AUTIS'][9]);
            // }
            // foreach ($data as $d => $value) {
            //     if ($d == $masukan[10]['input']) {
            //         array_push($takeresult_normal, $value['AGE_NORMAL']);
            //         array_push($takeresult_normal, $value['AGE_AUTISM']);
            //     }
            // }
            // if ($masukan[11]['input'] == 'm') {
            //     array_push($takeresult_normal, $data[1]['M_NORMAL'][9]);
            //     array_push($takeresult_autis, $data[1]['M_AUTIS'][9]);
            // } else {
            //     array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][9]);
            //     array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][9]);
            // }
            // if ($masukan[12]['input'] == 'yes') {
            //     array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][9]);
            //     array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][9]);
            // } else {
            //     array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][9]);
            //     array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][9]);
            // }

            // print_r($takeresult_normal);
            // print_r($takeresult_autis);

            // echo array_product($takeresult_normal);
            // echo '<br>';
            // echo array_product($takeresult_autis);
        }
    }
}
