<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['/'] = 'login';
$route['dashboard'] = 'admin';
$route['data_uji'] = 'admin/index_datauji';
$route['hitung'] = 'admin/index_hitung';
$route['riwayat'] = 'admin/index_riwayat';
$route['cek-asd'] = 'pengguna/index_hitung';
$route['testhitung'] = 'pengguna/testhitung';


$route['logout'] = 'login/logout';
