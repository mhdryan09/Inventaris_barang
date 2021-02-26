<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['penerimaan_barang/barang_masuk']        = 'penerimaan_barang/barang_masuk_data';
$route['penerimaan_barang/barang_masuk/tambah'] = 'penerimaan_barang/barang_masuk_tambah';
$route['penerimaan_barang/barang_masuk/delete/(:num)/(:num)'] = 'penerimaan_barang/barang_masuk_hapus';

$route['pengeluaran_barang/barang_keluar']        = 'pengeluaran_barang/barang_keluar_data';
$route['pengeluaran_barang/barang_keluar/tambah'] = 'pengeluaran_barang/barang_keluar_tambah';
$route['pengeluaran_barang/barang_keluar/delete/(:num)/(:num)'] = 'pengeluaran_barang/barang_keluar_hapus';

$route['pengadaan_barang/barang_pengadaan']        = 'pengadaan_barang/barang_pengadaan_data';
$route['pengadaan_barang/barang_pengadaan/tambah'] = 'pengadaan_barang/barang_pengadaan_tambah';
$route['pengadaan_barang/barang_pengadaan/delete/(:num)/(:num)'] = 'pengadaan_barang/barang_pengadaan_hapus';

$route['laporan_penerimaan/barang_masuk'] = 'laporan_penerimaan/cetak_penerimaan';
$route['laporan_pengeluaran/barang_keluar'] = 'laporan_pengeluaran/cetak_pengeluaran';
$route['laporan_pengadaan/barang_pengadaan'] = 'laporan_pengadaan/cetak_pengadaan';



// $route['laporan_penerimaan/barang_masuk'] = 'laporan_penerimaan/cetak_penerimaan';

// $route['dashboard/barang_masuk'] = 'grafik/grafik_barang_masuk_data';
// $route['dashboard/barang_keluar'] = 'grafik/grafik_barang_keluar_data';
$route['dashboard'] = 'dashboard/grafik_barang';
// $route['dashboard2'] = 'grafik/grafik_barang_keluar_data';
