<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_DEPRECATED);
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'bootstrap.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'lib.php';


function route($page)
{
	$p = $_POST;
	$user = new Users();
	$kategori = new KategoriProduk();
	$jenis = new JenisCetak();
	$bahan = new Bahan();
	$item = new ItemPesan();
	$pesan = new Pesan();

	switch ($page) {
		
		case 'authenticate':
				$user->authenticate($p);
			break;
		case 'register':
				include "view/register.php";
			break;
		case 'save_register':
				$user->saveUser($p);
			break;
		case 'logout':
				$user->doLogout();
			break;


		// // // // // // // // ADMIN // // // // // // // // 
		case 'show_welcome':
			include "view/admin/dashboard.php";
			break;

		case 'index_produk':
			include "view/admin/master/produk/index.php";
			break;

		case 'index_kategori':
				$data =  $kategori->indexKategoriProduk();
				include "view/admin/master/kategori/index.php";
			break;
		case 'create_kategori':
				include "view/admin/master/kategori/create.php";
			break;
		case 'save_kategori':
				$kategori->saveKategoriProduk($p);
			break;
		case 'edit_kategori':
				$data = $kategori->findKategoriProduk($_GET['id_kategori']);
				include "view/admin/master/kategori/edit.php";
			break;
		case 'update_kategori':
				$kategori->updateKategoriProduk($p);
			break;
		case 'delete_kategori':
				$kategori->deleteKategoriProduk($_GET['id_kategori']);
			break;

		#JENISCETAK
		case 'index_jenis':
				if(isset($_GET['id_kategori'])){
					$data =  $jenis->indexJenisCetak($_GET['id_kategori']);
				}else{
					$data =  $jenis->indexJenisCetak();
				}
				include "view/admin/master/jenis/index.php";
			break;
		case 'create_jenis':
				include "view/admin/master/jenis/create.php";
			break;
		case 'save_jenis':
				$jenis->saveJenisCetak($p);
			break;
		case 'edit_jenis':
				$data = $jenis->findJenisCetak($_GET['id_jenis']);
				include "view/admin/master/jenis/edit.php";
			break;
		case 'update_jenis':
				$jenis->updateJenisCetak($p);
			break;
		case 'delete_jenis':
				$jenis->deleteJenisCetak($_GET['id_jenis']);
			break;

		#BAHAN
		case 'index_bahan':
				if(isset($_GET['id_kategori'])){
					$data =  $bahan->indexBahan($_GET['id_kategori']);
				}else{
					$data =  $bahan->indexBahan();
				}
				include "view/admin/master/bahan/index.php";
			break;
		case 'create_bahan':
				include "view/admin/master/bahan/create.php";
			break;
		case 'save_bahan':
				$bahan->saveBahan($p);
			break;
		case 'edit_bahan':
				$data = $bahan->findBahan($_GET['id_bahan']);
				include "view/admin/master/bahan/edit.php";
			break;
		case 'update_bahan':
				$bahan->updateBahan($p);
			break;
		case 'delete_bahan':
				$bahan->deleteBahan($_GET['id_bahan']);
			break;

		#PESANAN
		case 'index_pemesanan':
				$data = $pesan->getAllDataPesanan();
				include "view/admin/pesanan/index.php";
			break;
		case 'detail_pemesanan':
				$data = $item->getItemPesanAdmin($_GET['id_pesan']);
				$data2 = $user->getUser($_GET['id_user']);
				$data3 = $pesan->getPesananById($_GET['id_pesan']);
				include "view/admin/pesanan/detail.php";
			break;
		case 'send_hasil_jadi':
				$item->sendHasil($p);
			break;
		case 'update_status_pesan':
				$pesan->updateStatusPesan($p);
			break;
		case 'delete_pesanan':
				$pesan->hapusPesanan($_GET['id_pesan']);
			break;

		#CUSTOMER
		case 'index_customer':
				$data = $user->getListCustomer();
				include "view/admin/customer/index.php";
			break;
		case 'delete_customer':
				$user->deleteCustomer($_GET['id_user']);
			break;

		case 'index_laporan':
				if(isset($_GET['bulan']) && isset($_GET['tahun'])){
					$dt = $_GET['tahun'].'-'.$_GET['bulan'];
				}else{
					$dt = date('Y-m');
				}
				// $data = $item->getItemPesanAdmin($_GET['id_pesan']);
				$data2 = $pesan->getLaporan($dt);
				include "view/admin/laporan/index.php";
			break;

		// // // // // // // // ADMIN // // // // // // // // 

		case 'index_customer':
				include "view/customer/index.php";
			break;
		case 'create_order':
				$data = $item->getCurrentItem();
				include "view/customer/pesanan_create.php";
			break;
		case 'add_item_pesanan':
				$item->addItemPesan($p);
			break;
		case 'delete_item':
				$item->deleteItemPesan($_GET['id_item']);
			break;
		case 'konfirmasi_pemesanan':
				if($pesan->currentPesan() == null){
					echo Lib::redirectjs(app_base.'create_order', 'Anda belum melakukan pemesanan');
				}else{
					$data = $item->getCurrentItem();
					$data2 = $user->getDataLoggedUser();
					include "view/customer/konfirmasi_pesanan.php";
				}
			break;
		case 'kirim_pesanan':
				$pesan->kirimPesanan($_GET['id_pesan']);
			break;
		case 'data_pemesanan':
				$data = $pesan->getListPesanByUser();
				include "view/customer/data_pemesanan.php";
			break;
		case 'cancel_pesanan':
				$pesan->cancelPemesanan($_GET['id_pesan']);
			break;
		case 'detail_pemesanan_customer':
				$data = $item->getItemPesanAdmin($_GET['id_pesan']);
				$data2 = $user->getUser($_SESSION['id_user']);
				$data3 = $pesan->getPesananById($_GET['id_pesan']);
				include "view/customer/detail_pemesanan.php";
			break;

		case 'ubah_profil':
				$data = $user->getDataLoggedUser();
				include "view/customer/ubah_profil.php";
			break;
		case 'update_profil':
				$user->updateProfil($p);
			break;
		case 'ubah_password':
				include "view/customer/ubah_password.php";
			break;
		case 'update_password':
				$user->updatePassword($p);
			break;

		case 'home':
				include "view/customer/home.php";
			break;
		
		case 'main' :
				default : 
				Lib::redirect('home');
			break;
	}
}

define("index", "index.php");
define("base_url", server_name()."/digimax/");
define("app_base", index."?page=");
define("func_url", base_url.'function/func.php?');

function server_name()
{
	  $serverport = (isset($_SERVER['SERVER_PORT'])) ? ':'.$_SERVER['SERVER_PORT'] : '';
	  return sprintf(
	    "%s://%s".$serverport,
	    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
	    $_SERVER['SERVER_NAME'],
	    $_SERVER['REQUEST_URI']
	  );
}
