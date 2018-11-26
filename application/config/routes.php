<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'auth';
$route['buatakun'] = 'auth/buatakun';
$route['ceklogin'] = 'auth/ceklogin';
$route['daftar'] = 'auth/index/daftar';

$route['app/tambahkriteria'] = 'app/tambahkriteria';
$route['app/editkriteria/(:any)'] = 'app/editkriteria/$1';
$route['app/hapuskriteria/(:any)'] = 'app/hapuskriteria/$1';
$route['app/tambahsubkriteria'] = 'app/tambahsubkriteria';
$route['app/editsubkriteria/(:any)'] = 'app/editsubkriteria/$1';
$route['app/hapussubkriteria/(:any)'] = 'app/hapussubkriteria/$1';
$route['app/tambahalternatif'] = 'app/tambahalternatif';
$route['app/editalternatif/(:any)'] = 'app/editalternatif/$1';
$route['app/hapusalternatif/(:any)'] = 'app/hapusalternatif/$1';
$route['app/pencocokankriteria'] = 'app/pencocokankriteria';
$route['app/editpencocokankriteria'] = 'app/editpencocokankriteria';
$route['app/gantipassword'] = 'app/gantipassword';
$route['app/hapusakun'] = 'app/hapusakun';
$route['app/(:any)'] = 'app/index/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;