<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'pengguna';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['/'] = 'pengguna';
$route['dashboard'] = 'admin';
$route['data_uji'] = 'admin/index_datauji';
$route['hitung'] = 'admin/index_hitung';
$route['cek-asd'] = 'pengguna/index_hitung';
