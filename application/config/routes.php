<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = '';
$route['info']='home/info';
$route['daftar']='home/daftar';
$route['masuk']='home/masuk';
$route['guidance/login']='admin/halaman_login';
$route['guidance/checklogin']='admin/login';
$route['guidance/home']='admin/halaman_backend';
$route['guidance/logout']='admin/logout';
$route['guidance/pembimbing/tambah']='admin/halaman_tambahpembimbing';
$route['guidance/pembimbing/checktambah']='admin/tambahpembimbing';
$route['guidance/pembimbing/semua']='admin/halaman_lihatpembimbing';
$route['guidance/pembimbing/edit']='admin/halaman_editpembimbing';
$route['guidance/pembimbing/checkedit']='admin/editpembimbing';
$route['guidance/paket/tambah']='purchasing/tambahPaket';
$route['guidance/paket/semua']='purchasing/lihatPaket';
$route['guidance/paket/edit/(:any)']='purchasing/editPaket/$1';
$route['guidance/pelajaran/tambah']='material/tambahPelajaran';
$route['guidance/pelajaran/semua']='material/lihatPelajaran';
$route['guidance/pelajaran/edit/(:any)']='material/editPelajaran/$1';
$route['guidance/kelas/tambah']='material/tambahKelas';
$route['guidance/kelas/semua']='material/lihatKelas';
$route['guidance/kelas/edit/(:any)']='material/editKelas/$1';
$route['guidance/bab/tambah']='material/halaman_tambahbab';
$route['guidance/bab/checktambah']='material/tambahbab';
$route['guidance/bab/hapus/(:num)']='material/hapus_bab/$1';
$route['guidance/bab/semua']='material/halaman_lihatbab';
$route['guidance/bab/edit/(:num)']='material/halaman_editbab/$1';
$route['guidance/bab/checkedit']='material/editbab';
$route['guidance/subbab/tambah']='material/halaman_tambahsubbab';
$route['guidance/subbab/checktambah']='material/tambahsubbab';
$route['guidance/subbab/hapus/(:num)']='material/hapus_subbab/$1';
$route['guidance/subbab/semua']='material/halaman_lihatsubbab';
$route['guidance/subbab/edit/(:num)']='material/halaman_editsubbab/$1';
$route['guidance/subbab/checkedit']='material/editsubbab';
$route['guidance/aksesmateri/edit/(:num)/(:num)']='material/halaman_editaksesmateri/$1/$2';
$route['guidance/aksesmateri/tambah']='material/halaman_tambahaksesmateri';
$route['guidance/aksesmateri/checktambah']='material/tambahaksesmateri';
$route['guidance/aksesmateri/hapus/(:num)/(:num)']='material/hapus_aksesmateri/$1/$2';
$route['guidance/aksesmateri/semua']='material/halaman_lihataksesmateri';
$route['guidance/materi/tambah']='material/tambahMateri';
$route['guidance/materi/semua']='material/lihatMateri';
$route['guidance/materi/edit/(:any)']='material/editMateri/$1';

$route['guidance/transaksi']='purchasing/lihatHistori';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
