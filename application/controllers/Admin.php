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
            $row[] = $ds->jangka_waktu;
            $row[] = $ds->melahirkan;
            $row[] = $ds->menstruasi;
            $row[] = $ds->usia;
            $row[] = $ds->penyakit;
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

            // Normalisasi Matriks Awal (x)
            $normalisasi_matrix = [];

            foreach ($getNama as $gn) {
                $row['jangka_waktu'] = ($gn['jangka_waktu'] - $min['minwaktu']) / ($max['maxwaktu'] - $min['minwaktu']);
                $row['melahirkan'] = ($gn['melahirkan'] - $min['minlahir']) / ($max['maxlahir'] - $min['minlahir']);
                $row['menstruasi'] = ($gn['menstruasi'] - $min['minmens']) / ($max['maxmens'] - $min['minmens']);
                $row['usia'] = ($gn['usia'] - $min['minusia']) / ($max['maxusia'] - $min['minusia']);
                $row['penyakit'] = ($gn['penyakit'] - $min['minsakit']) / ($max['maxsakit'] - $min['minsakit']);

                $normalisasi_matrix[$gn['nama']] = $row;
            }

            //Ekstrak Data DB menjadi array sejenis
            $data = [];

            foreach ($getNama as $gn) {
                $extract['jangka_waktu'] = (int) $gn['jangka_waktu'];
                $extract['melahirkan'] = (int) $gn['melahirkan'];
                $extract['menstruasi'] = (int) $gn['menstruasi'];
                $extract['usia'] = (int) $gn['usia'];
                $extract['penyakit'] = (int) $gn['penyakit'];

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
                $jangka_waktu[] = $g[0];
                $melahirkan[] = $g[1];
                $menstruasi[] = $g[2];
                $usia[] = $g[3];
                $penyakit[] = $g[4];
            }

            $jum_alternatif = $jml_data['jml_data'];
            $pangkat = 1 / $jum_alternatif;

            $databatas = array(
                array_product($jangka_waktu) ** $pangkat,
                array_product($melahirkan) ** $pangkat,
                array_product($menstruasi) ** $pangkat,
                array_product($usia) ** $pangkat,
                array_product($penyakit) ** $pangkat
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
                $this->db->truncate('save_hitung');
                foreach ($data_rank as $dt) {
                    $this->db->insert('save_hitung', $dt);
                }
            }

            // Cari alat terbanyak
            $getHasil = $this->getdata->getHasil();
            $alat = array();
            foreach ($getHasil as $gh) {
                if ($gh['nilai'] <= 2.5) {
                    array_push($alat, 'IUD');
                } elseif ($gh['nilai'] >= 2.6 && $gh['nilai'] <= 7.0) {
                    array_push($alat, 'Suntik');
                } elseif ($gh['nilai'] >= 7.1) {
                    array_push($alat, 'Implan');
                }
            }
            $count_alat = array_count_values($alat);
            arsort($count_alat);
            $data['terbanyak'] = array(
                'alat' => key($count_alat),
                'jum' => $count_alat[key($count_alat)]
            );
            $data['user'] = $this->session->userdata();
            $data['hasilData'] = $this->getdata->getHasil();
            $data['tag'] = 'Hasil Ranking';
            $this->load->view('layout/header', $data);
            $this->load->view('hitung', $data);
            $this->load->view('layout/footer');
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
            $this->form_validation->set_rules('jangka', 'Jangka', 'trim|required', [
                'required' => 'Tidak valid!',

            ]);
            $this->form_validation->set_rules('lahir', 'Lahir', 'trim|required', [
                'required' => 'Tidak valid!',

            ]);
            $this->form_validation->set_rules('men', 'Men', 'trim|required', [
                'required' => 'Tidak valid!',

            ]);
            $this->form_validation->set_rules('usia', 'Usia', 'trim|required', [
                'required' => 'Tidak valid!',

            ]);
            $this->form_validation->set_rules('sakit', 'Sakit', 'trim|required', [
                'required' => 'Tidak valid!',

            ]);
            if ($this->form_validation->run() == false) {
                $alert = array(
                    'error' => true
                );
                echo json_encode($alert);
            } else {

                $data_insert = array(
                    'nama' => $this->input->post('nama'),
                    'jangka_waktu' => $this->input->post('jangka'),
                    'melahirkan' => $this->input->post('lahir'),
                    'menstruasi' => $this->input->post('men'),
                    'usia' => $this->input->post('usia'),
                    'penyakit' => $this->input->post('sakit'),
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
            $sheet->setCellValue('C2', 'Jangka Waktu');
            $sheet->setCellValue('D2', 'Melahirkan');
            $sheet->setCellValue('E2', 'Menstruasi');
            $sheet->setCellValue('F2', 'Usia');
            $sheet->setCellValue('G2', 'Penyakit');
            $rows = 3;
            foreach ($list as $val) {
                $sheet->setCellValue('A' . $rows, $val['id_kriteria']);
                $sheet->setCellValue('B' . $rows, $val['nama']);
                $sheet->setCellValue('C' . $rows, $val['jangka_waktu']);
                $sheet->setCellValue('D' . $rows, $val['melahirkan']);
                $sheet->setCellValue('E' . $rows, $val['menstruasi']);
                $sheet->setCellValue('F' . $rows, $val['usia']);
                $sheet->setCellValue('G' . $rows, $val['penyakit']);
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
