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
        $bobot = $this->getdata->getBobot();
        $data = array();
        foreach ($list as $ds) {
            $row = array();

            $row[] = $ds->id_kriteria;
            $row[] = ucwords($ds->nama);
            $row[] = $ds->menyusui;
            $row[] = $ds->hamil;
            $row[] = $ds->ku;
            $row[] = $ds->penyakit;
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
            $getDataBobot = $this->getdata->getDataBobot();
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

                // Normalisasi Matriks Awal (x)
                $normalisasi_matrix = [];

                foreach ($getNama as $gn) {
                    $row['menyusui'] = ($gn['menyusui'] - $min['minnyusu']) / ($max['maxnyusu'] - $min['minnyusu']) * ($gn['menyusui'] - $max['maxnyusu']) / ($min['minnyusu'] - $max['maxnyusu']);
                    $row['hamil'] = ($gn['hamil'] - $min['minhamil']) / ($max['maxhamil'] - $min['minhamil']) * ($gn['hamil'] - $max['maxhamil']) / ($min['minhamil'] - $max['maxhamil']);
                    $row['ku'] = ($gn['ku'] - $min['minku']) / ($max['maxku'] - $min['minku'])  * ($gn['ku'] - $max['maxku']) / ($min['minku'] - $max['maxku']);
                    $row['penyakit'] = ($gn['penyakit'] - $min['minpenyakit']) / ($max['maxpenyakit'] - $min['minpenyakit'])  * ($gn['penyakit'] - $max['maxpenyakit']) / ($min['minpenyakit'] - $max['maxpenyakit']);
                    $row['bb'] = ($gn['bb'] - $min['minbb']) / ($max['maxbb'] - $min['minbb']) * ($gn['bb'] - $max['maxbb']) / ($min['minbb'] - $max['maxbb']);

                    $normalisasi_matrix[] = $row;
                }

                // Matriks tertimbang (v)
                $dataTertimbang = [];

                foreach ($normalisasi_matrix as $mx) {
                    $x['menyusui'] = ($mx['menyusui'] * $getDataBobot[0]['bobot']) + $getDataBobot[0]['bobot'];
                    $x['hamil'] = ($mx['hamil'] * $getDataBobot[1]['bobot']) + $getDataBobot[1]['bobot'];
                    $x['ku'] = ($mx['ku'] * $getDataBobot[2]['bobot']) + $getDataBobot[2]['bobot'];
                    $x['penyakit'] = ($mx['penyakit'] * $getDataBobot[3]['bobot']) + $getDataBobot[3]['bobot'];
                    $x['bb'] = ($mx['bb'] * $getDataBobot[4]['bobot']) + $getDataBobot[4]['bobot'];

                    $dataTertimbang[] = $x;
                }
                foreach ($dataTertimbang as $g) {
                    $menyusui[] = $g['menyusui'];
                    $hamil[] = $g['hamil'];
                    $ku[] = $g['ku'];
                    $penyakit[] = $g['penyakit'];
                    $bb[] = $g['bb'];
                }
                // matriks area perbatasan (G)
                $jum_alternatif = $jml_data['jml_data'];
                $pangkat = 1 / $jum_alternatif;

                $databatas = array(
                    array_product($menyusui) ** $pangkat,
                    array_product($hamil) ** $pangkat,
                    array_product($ku) ** $pangkat,
                    array_product($penyakit) ** $pangkat,
                    array_product($bb) ** $pangkat
                );

                // Menghitung jarak alternatif
                $jarak_alternatif = [];
                $id = 0;
                foreach ($dataTertimbang as $mt) {
                    $row3['1'] = (float) number_format($mt['menyusui'] - $databatas[0], 1);
                    $row3['2'] = (float) number_format($mt['hamil'] - $databatas[1], 1);
                    $row3['3'] = (float) number_format($mt['ku'] - $databatas[2], 1);
                    $row3['4'] = (float) number_format($mt['penyakit'] - $databatas[3], 1);
                    $row3['5'] = (float) number_format($mt['bb'] - $databatas[4], 1);
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
                // echo '<pre>';
                // echo var_dump($data_rank);
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
            $this->form_validation->set_rules('penyakit', 'Penyakit', 'trim|required', [
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
                    'penyakit' => form_error('penyakit'),
                    'bb' => form_error('bb'),
                );
                echo json_encode($alert);
            } else {

                $data_insert = array(
                    'nama' => $this->input->post('nama'),
                    'menyusui' => $this->input->post('menyusui'),
                    'hamil' => $this->input->post('hamil'),
                    'ku' => $this->input->post('ku'),
                    'penyakit' => $this->input->post('penyakit'),
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
            $sheet->setCellValue('F2', 'PENYAKIT');
            $sheet->setCellValue('G2', 'Berat Badan');
            $rows = 3;
            foreach ($list as $val) {
                $sheet->setCellValue('A' . $rows, $val['id_kriteria']);
                $sheet->setCellValue('B' . $rows, $val['nama']);
                $sheet->setCellValue('C' . $rows, $val['menyusui']);
                $sheet->setCellValue('D' . $rows, $val['hamil']);
                $sheet->setCellValue('E' . $rows, $val['ku']);
                $sheet->setCellValue('F' . $rows, $val['penyakit']);
                $sheet->setCellValue('G' . $rows, $val['bb']);
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
