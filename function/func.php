<?php
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'lib.php';

if(isset($_GET['func'])){
	$func = $_GET['func'];
}

switch ($func) {
	case 'list_jenis':
		$res = Lib::listJenis($_GET['id_kategori'], $_GET['opt']);
		break;
	case 'list_bahan':
		$res = Lib::listBahan($_GET['id_kategori'], $_GET['opt']);
		break;
	
	default:
		# code...
		break;
}

echo $res;
