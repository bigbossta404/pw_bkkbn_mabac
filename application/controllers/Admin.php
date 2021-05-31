<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require('./application/third_party/phpoffice/vendor/autoload.php');

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Admin extends CI_Controller
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
        if ($this->session->userdata('akses') == '1') {
            $data['datalatih'] = $this->getdata->countrow();
            $data['atribut'] = $this->getdata->countatrib();
            $data['user'] = $this->session->userdata();
            $this->load->view('layout/header', $data);
            $this->load->view('admin_v', $data);
            $this->load->view('layout/footer');
        } else {
            redirect('login');
        }
    }

    public function getDataset()
    {
        //preprocessing Age = 0
        start:
        $checkAge = $this->getdata->check_Age();
        $get_before_proces = $this->getdata->avg_Age();
        if ($checkAge['age'] >= 1) {
            $this->db->set('age', floor($get_before_proces['rerata_NO']));
            $this->db->where('age', 0);
            $this->db->where('Class', 'NO');
            $this->db->update('dataset');

            $this->db->set('age', floor($get_before_proces['rerata_YES']));
            $this->db->where('age', 0);
            $this->db->where('Class', 'YES');
            $this->db->update('dataset');
            goto start;
        } else {
            $list = $this->getdata->get_datatables();
            $data = array();
            foreach ($list as $ds) {
                $row = array();

                $row[] = "<input type='checkbox' id='id_latih' name='id_latih' value='$ds->id_dataset'>";
                $row[] = $ds->id_dataset;
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
                $row[] = ($ds->Class == 'NO') ? 'Normal' : 'ASD';
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
        if ($this->session->userdata('akses') == '1') {
            $totdl = $this->getdata->countDataUji();
            $getDataN = $this->getdata->getDataNo();
            $getDataY = $this->getdata->getDataYes();
            if (count($totdl) == 0) {
                $data = [];
                foreach ($getDataN as $n) {
                    unset($n['cnt'], $n['rn'], $n['ethnicity'], $n['contry_of_res'], $n['result'], $n['relation'], $n['used_app_before'], $n['age_desc']);
                    array_push($data, $n);
                }
                foreach ($getDataY as $y) {
                    unset($y['cnt'], $y['rn'], $y['ethnicity'], $y['contry_of_res'], $y['result'], $y['relation'], $y['used_app_before'], $y['age_desc']);
                    array_push($data, $y);
                }
                if (count($data) != 0) {
                    foreach ($data as $d) {
                        $d['id_uji'] = $d['id_dataset'];
                        unset($d['id_dataset']);
                        $this->db->insert('data_uji', $d);
                    }
                    $notInUji = $this->getdata->notInDataUji();
                    foreach ($notInUji as $notIn) {
                        $notIn['id_latih'] = $notIn['id_dataset'];
                        unset($notIn['id_dataset'], $notIn['ethnicity'], $notIn['contry_of_res'], $notIn['result'], $notIn['relation'], $notIn['used_app_before'], $notIn['age_desc']);
                        $this->db->insert('data_latih', $notIn);
                    }
                }
            }

            $data['atribut'] = $this->getdata->countatrib_uji();
            $data['class'] = $this->getdata->getClass();
            $data['user'] = $this->session->userdata();
            $this->load->view('layout/header', $data);
            $this->load->view('data_uji', $data);
            $this->load->view('layout/footer');
        } else {
            redirect('login');
        }
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
            $row[] = ($ds->Class == 'NO') ? 'Normal' : 'ASD';
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
    public function getDatalatih()
    {
        // $list = $this->tagihan->_get_datatables($idkamar);
        $list = $this->getdata->get_datatables_latih();
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
            $row[] = ($ds->Class == 'NO') ? 'Normal' : 'ASD';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->getdata->count_all_latih(),
            "recordsFiltered" => $this->getdata->count_filtered_latih(),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function index_hitung()
    {
        if ($this->session->userdata('akses') == '1') {
            $data['dataset'] = $this->getdata->countrow();
            $data['datauji'] = count($this->getdata->countDataUji());
            $data['datalatih'] = count($this->getdata->countDatalatih());
            $data['atribut'] = $this->getdata->countatrib_uji();
            $data['class'] = $this->getdata->getClass();
            $data['user'] = $this->session->userdata();
            $this->load->view('layout/header', $data);
            $this->load->view('hitung_uji', $data);
            $this->load->view('layout/footer');
        } else {
            redirect('login');
        }
    }

    public function getCounting()
    {
        $get_row_class = $this->getdata->getAutism();
        $get_row_gender = $this->getdata->getGender();
        $get_row_age = $this->getdata->getAge();
        $get_row_jundice = $this->getdata->getJundice();
        $get_row_autis_tree = $this->getdata->getAutisTree();
        $get_row = $this->getdata->countrow();
        
        //=========== Proses Deviasi Umur ========
        
        $AgeNo = $this->getdata->getAgeByNo();
        $AgeYes = $this->getdata->getAgeByYes();
        $countAge = $this->getdata->getCountAge();
        $meanAge = $this->getdata->getMeanAge();
        
        $sumNo_K = 0;
        $sumNo = 0;
       
        foreach($AgeNo as $an){
             $sumNo += $an['normal'];
             $sumNo_K += $an['normal'] * $an['normal'];
        }
        
        $sumYes_K = 0;
        $sumYes = 0;
        
        foreach($AgeYes as $ay){
            $sumYes += $ay['autis'];
            $sumYes_K += $ay['autis'] * $ay['autis'];
        }
        
        $sumKn = $sumNo * $sumNo;
        $sumKy = $sumYes * $sumYes;
        
        $sk_n = (($countAge['normal'] * $sumNo_K) - $sumKn) / ($countAge['normal'] * ($countAge['normal'] - 1));
        $sk_y = (($countAge['autis'] * $sumYes_K) - $sumKy) / ($countAge['autis'] * ($countAge['autis'] - 1));
        
        $sn_akar = number_format(sqrt($sk_n),6);
        $sy_akar = number_format(sqrt($sk_y),6);
        
        //========================================
        
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
            $row4['A_Y_AUTIS'] =  number_format($as['A4_YES_AUTIS'] / $row_autism, 6);
            $row4['A_N_NORMAL'] =  number_format($as['A4_NO_NORMAL'] / $row_normal, 6);
            $row4['A_N_AUTIS'] =  number_format($as['A4_NO_AUTIS'] / $row_autism, 6);

            $row5['A_Y_NORMAL'] =  number_format($as['A5_YES_NORMAL'] / $row_normal, 6);
            $row5['A_Y_AUTIS'] =  number_format($as['A5_YES_AUTIS'] / $row_autism, 6);
            $row5['A_N_NORMAL'] =  number_format($as['A5_NO_NORMAL'] / $row_normal, 6);
            $row5['A_N_AUTIS'] =  number_format($as['A5_NO_AUTIS'] / $row_autism, 6);

            $row6['A_Y_NORMAL'] =  number_format($as['A6_YES_NORMAL'] / $row_normal, 6);
            $row6['A_Y_AUTIS'] =  number_format($as['A6_YES_AUTIS'] / $row_autism, 6);
            $row6['A_N_NORMAL'] =  number_format($as['A6_NO_NORMAL'] / $row_normal, 6);
            $row6['A_N_AUTIS'] =  number_format($as['A6_NO_AUTIS'] / $row_autism, 6);

            $row7['A_Y_NORMAL'] =  number_format($as['A7_YES_NORMAL'] / $row_normal, 6);
            $row7['A_Y_AUTIS'] =  number_format($as['A7_YES_AUTIS'] / $row_autism, 6);
            $row7['A_N_NORMAL'] =  number_format($as['A7_NO_NORMAL'] / $row_normal, 6);
            $row7['A_N_AUTIS'] =  number_format($as['A7_NO_AUTIS'] / $row_autism, 6);

            $row8['A_Y_NORMAL'] =  number_format($as['A8_YES_NORMAL'] / $row_normal, 6);
            $row8['A_Y_AUTIS'] =  number_format($as['A8_YES_AUTIS'] / $row_autism, 6);
            $row8['A_N_NORMAL'] =  number_format($as['A8_NO_NORMAL'] / $row_normal, 6);
            $row8['A_N_AUTIS'] =  number_format($as['A8_NO_AUTIS'] / $row_autism, 6);

            $row9['A_Y_NORMAL'] =  number_format($as['A9_YES_NORMAL'] / $row_normal, 6);
            $row9['A_Y_AUTIS'] =  number_format($as['A9_YES_AUTIS'] / $row_autism, 6);
            $row9['A_N_NORMAL'] =  number_format($as['A9_NO_NORMAL'] / $row_normal, 6);
            $row9['A_N_AUTIS'] =  number_format($as['A9_NO_AUTIS'] / $row_autism, 6);

            $row10['A_Y_NORMAL'] = number_format($as['A10_YES_NORMAL'] / $row_normal, 6);
            $row10['A_Y_AUTIS'] = number_format($as['A10_YES_AUTIS'] / $row_autism, 6);
            $row10['A_N_NORMAL'] = number_format($as['A10_NO_NORMAL'] / $row_normal, 6);
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
            $rowAge['AGE_AUTISM'] = number_format((1 / sqrt(2 * 3.14 * $sy_akar**2)) * (2.72)**(-($age['age']-$meanAge['autis'])**2/(2*$sy_akar**2)), 6);
            $rowAge['AGE_NORMAL'] =  number_format((1 / sqrt(2 * 3.14 * $sn_akar**2)) * (2.72)**(-($age['age']-$meanAge['normal'])**2/(2*$sn_akar**2)), 6);

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
        
        $rowMean['MEAN_AUTISM'] = $meanAge['autis'];
        $rowMean['MEAN_NORMAL'] = $meanAge['normal'];
        $data['mean'] = $rowMean;
        
        $rowstdf['Stdf_AUTISM'] = $sy_akar;
        $rowstdf['Stdf_NORMAL'] = $sn_akar;
        $data['stdf'] = $rowstdf;
        
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
        
        //=========== Proses Deviasi Umur ========
        
        $AgeNo = $this->getdata->getAgeByNo();
        $AgeYes = $this->getdata->getAgeByYes();
        $countAge = $this->getdata->getCountAge();
        $meanAge = $this->getdata->getMeanAge();
        
        $sumNo_K = 0;
        $sumNo = 0;
       
        foreach($AgeNo as $an){
             $sumNo += $an['normal'];
             $sumNo_K += $an['normal'] * $an['normal'];
        }
        
        $sumYes_K = 0;
        $sumYes = 0;
        
        foreach($AgeYes as $ay){
            $sumYes += $ay['autis'];
            $sumYes_K += $ay['autis'] * $ay['autis'];
        }
        
        $sumKn = $sumNo * $sumNo;
        $sumKy = $sumYes * $sumYes;
        
        $sk_n = (($countAge['normal'] * $sumNo_K) - $sumKn) / ($countAge['normal'] * ($countAge['normal'] - 1));
        $sk_y = (($countAge['autis'] * $sumYes_K) - $sumKy) / ($countAge['autis'] * ($countAge['autis'] - 1));
        
        $sn_akar = sqrt($sk_n);
        $sy_akar = sqrt($sk_y);
        
        //=====================================

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
            $row1['A_Y_AUTIS'][] =  number_format($as['A4_YES_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] =  number_format($as['A4_NO_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] =  number_format($as['A4_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] =  number_format($as['A5_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] =  number_format($as['A5_YES_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] =  number_format($as['A5_NO_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] =  number_format($as['A5_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] =  number_format($as['A6_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] =  number_format($as['A6_YES_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] =  number_format($as['A6_NO_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] =  number_format($as['A6_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] =  number_format($as['A7_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] =  number_format($as['A7_YES_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] =  number_format($as['A7_NO_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] =  number_format($as['A7_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] =  number_format($as['A8_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] =  number_format($as['A8_YES_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] =  number_format($as['A8_NO_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] =  number_format($as['A8_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] =  number_format($as['A9_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] =  number_format($as['A9_YES_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] =  number_format($as['A9_NO_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] =  number_format($as['A9_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] = number_format($as['A10_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] = number_format($as['A10_YES_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] = number_format($as['A10_NO_NORMAL'] / $row_normal, 6);
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
             $rowAge['AGE_AUTISM'] = number_format((1 / sqrt(2 * 3.14 * $sy_akar**2)) * (2.72)**(-($age['age']-$meanAge['autis'])**2/(2*$sy_akar**2)), 6);
            $rowAge['AGE_NORMAL'] =  number_format((1 / sqrt(2 * 3.14 * $sn_akar**2)) * (2.72)**(-($age['age']-$meanAge['normal'])**2/(2*$sn_akar**2)), 6);

            $data[$age['age']] =  $rowAge;
        }
        foreach ($get_row_jundice as $jun) {
            $rowJunY['J_Y_NORMAL'] = number_format($jun['Y_normal'] / $row_normal, 6);
            $rowJunY['J_Y_AUTISM'] =  number_format($jun['Y_autism'] / $row_autism, 6);
            $rowJunN['J_N_NORMAL'] = number_format($jun['N_normal'] / $row_normal, 6);
            $rowJunN['J_N_AUTISM'] =  number_format($jun['N_autism'] / $row_autism, 6);

            $data['yes'] =  $rowJunY;
            $data['no'] =  $rowJunN;
        }
        foreach ($get_row_autis_tree as $AT) {
            $rowATY['AT_Y_NORMAL'] = number_format($AT['Y_normal'] / $row_normal, 6);
            $rowATY['AT_Y_AUTISM'] =  number_format($AT['Y_autism'] / $row_autism, 6);
            $rowATN['AT_N_NORMAL'] = number_format($AT['N_normal'] / $row_normal, 6);
            $rowATN['AT_N_AUTISM'] =  number_format($AT['N_autism'] / $row_autism, 6);

            $data['yes'] =  $rowATY;
            $data['no'] =  $rowATN;
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


            $gen = [];
            foreach ($data as $gender => $value) {
                if (stripos($gender, $masukan[11]['input']) === 0) {
                    foreach ($value as $key => $v) {
                        $gen[] = $v;
                    }
                }
            }
            $jun = [];
            foreach ($data as $jundice => $value) {
                if (stripos($jundice, $masukan[12]['input']) === 0) {
                    foreach ($value as $key => $v) {
                        $jun[] = $v;
                    }
                }
            }
            $AT = [];
            foreach ($data as $autismT => $value) {
                if (stripos($autismT, $masukan[13]['input']) === 0) {
                    foreach ($value as $key => $v) {
                        $AT[] = $v;
                    }
                }
            }

            // print_r($)
            $takeresult_normal = array();
            $takeresult_autis = array();
            if ($masukan[0]['input'] == 1) {
                array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][0]);
                array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][0]);
            } else {
                array_push($takeresult_normal, $data[0]['A_N_NORMAL'][0]);
                array_push($takeresult_autis, $data[0]['A_N_AUTIS'][0]);
            }
            if ($masukan[1]['input'] == 1) {
                array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][1]);
                array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][1]);
            } else {
                array_push($takeresult_normal, $data[0]['A_N_NORMAL'][1]);
                array_push($takeresult_autis, $data[0]['A_N_AUTIS'][1]);
            }
            if ($masukan[2]['input'] == 1) {
                array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][2]);
                array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][2]);
            } else {
                array_push($takeresult_normal, $data[0]['A_N_NORMAL'][2]);
                array_push($takeresult_autis, $data[0]['A_N_AUTIS'][2]);
            }
            if ($masukan[3]['input'] == 1) {
                array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][3]);
                array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][3]);
            } else {
                array_push($takeresult_normal, $data[0]['A_N_NORMAL'][3]);
                array_push($takeresult_autis, $data[0]['A_N_AUTIS'][3]);
            }
            if ($masukan[4]['input'] == 1) {
                array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][4]);
                array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][4]);
            } else {
                array_push($takeresult_normal, $data[0]['A_N_NORMAL'][4]);
                array_push($takeresult_autis, $data[0]['A_N_AUTIS'][4]);
            }
            if ($masukan[5]['input'] == 1) {
                array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][5]);
                array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][5]);
            } else {
                array_push($takeresult_normal, $data[0]['A_N_NORMAL'][5]);
                array_push($takeresult_autis, $data[0]['A_N_AUTIS'][5]);
            }
            if ($masukan[6]['input'] == 1) {
                array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][6]);
                array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][6]);
            } else {
                array_push($takeresult_normal, $data[0]['A_N_NORMAL'][6]);
                array_push($takeresult_autis, $data[0]['A_N_AUTIS'][6]);
            }
            if ($masukan[7]['input'] == 1) {
                array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][7]);
                array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][7]);
            } else {
                array_push($takeresult_normal, $data[0]['A_N_NORMAL'][7]);
                array_push($takeresult_autis, $data[0]['A_N_AUTIS'][7]);
            }
            if ($masukan[8]['input'] == 1) {
                array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][8]);
                array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][8]);
            } else {
                array_push($takeresult_normal, $data[0]['A_N_NORMAL'][8]);
                array_push($takeresult_autis, $data[0]['A_N_AUTIS'][8]);
            }
            if ($masukan[9]['input'] == 1) {
                array_push($takeresult_normal, $data[1]['A_Y_NORMAL'][9]);
                array_push($takeresult_autis, $data[1]['A_Y_AUTIS'][9]);
            } else {
                array_push($takeresult_normal, $data[0]['A_N_NORMAL'][9]);
                array_push($takeresult_autis, $data[0]['A_N_AUTIS'][9]);
            }

            foreach ($data as $d => $value) {
                if ($d == $this->input->post('age', true)) {
                    array_push($takeresult_normal, $value['AGE_NORMAL']);
                    array_push($takeresult_normal, $value['AGE_AUTISM']);
                }
            }
            if ($gen[0] != null) {
                array_push($takeresult_normal, $gen[0]);
            }
            if ($gen[1] != null) {
                array_push($takeresult_autis, $gen[1]);
            }
            if ($jun[0] != null) {
                array_push($takeresult_normal, $jun[0]);
            }
            if ($jun[1] != null) {
                array_push($takeresult_autis, $jun[1]);
            }
            if ($AT[0] != null) {
                array_push($takeresult_normal, $AT[0]);
            }
            if ($AT[1] != null) {
                array_push($takeresult_autis, $AT[1]);
            }

            $totnormal = array_product($takeresult_normal) * $row_normal;
            $totautis = array_product($takeresult_autis) * $row_autism;

            echo $totnormal . ' | Normal <br>';
            echo $totautis . ' | Autis <br>';
            echo '<hr>';
            if ($totnormal > $totautis) {
                echo 'Normal';
                $this->db->set('Class', 'NO');
                $this->db->insert('data_uji', $datainput);
                $insert_id = $this->db->insert_id();

                $this->db->set('id_uji',  $insert_id);
                $this->db->set('status_normal', $totnormal);
                $this->db->set('status_autis', $totautis);
                $this->db->set('hasil_status', 'Normal');
                $this->db->set('time', 'NOW()', false);
                $this->db->insert('hasil_uji');
            } else {
                echo 'Autism';
                $this->db->set('Class', 'YES');
                $this->db->insert('data_uji', $datainput);
                $insert_id = $this->db->insert_id();

                $this->db->set('id_uji',  $insert_id);
                $this->db->set('status_normal', $totnormal);
                $this->db->set('status_autis', $totautis);
                $this->db->set('hasil_status', 'ASD');
                $this->db->set('time', 'NOW()', false);
                $this->db->insert('hasil_uji');
            }
        }
    }

    public function Test()
    {
        $get_row_class = $this->getdata->getAutism();
        $get_row_gender = $this->getdata->getGender();
        $get_row_age = $this->getdata->getAge();
        $get_row_jundice = $this->getdata->getJundice();
        $get_row_autis_tree = $this->getdata->getAutisTree();
        $get_row = $this->getdata->countrow();
        
        //=========== Proses Deviasi Umur ========
        
        $AgeNo = $this->getdata->getAgeByNo();
        $AgeYes = $this->getdata->getAgeByYes();
        $countAge = $this->getdata->getCountAge();
        $meanAge = $this->getdata->getMeanAge();
        
        $sumNo_K = 0;
        $sumNo = 0;
       
        foreach($AgeNo as $an){
             $sumNo += $an['normal'];
             $sumNo_K += $an['normal'] * $an['normal'];
        }
        
        $sumYes_K = 0;
        $sumYes = 0;
        
        foreach($AgeYes as $ay){
            $sumYes += $ay['autis'];
            $sumYes_K += $ay['autis'] * $ay['autis'];
        }
        
        $sumKn = $sumNo * $sumNo;
        $sumKy = $sumYes * $sumYes;
        
        $sk_n = (($countAge['normal'] * $sumNo_K) - $sumKn) / ($countAge['normal'] * ($countAge['normal'] - 1));
        $sk_y = (($countAge['autis'] * $sumYes_K) - $sumKy) / ($countAge['autis'] * ($countAge['autis'] - 1));
        
        $sn_akar = sqrt($sk_n);
        $sy_akar = sqrt($sk_y);
        
        //========================================

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
            $row1['A_Y_AUTIS'][] =  number_format($as['A4_YES_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] =  number_format($as['A4_NO_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] =  number_format($as['A4_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] =  number_format($as['A5_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] =  number_format($as['A5_YES_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] =  number_format($as['A5_NO_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] =  number_format($as['A5_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] =  number_format($as['A6_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] =  number_format($as['A6_YES_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] =  number_format($as['A6_NO_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] =  number_format($as['A6_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] =  number_format($as['A7_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] =  number_format($as['A7_YES_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] =  number_format($as['A7_NO_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] =  number_format($as['A7_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] =  number_format($as['A8_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] =  number_format($as['A8_YES_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] =  number_format($as['A8_NO_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] =  number_format($as['A8_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] =  number_format($as['A9_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] =  number_format($as['A9_YES_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] =  number_format($as['A9_NO_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] =  number_format($as['A9_NO_AUTIS'] / $row_autism, 6);

            $row1['A_Y_NORMAL'][] = number_format($as['A10_YES_NORMAL'] / $row_normal, 6);
            $row1['A_Y_AUTIS'][] = number_format($as['A10_YES_AUTIS'] / $row_autism, 6);
            $row0['A_N_NORMAL'][] = number_format($as['A10_NO_NORMAL'] / $row_normal, 6);
            $row0['A_N_AUTIS'][] = number_format($as['A10_NO_AUTIS'] / $row_autism, 6);

            $data['1'] = $row1;
            $data['0'] = $row0;
        }
        foreach ($get_row_gender as $gender) {

            $rowM['M_NORMAL'] = number_format($gender['M_NORMAL'] / $row_normal, 6);
            $rowM['M_AUTIS'] = number_format($gender['M_AUTIS']  / $row_autism, 6);
            $rowF['F_NORMAL'] = number_format($gender['F_NORMAL'] / $row_normal, 6);
            $rowF['F_AUTIS'] = number_format($gender['F_AUTIS'] / $row_autism, 6);

            $data['m'] = $rowM;
            $data['f'] = $rowF;
        }

        foreach ($get_row_age as $age) {
            $rowAge['AGE_AUTIS'] = number_format((1 / sqrt(2 * 3.14 * $sy_akar**2)) * (2.72)**(-($age['age']-$meanAge['autis'])**2/(2*$sy_akar**2)), 6);
            $rowAge['AGE_NORMAL'] =  number_format((1 / sqrt(2 * 3.14 * $sn_akar**2)) * (2.72)**(-($age['age']-$meanAge['normal'])**2/(2*$sn_akar**2)), 6);

            $data[$age['age']] =  $rowAge;
        }
        
        foreach ($get_row_jundice as $jun) {
            $rowJunY['J_Y_NORMAL'] = number_format($jun['Y_normal'] / $row_normal, 6);
            $rowJunY['J_Y_AUTIS'] =  number_format($jun['Y_autism'] / $row_autism, 6);
            $rowJunN['J_N_NORMAL'] = number_format($jun['N_normal'] / $row_normal, 6);
            $rowJunN['J_N_AUTIS'] =  number_format($jun['N_autism'] / $row_autism, 6);

            $data['JUN_YES'] =  $rowJunY;
            $data['JUN_NO'] =  $rowJunN;
        }
        foreach ($get_row_autis_tree as $AT) {
            $rowATY['AT_Y_NORMAL'] = number_format($AT['Y_normal'] / $row_normal, 6);
            $rowATY['AT_Y_AUTIS'] =  number_format($AT['Y_autism'] / $row_autism, 6);
            $rowATN['AT_N_NORMAL'] = number_format($AT['N_normal'] / $row_normal, 6);
            $rowATN['AT_N_AUTIS'] =  number_format($AT['N_autism'] / $row_autism, 6);

            $data['yes'] =  $rowATY;
            $data['no'] =  $rowATN;
        }

        //================= Pengambilan Data Prediksi =====================

        $dt_uji = $this->getdata->countDataUji();

        $newYes = array();
        $newNo = array();
        $newAge = array();
        $newGen = array();
        $newJun = array();
        $newAutism = array();
        foreach ($dt_uji as $row) {
            $idx = -1;
            $n = [];
            $y = [];
            $age = [];
            $gen = [];
            $jun = [];
            $au = [];
            foreach ($row as $k => $v) {
                if ($idx < 10 && $idx >= -1) {

                    if ($v == 1) {
                        if (array_key_exists($v, $data)) {
                            $y[$k] = array($data[1]['A_Y_NORMAL'][$idx], $data[1]['A_Y_AUTIS'][$idx]);
                        }
                    }
                    if ($v == 0) {
                        if (array_key_exists($v, $data)) {
                            $n[$k] = array($data[0]['A_N_NORMAL'][$idx], $data[0]['A_N_AUTIS'][$idx]);
                        }
                    }
                }
                if ($idx >= 10 && $idx <= 10) {
                    if (array_key_exists($v, $data)) {
                        $age[strval($v)] = array($data[$v]['AGE_NORMAL'], $data[$v]['AGE_AUTIS']);
                    }
                }
                if ($idx >= 11 && $idx <= 11) {
                    if (array_key_exists($v, $data)) {
                        $gen[$v] = array($data[$v][strtoupper($v) . '_NORMAL'], $data[$v][strtoupper($v) . '_AUTIS']);
                    }
                }
                if ($idx >= 12 && $idx <= 12) {
                    if (array_key_exists('JUN_' . strtoupper($v), $data)) {
                        $jun[key((array)$data['JUN_' . strtoupper($v)])] = array($data['JUN_' . strtoupper($v)]['J_' . strtoupper(substr($v, 0, 1)) . '_NORMAL'], $data['JUN_' . strtoupper($v)]['J_' . strtoupper(substr($v, 0, 1)) . '_AUTIS']);
                    }
                }
                if ($idx >= 13 && $idx <= 13) {
                    if (array_key_exists($v, $data)) {
                        $au[$v] = array($data[$v]['AT_' . strtoupper(substr($v, 0, 1)) . '_NORMAL'], $data[$v]['AT_' . strtoupper(substr($v, 0, 1)) . '_AUTIS']);
                    }
                }
                $idx++;
            }
            array_push($newYes, $y);
            array_push($newNo, $n);
            array_push($newAge, $age);
            array_push($newGen, $gen);
            array_push($newJun, $jun);
            array_push($newAutism, $au);
        }

        $arrayTemp = array();
        $arrayTemp2 = array();
        $arrayTemp3 = array();
        $arrayTemp4 = array();
        $arrayTemp5 = array();
        foreach ($newYes as $key => $value) {
            $arrayTemp[] = (object)array_merge((array)$newNo[$key], (array)$value);
        }
        foreach ($arrayTemp as $key => $value) {
            $arrayTemp2[] = (object)array_merge((array)$newAge[$key], (array)$value);
        }
        foreach ($arrayTemp2 as $key => $value) {
            $arrayTemp3[] = (object)array_merge((array)$newGen[$key], (array)$value);
        }
        foreach ($arrayTemp3 as $key => $value) {
            $arrayTemp4[] = (object)array_merge((array)$newJun[$key], (array)$value);
        }
        foreach ($arrayTemp4 as $key => $value) {
            $arrayTemp5[] = (object)array_merge((array)$newAutism[$key], (array)$value);
        }

        $store_normal = [];
        $store_autis = [];

        foreach ($arrayTemp5 as $at) {
            $s_normal = array();
            $s_autis = array();
            foreach ($at as $key1 => $v2) {

                $s_normal[] = $v2[0];
                $s_autis[] = $v2[1];
            }
            array_push($store_normal, $s_normal);
            array_push($store_autis, $s_autis);
        }

        $res_N = [];
        $res_Y = [];
        foreach ($store_normal as $sn) {
            $res_N[] = array_product($sn) * $res_normal;
        }
        foreach ($store_autis as $sn) {
            $res_Y[] = array_product($sn) * $res_autism;
        }

        //=============== Memprediksi Class Baru =============

        $Autis = 0;
        $Normal = 0;
        $forClass = array();
        foreach ($res_Y as $k => $v) {
            if (array_key_exists($k, $res_N)) {
                // echo $v / ($v + $resA_N[$k]) + $resA_N[$k] / ($v + $resA_N[$k]) . '<br>';
                if ($v / ($v + $res_N[$k]) > $res_N[$k] / ($v + $res_N[$k])) {
                    $forClass[] = 'YES';
                    $Autis++;
                } else {
                    $forClass[] = 'NO';
                    $Normal++;
                }
            }
        }

        //============= Pencocokan Hasil Prediksi Class Baru ====================

        $cocok = 0;
        $salah = 0;
        $dt_benar = array();
        $dt_salah = array();
        foreach ($forClass as $k => $v) {
            if (isset($k, $dt_uji)) {
                if ($v == $dt_uji[$k]['Class']) {
                    $dt_benar[] = array('id' => $dt_uji[$k]['id_uji'], 'class' => $dt_uji[$k]['Class'], 'prediksi' => $v);
                    $cocok++;
                } else {
                    $dt_salah[] = array('id' => $dt_uji[$k]['id_uji'], 'class' => $dt_uji[$k]['Class'], 'prediksi' => $v);
                    $salah++;
                }
            }
        }


        $jum_predict_asd = 0;
        $jum_predict_normal = 0;
        if (isset($dt_salah)) {
            foreach ($dt_salah as $ds) {
                if ($ds['class'] == 'NO') {
                    $jum_predict_normal++;
                } elseif ($ds['class'] == 'YES') {
                    $jum_predict_asd++;
                }
            }
        }
        $tp = 0;
        $tn = 0;
        if (isset($dt_benar)) {
            foreach ($dt_benar as $db) {
                if ($db['class'] == 'NO') {
                    $tp++;
                } elseif ($db['class'] == 'YES') {
                    $tn++;
                }
            }
        }
        //============= Perhitungan Persentase Akurasi ====================

        $akurasi_normal = number_format(($Normal / ($Normal + $Autis)) * 100, 1);
        $akurasi_autis = number_format($Autis / ($Normal + $Autis) * 100, 1);
        $akurasi_benar = number_format($cocok / ($Normal + $Autis) * 100, 1);
        $akurasi_salah = number_format($salah / ($Normal + $Autis) * 100, 1);
        $akurasi_total = number_format(($tp + $tn) / ($tp + $jum_predict_asd + $jum_predict_normal + $tn) * 100, 1);
        $precision = $tp / ($tp + $jum_predict_asd);
        $precision_p = number_format($tp / ($tp + $jum_predict_asd) * 100, 1);
        $recall = $tp / ($tp + $jum_predict_normal);
        $recall_p = number_format($tp / ($tp + $jum_predict_normal) * 100, 1);
        $f1score = number_format((2 * $precision * $recall) / ($recall + $precision) * 100,1);

        $json  =  array(
            'normal' => $Normal,
            'autis' => $Autis,
            'cocok' => $cocok,
            'takcocok' => $salah,
            'akurasi_n' =>  $akurasi_normal,
            'akurasi_y' =>  $akurasi_autis,
            'akurasi_benar' =>  $akurasi_benar,
            'akurasi_salah' =>  $akurasi_salah,
            'dt_salah' => $dt_salah,
            'precision' => $precision_p,
            'totakurasi' => $akurasi_total,
            'recall' => $recall_p,
            'f1score' => $f1score,
            'tp' => $tp,
            'tn' => $tn,
            'fp' => $jum_predict_asd,
            'fn' => $jum_predict_normal,
            // 'sn_akar' => $sn_akar,
            // 'sy_akar' => $sy_akar,
            // 'mean_n' => $meanAge['normal'],
            // 'mean_y' => $meanAge['autis'],
        );
        echo json_encode($json);
    }

    public function index_riwayat()
    {
        if ($this->session->userdata('akses') == '1') {
            $data['user'] = $this->session->userdata();
            $this->load->view('layout/header', $data);
            $this->load->view('riwayatinput', $data);
            $this->load->view('layout/footer');
        } else {
            redirect('login');
        }
    }

    public function getDataRiwayat()
    {
        // $list = $this->tagihan->_get_datatables($idkamar);
        $list = $this->getdata->get_datatables_riwayat();
        $data = array();
        foreach ($list as $ds) {
            $row = array();
            $row[] = '<a href="#" class="btn_detail" data-toggle="modal" id="' . $ds->id_uji_user . '">' . $ds->id_uji_user . '</a>';
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
            $row[] = ($ds->Class == 'NO') ? 'Normal' : 'ASD';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->getdata->count_all_riwayat(),
            "recordsFiltered" => $this->getdata->count_filtered_riwayat(),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function resetriwayat()
    {
        if ($this->session->userdata('akses') == 1) {

            $this->db->empty_table('data_uji_user');
            $this->db->truncate('hasil_uji');
            $query = $this->db->query('ALTER TABLE data_uji_user AUTO_INCREMENT = 0 ');

            if ($query) {
                $alert = array('success' => true);
                echo json_encode($alert);
            } else {
                $alert = array('error' => true);
                echo json_encode($alert);
            }
        } else {
            redirect('login');
        }
    }

    public function getRiwayatData($idujiuser)
    {
        $detriwayat = $this->getdata->getriwayat($idujiuser);

        echo json_encode($detriwayat);
    }
}
