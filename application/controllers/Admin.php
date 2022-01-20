<?php

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
        if ($this->session->userdata('logged')) {
            $data['datalatih'] = $this->getdata->countrow();
            $data['atribut'] = $this->getdata->countatrib();
            $data['user'] = $this->session->userdata();
            $data['tag'] = 'Data Kriteria BKKBN';
            $this->load->view('layout/header', $data);
            $this->load->view('admin_v', $data);
            $this->load->view('layout/footer');
        } else {
            redirect('/');
        }
    }

    public function getDataset()
    {
        $list = $this->getdata->get_datatables();
        $data = array();
        foreach ($list as $ds) {
            $row = array();

            $row[] = $ds->id_kriteria;
            $row[] = ucwords($ds->nama);
            $row[] = $ds->menyusui;
            $row[] = $ds->hamil;
            $row[] = $ds->ku;
            $row[] = $ds->radang;
            $row[] = $ds->keputihan;
            $row[] = $ds->kuning;
            $row[] = $ds->tumor;
            $row[] = $ds->bb;
            $row[] = '<a href="#" class="btn btn-danger btnhapus" id="' . $ds->id_kriteria . '"><i class="fas fa-trash"></i></a>';
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


    public function hitungRanking()
    {
        if ($this->session->userdata('logged')) {
            $jml_data = $this->getdata->countrow();
            $getNama = $this->getdata->getNama();
            $max = $this->getdata->getMax();
            $min = $this->getdata->getMin();


            if (count($getNama) == 0) {
                $this->db->truncate('save_hitung');
                $data['terbanyak'] = array(
                    'alat' => 'Kosong',
                    'jum' => 0
                );
                $data['user'] = $this->session->userdata();
                $data['hasilData'] = $this->getdata->getHasil();
                $data['tag'] = 'Hasil Ranking';
                $this->load->view('layout/header', $data);
                $this->load->view('hitung', $data);
                $this->load->view('layout/footer');
            } else {
                // // Normalisasi Matriks Awal (x)
                $normalisasi_matrix = [];

                foreach ($getNama as $gn) {
                    $row['menyusui'] = ($gn['menyusui'] - $min['minnyusu']) / ($max['maxnyusu'] - $min['minnyusu']) * ($gn['menyusui'] - $max['maxnyusu']) / ($min['minnyusu'] - $max['maxnyusu']);
                    $row['hamil'] = ($gn['hamil'] - $min['minhamil']) / ($max['maxhamil'] - $min['minhamil']) * ($gn['hamil'] - $max['maxhamil']) / ($min['minhamil'] - $max['maxhamil']);
                    $row['ku'] = ($gn['ku'] - $min['minku']) / ($max['maxku'] - $min['minku'])  * ($gn['ku'] - $max['maxku']) / ($min['minku'] - $max['maxku']);
                    $row['radang'] = ($gn['radang'] - $min['minradang']) / ($max['maxradang'] - $min['minradang'])  * ($gn['radang'] - $max['maxradang']) / ($min['minradang'] - $max['maxradang']);
                    $row['keputihan'] = ($gn['keputihan'] - $min['minputih']) / ($max['maxputih'] - $min['minputih']) * ($gn['keputihan'] - $max['maxputih']) / ($min['minputih'] - $max['maxputih']);
                    $row['kuning'] = ($gn['kuning'] - $min['minkuning']) / ($max['maxkuning'] - $min['minkuning']) * ($gn['kuning'] - $max['maxkuning']) / ($min['minkuning'] - $max['maxkuning']);
                    $row['tumor'] = ($gn['tumor'] - $min['mintumor']) / ($max['maxtumor'] - $min['mintumor']) * ($gn['tumor'] - $max['maxtumor']) / ($min['mintumor'] - $max['maxtumor']);
                    $row['bb'] = ($gn['bb'] - $min['minbb']) / ($max['maxbb'] - $min['minbb']) * ($gn['bb'] - $max['maxbb']) / ($min['minbb'] - $max['maxbb']);

                    $normalisasi_matrix[$gn['nama']] = $row;
                }

                // //Ekstrak Data DB menjadi array sejenis
                $data = [];

                foreach ($getNama as $gn) {
                    $extract['menyusui'] = (int) $gn['menyusui'];
                    $extract['hamil'] = (int) $gn['hamil'];
                    $extract['ku'] = (int) $gn['ku'];
                    $extract['radang'] = (int) $gn['radang'];
                    $extract['keputihan'] = (int) $gn['keputihan'];
                    $extract['kuning'] = (int) $gn['kuning'];
                    $extract['tumor'] = (int) $gn['tumor'];
                    $extract['bb'] = (int) $gn['bb'];

                    $data[$gn['nama']] = $extract;
                }

                // Matriks matriks tertimbang (v)
                $matriks_terimbangV = array();

                foreach ($normalisasi_matrix as $nm => $v) {
                    $row2 = [];
                    foreach ($v as $k => $v2) {
                        $row2[] =  $data[$nm][$k] * $v2  + $data[$nm][$k];
                    }
                    array_push($matriks_terimbangV, $row2);
                }

                // matriks area perbatasan (G)
                foreach ($matriks_terimbangV as $g) {
                    $menyusui[] = $g[0];
                    $hamil[] = $g[1];
                    $ku[] = $g[2];
                    $radang[] = $g[3];
                    $keputihan[] = $g[4];
                    $kuning[] = $g[5];
                    $tumor[] = $g[6];
                    $bb[] = $g[7];
                }

                $jum_alternatif = $jml_data['jml_data'];
                $pangkat = 1 / $jum_alternatif;

                $databatas = array(
                    array_product($menyusui) ** $pangkat,
                    array_product($hamil) ** $pangkat,
                    array_product($ku) ** $pangkat,
                    array_product($radang) ** $pangkat,
                    array_product($keputihan) ** $pangkat,
                    array_product($kuning) ** $pangkat,
                    array_product($tumor) ** $pangkat,
                    array_product($bb) ** $pangkat
                );

                // Menghitung jarak alternatif
                $jarak_alternatif = [];
                $id = 0;
                foreach ($matriks_terimbangV as $mt) {
                    $row3['1'] = (float) number_format($mt[0] - $databatas[0], 1);
                    $row3['2'] = (float) number_format($mt[1] - $databatas[1], 1);
                    $row3['3'] = (float) number_format($mt[2] - $databatas[2], 1);
                    $row3['4'] = (float) number_format($mt[3] - $databatas[3], 1);
                    $row3['5'] = (float) number_format($mt[4] - $databatas[4], 1);
                    $row3['6'] = (float) number_format($mt[5] - $databatas[5], 1);
                    $row3['7'] = (float) number_format($mt[6] - $databatas[6], 1);
                    $row3['8'] = (float) number_format($mt[7] - $databatas[7], 1);
                    $jarak_alternatif[$getNama[$id]['nama']] = $row3;
                    $id++;
                }

                // Perankingan Finishing
                $data_rank = array();
                for ($i = 0; $i < count($jarak_alternatif); $i++) {
                    $setRank['nama'] = $getNama[$i]['nama'];
                    $setRank['nilai'] = (float) number_format(array_sum($jarak_alternatif[$getNama[$i]['nama']]), 1);

                    $data_rank[] = $setRank;
                }

                if (count($data_rank) > 0) {
                    $this->db->set('date', 'NOW()', FALSE);
                    $this->db->insert('log_hitung');
                    $getIdLog = $this->getdata->getIdLog();
                    foreach ($data_rank as $dt) {
                        $this->db->set('id_loghitung', $getIdLog['id_loghitung']);
                        $this->db->insert('save_hitung', $dt);
                    }
                }

                $getHasil = $this->getdata->getHasil();
                $alat = array();
                foreach ($getHasil as $gh) {
                    if ($gh['nilai'] <= 0.5) {
                        array_push($alat, 'IUD');
                    } elseif ($gh['nilai'] >= 0.6 && $gh['nilai'] <= 1.5) {
                        array_push($alat, 'Suntik');
                    } elseif ($gh['nilai'] >= 1.6) {
                        array_push($alat, 'Implan');
                    }
                }
                $count_alat = array_count_values($alat);
                arsort($count_alat);
                $data['terbanyak'] = array(
                    'alat' => key($count_alat),
                    'jum' => $count_alat[key($count_alat)]
                );

                // View Halaman Hitung
                $data['user'] = $this->session->userdata();
                $data['hasilData'] = $this->getdata->getHasil();
                $data['tag'] = 'Hasil Ranking';
                $this->load->view('layout/header', $data);
                $this->load->view('hitung', $data);
                $this->load->view('layout/footer');
                // echo '<pre>';
                // echo var_dump($data['terbanyak']);
            }
        } else {
            redirect('/');
        }
    }

    public function tambahData()
    {
        if ($this->session->userdata('logged')) {

            $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
                'required' => 'Tidak valid!',

            ]);
            $this->form_validation->set_rules('menyusui', 'Menyusui', 'trim|required', [
                'required' => 'Tidak valid!',

            ]);
            $this->form_validation->set_rules('hamil', 'Hamil', 'trim|required', [
                'required' => 'Tidak valid!',

            ]);
            $this->form_validation->set_rules('ku', 'Ku', 'trim|required', [
                'required' => 'Tidak valid!',

            ]);
            $this->form_validation->set_rules('radang', 'Radang', 'trim|required', [
                'required' => 'Tidak valid!',

            ]);
            $this->form_validation->set_rules('putih', 'Putih', 'trim|required', [
                'required' => 'Tidak valid!',

            ]);
            $this->form_validation->set_rules('kuning', 'Kuning', 'trim|required', [
                'required' => 'Tidak valid!',

            ]);
            $this->form_validation->set_rules('tumor', 'Tumor', 'trim|required', [
                'required' => 'Tidak valid!',

            ]);
            $this->form_validation->set_rules('bb', 'Bb', 'trim|required', [
                'required' => 'Tidak valid!',

            ]);
            if ($this->form_validation->run() == false) {
                $alert = array(
                    'error' => true,
                    'nama' => form_error('nama'),
                    'nyusu' => form_error('menyusui'),
                    'ku' => form_error('ku'),
                    'radang' => form_error('radang'),
                    'putih' => form_error('putih'),
                    'kun' => form_error('kuning'),
                    'tum' => form_error('tumor'),
                    'bb' => form_error('bb'),
                );
                echo json_encode($alert);
            } else {

                $data_insert = array(
                    'nama' => $this->input->post('nama'),
                    'menyusui' => $this->input->post('menyusui'),
                    'hamil' => $this->input->post('hamil'),
                    'ku' => $this->input->post('ku'),
                    'radang' => $this->input->post('radang'),
                    'keputihan' => $this->input->post('putih'),
                    'kuning' => $this->input->post('kuning'),
                    'tumor' => $this->input->post('tumor'),
                    'bb' => $this->input->post('bb'),
                );

                $submit_data = $this->getdata->saveTambah($data_insert);
                if ($submit_data) {
                    echo json_encode('sukses');
                } else {
                    echo json_encode('error');
                }
            }
        } else {
            redirect('/');
        }
    }
    public function deleteData($id)
    {
        if ($this->session->userdata('logged')) {
            $delete_data = $this->getdata->deleteData($id);
            if ($delete_data) {
                echo json_encode('sukses');
            } else {
                echo json_encode('error');
            }
        } else {
            redirect('/');
        }
    }
    public function datasetExcel()
    {
        if ($this->session->userdata('logged')) {
            $list = $this->getdata->getNama();
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->mergeCells('A1:G1');
            $sheet->setCellValue('A1', 'Bobot');
            $sheet->getStyle('A1:G1')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $sheet->setCellValue('A2', 'IdPasien');
            $sheet->setCellValue('B2', 'Nama Pasien');
            $sheet->setCellValue('C2', 'Menyusui');
            $sheet->setCellValue('D2', 'Hamil');
            $sheet->setCellValue('E2', 'Keadaan Umum');
            $sheet->setCellValue('F2', 'Radang');
            $sheet->setCellValue('G2', 'Keputihan');
            $sheet->setCellValue('H2', 'Kuning');
            $sheet->setCellValue('I2', 'Tumor');
            $sheet->setCellValue('J2', 'Berat Badan');
            $rows = 3;
            foreach ($list as $val) {
                $sheet->setCellValue('A' . $rows, $val['id_kriteria']);
                $sheet->setCellValue('B' . $rows, $val['nama']);
                $sheet->setCellValue('C' . $rows, $val['menyusui']);
                $sheet->setCellValue('D' . $rows, $val['hamil']);
                $sheet->setCellValue('E' . $rows, $val['ku']);
                $sheet->setCellValue('F' . $rows, $val['radang']);
                $sheet->setCellValue('G' . $rows, $val['keputihan']);
                $sheet->setCellValue('H' . $rows, $val['kuning']);
                $sheet->setCellValue('I' . $rows, $val['tumor']);
                $sheet->setCellValue('J' . $rows, $val['bb']);
                $rows++;
            }
            $writer = new Xlsx($spreadsheet);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Rekap_Bobot_BKKBN.xlsx"');
            $writer->save('php://output');
        } else {
            redirect('/');
        }
    }
    public function hasilExcel()
    {
        if ($this->session->userdata('logged')) {
            $getHasil = $this->getdata->getHasil();
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'IdHasil');
            $sheet->setCellValue('B1', 'Nama Pasien');
            $sheet->setCellValue('C1', 'Nilai');
            $sheet->setCellValue('D1', 'Ranking');
            $rows = 2;
            foreach ($getHasil as $val) {
                $sheet->setCellValue('A' . $rows, $val['id_hitung']);
                $sheet->setCellValue('B' . $rows, $val['nama']);
                $sheet->setCellValue('C' . $rows, $val['nilai']);
                $sheet->setCellValue('D' . $rows, $val['rank']);
                $rows++;
            }
            $writer = new Xlsx($spreadsheet);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Rank_BKKBN.xlsx"');
            $writer->save('php://output');
        } else {
            redirect('/');
        }
    }
}
