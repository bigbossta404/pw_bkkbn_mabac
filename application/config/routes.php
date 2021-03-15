<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'pengguna';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dashboard'] = 'pengguna';
$route['data_uji'] = 'pengguna/index_datauji';
$route['hitung'] = 'pengguna/index_hitung';
