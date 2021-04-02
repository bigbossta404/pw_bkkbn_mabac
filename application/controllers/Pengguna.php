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
        $data['title'] = 'ASD Site';

        // $this->load->view('layout/header');
        $this->load->view('dashboard', $data);
        // $this->load->view('layout/footer');
    }


    public function index_hitung()
    {
        $data['dataset'] = $this->getdata->countrow();
        $data['datauji'] = count($this->getdata->countDataUji());
        $data['datalatih'] = count($this->getdata->countDatalatih());
        $data['atribut'] = $this->getdata->countatrib_uji();
        $data['class'] = $this->getdata->getClass();
        $data['title'] = 'Deteksi ASD';

        $this->load->view('user_hitung', $data);
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
            $rowAge['AGE_AUTIS'] = number_format($age['autis'] / $row_autism, 6);
            $rowAge['AGE_NORMAL'] =  number_format($age['normal'] / $row_normal, 6);

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
        if ($this->input->post('visibleQ') == 0) {
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
        } elseif ($this->input->post('visibleQ') == 1) {
            $this->form_validation->set_rules('pilih1', 'Pilih1', 'trim|required|numeric|greater_than_equal_to[0]|less_than_equal_to[1]', [
                'numeric' => 'Tidak valid!',
                'greater_than_equal_to' => 'Tidak valid!',
                'less_than_equal_to' => 'Tidak valid!',

            ]);
        } elseif ($this->input->post('visibleQ') == 2) {
            $this->form_validation->set_rules('pilih2', 'Pilih3', 'trim|required|numeric|greater_than_equal_to[0]|less_than_equal_to[1]', [
                'numeric' => 'Tidak valid!',
                'greater_than_equal_to' => 'Tidak valid!',
                'less_than_equal_to' => 'Tidak valid!',

            ]);
        } elseif ($this->input->post('visibleQ') == 3) {
            $this->form_validation->set_rules('pilih3', 'Pilih3', 'trim|required|numeric|greater_than_equal_to[0]|less_than_equal_to[1]', [
                'numeric' => 'Tidak valid!',
                'greater_than_equal_to' => 'Tidak valid!',
                'less_than_equal_to' => 'Tidak valid!',

            ]);
        } elseif ($this->input->post('visibleQ') == 4) {
            $this->form_validation->set_rules('pilih4', 'Pilih4', 'trim|required|numeric|greater_than_equal_to[0]|less_than_equal_to[1]', [
                'numeric' => 'Tidak valid!',
                'greater_than_equal_to' => 'Tidak valid!',
                'less_than_equal_to' => 'Tidak valid!',

            ]);
        } elseif ($this->input->post('visibleQ') == 5) {
            $this->form_validation->set_rules('pilih5', 'Pilih5', 'trim|required|numeric|greater_than_equal_to[0]|less_than_equal_to[1]', [
                'numeric' => 'Tidak valid!',
                'greater_than_equal_to' => 'Tidak valid!',
                'less_than_equal_to' => 'Tidak valid!',

            ]);
        } elseif ($this->input->post('visibleQ') == 6) {
            $this->form_validation->set_rules('pilih6', 'Pilih6', 'trim|required|numeric|greater_than_equal_to[0]|less_than_equal_to[1]', [
                'numeric' => 'Tidak valid!',
                'greater_than_equal_to' => 'Tidak valid!',
                'less_than_equal_to' => 'Tidak valid!',

            ]);
        } elseif ($this->input->post('visibleQ') == 7) {
            $this->form_validation->set_rules('pilih7', 'Pilih7', 'trim|required|numeric|greater_than_equal_to[0]|less_than_equal_to[1]', [
                'numeric' => 'Tidak valid!',
                'greater_than_equal_to' => 'Tidak valid!',
                'less_than_equal_to' => 'Tidak valid!',

            ]);
        } elseif ($this->input->post('visibleQ') == 8) {
            $this->form_validation->set_rules('pilih8', 'Pilih8', 'trim|required|numeric|greater_than_equal_to[0]|less_than_equal_to[1]', [
                'numeric' => 'Tidak valid!',
                'greater_than_equal_to' => 'Tidak valid!',
                'less_than_equal_to' => 'Tidak valid!',

            ]);
        } elseif ($this->input->post('visibleQ') == 9) {
            $this->form_validation->set_rules('pilih9', 'Pilih9', 'trim|required|numeric|greater_than_equal_to[0]|less_than_equal_to[1]', [
                'numeric' => 'Tidak valid!',
                'greater_than_equal_to' => 'Tidak valid!',
                'less_than_equal_to' => 'Tidak valid!',

            ]);
        } elseif ($this->input->post('visibleQ') == 10) {
            $this->form_validation->set_rules('pilih10', 'Pilih10', 'trim|required|numeric|greater_than_equal_to[0]|less_than_equal_to[1]', [
                'numeric' => 'Tidak valid!',
                'greater_than_equal_to' => 'Tidak valid!',
                'less_than_equal_to' => 'Tidak valid!',

            ]);
        } else {
            $this->form_validation->set_rules('visibleQ', 'visibleQ', 'trim|required|numeric|greater_than_equal_to[11]|less_than_equal_to[12]', [
                'numeric' => 'Tidak valid!',
                'greater_than_equal_to' => 'Tidak valid!',
                'less_than_equal_to' => 'Tidak valid!',

            ]);
        }

        if ($this->form_validation->run() == false) {
            $alert = array(
                'error' => true,
            );
            echo json_encode($alert);
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
            if ($this->input->post('visibleQ') == 11) {
                $newYes = array();
                $newNo = array();
                $newAge = array();
                $newGen = array();
                $newJun = array();
                $newAutism = array();
                //--- sorting array ---
                $idx = 0;
                $n = [];
                $y = [];
                $age = [];
                $gen = [];
                $jun = [];
                $au = [];
                foreach ($datainput as $row => $v) {
                    if ($idx < 10 && $idx >= 0) {

                        if ($v == 1) {
                            if (array_key_exists($v, $data)) {
                                // echo json_encode($v);
                                $y[$row] = array($data[1]['A_Y_NORMAL'][$idx], $data[1]['A_Y_AUTIS'][$idx]);
                            }
                        }
                        if ($v == 0) {
                            if (array_key_exists($v, $data)) {
                                $n[$row] = array($data[0]['A_N_NORMAL'][$idx], $data[0]['A_N_AUTIS'][$idx]);
                            }
                        }
                    }
                    if ($idx >= 10 && $idx <= 10) {
                        if (array_key_exists($v, $data)) {
                            // echo json_encode($v);
                            $age[strval($v)] = array($data[$v]['AGE_NORMAL'], $data[$v]['AGE_AUTIS']);
                        }
                    }
                    if ($idx >= 11 && $idx <= 11) {
                        if (array_key_exists($v, $data)) {
                            // echo json_encode($v);
                            $gen[$v] = array($data[$v][strtoupper($v) . '_NORMAL'], $data[$v][strtoupper($v) . '_AUTIS']);
                        }
                    }
                    if ($idx >= 12 && $idx <= 12) {
                        if (array_key_exists('JUN_' . strtoupper($v), $data)) {
                            // echo json_encode($v);
                            $jun[key((array)$data['JUN_' . strtoupper($v)])] = array($data['JUN_' . strtoupper($v)]['J_' . strtoupper(substr($v, 0, 1)) . '_NORMAL'], $data['JUN_' . strtoupper($v)]['J_' . strtoupper(substr($v, 0, 1)) . '_AUTIS']);
                        }
                    }
                    if ($idx >= 13 && $idx <= 13) {
                        if (array_key_exists($v, $data)) {
                            // echo json_encode($v);
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

                $status_res = array();
                $totnormal = array();
                $totautis = array();
                $forClass = array();
                foreach ($res_Y as $k => $v) {
                    if (array_key_exists($k, $res_N)) {
                        // echo $v / ($v + $resA_N[$k]) + $resA_N[$k] / ($v + $resA_N[$k]) . '<br>';
                        $finish_y = $v / ($v + $res_N[$k]);
                        $finish_n = $res_N[$k] / ($v + $res_N[$k]);
                        array_push($totnormal, $finish_n);
                        array_push($totautis, $finish_y);
                        if ($finish_y > $finish_n) {
                            $status_res[] = 'Autisme';
                            $this->db->set('Class', 'YES');
                            $this->db->insert('data_uji_user', $datainput);
                            $insert_id = $this->db->insert_id();

                            $this->db->set('id_uji_user',  $insert_id);
                            $this->db->set('status_normal', $totnormal);
                            $this->db->set('status_autis', $totautis);
                            $this->db->set('hasil_status', 'ASD');
                            $this->db->set('time', 'NOW()', false);
                            $this->db->insert('hasil_uji');
                        } else {
                            $status_res[] = 'Normal';
                            $this->db->set('Class', 'NO');
                            $this->db->insert('data_uji_user', $datainput);
                            $insert_id = $this->db->insert_id();

                            $this->db->set('id_uji_user',  $insert_id);
                            $this->db->set('status_normal', $totnormal);
                            $this->db->set('status_autis', $totautis);
                            $this->db->set('hasil_status', 'Normal');
                            $this->db->set('time', 'NOW()', false);
                            $this->db->insert('hasil_uji');
                        }
                    }
                }

                //============= Pencocokan Hasil Prediksi Class Baru ====================

                $alert = array(
                    'status' => $status_res[0],
                    'totnormal' => $totnormal[0],
                    'totautis' => $totautis[0],
                );
                echo json_encode($alert);
                // echo json_encode($datainput);
            } else {
                $alert = array(
                    'next' => true,
                    'visible' => $this->input->post('visibleQ')
                );
                echo json_encode($alert);
            }
        }
    }
}
