<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['/'] = 'login';
$route['dashboard'] = 'admin';
$route['hitung'] = 'admin/hitungRanking';
$route['riwayat'] = 'admin/index_riwayat';
$route['tambahdata'] = 'admin/tambahData';
$route['eksporHasilRank'] = 'admin/hasilExcel';
$route['eksporBobot'] = 'admin/datasetExcel';


$route['logout'] = 'login/logout';
