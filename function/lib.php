<?php
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'route.php';

Class Lib{

	public static function redirect($loc)
	{
		header('Location:'.app_base.$loc);
	}

	public static function redirectjs($src = '', $msg = '')
	{
		$r 	= '<script>';
		$r .= (!empty($msg)) ? 'alert("'.$msg.'");' : '';
		$r .= 'location.replace("'.$src.'")';
		$r .= '</script>';
		return $r;
	}

	public static function ind($str = '')
	{
		if(!empty($str)){
			return 'Rp. '.number_format($str, 0, ',', '.');
		}
		return '';
	}

	public static function listKategori($opt = '')
	{
		$s[] = '<option value="" harga="0">-- Pilih Kategori Produk --</option>';
		$j = new KategoriProduk();
		$result = $j->findAll('order by nama_kategori');
		foreach($result as $value){
			$s[] = ($value['id_kategori_produk'] == $opt) ? '<option satuan="'.$value['satuan'].'" harga="'.$value['harga'].'" selected value="'.$value['id_kategori_produk'].'">'.$value['nama_kategori'].'</option>' : '<option satuan="'.$value['satuan'].'" harga="'.$value['harga'].'" value="'.$value['id_kategori_produk'].'">'.$value['nama_kategori'].'</option>';
		}
		return implode('', $s);
	}

	public static function listJenis($opt = '', $st = false)
	{
		$s[] = '<option harga="0" value="" selected>-- Pilih Jenis Cetak --</option>';
		$j = new JenisCetak();
		$result =  ($st) ? $j->indexJenisCetak($opt) : $j->indexJenisCetak();
		if($result != null){
			foreach($result as $value){
				$s[] = ($value['id_jenis_cetak'] == $opt) ? '<option harga="'.$value['harga'].'" selected value="'.$value['id_jenis_cetak'].'">'.$value['nama_jenis_cetak'].'</option>' : '<option harga="'.$value['harga'].'" value="'.$value['id_jenis_cetak'].'">'.$value['nama_jenis_cetak'].'</option>';
			}
		}else{
			$s = [];
		}
		return implode('', $s);
	}

	public static function listBahan($opt = '', $st = false)
	{
		$s[] = '<option harga="0" value="">-- Pilih Bahan --</option>';
		$j = new Bahan();
		$result =  ($st) ? $j->indexBahan($opt) : $j->indexBahan();
		if($result != null){
			foreach($result as $value){
				$s[] = ($value['id_bahan'] == $opt) ? '<option harga="'.$value['harga'].'" selected value="'.$value['id_bahan'].'">'.$value['nama_bahan'].'</option>' : '<option harga="'.$value['harga'].'" value="'.$value['id_bahan'].'">'.$value['nama_bahan'].'</option>';
			}
		}else{
			$s = [];
		}
		return implode('', $s);
	}

	public static function getKategoriName($id = '')
	{
		$j = new KategoriProduk();
		$result = $j->findBy('id_kategori_produk', $id);
		return $result[0]['nama_kategori'];
	}

	public static function persegi($str)
	{
		if($str == 'cm' || $str == 'm'){
			$a = $str.'<sup>2</sup>';
		}else{
			$a = $str;
		}
		return $a;
	}

	public static function uploadImg($post)
	{
		if(isset($post) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['gambar']['name'];
			$size = $_FILES['gambar']['size'];
			$tmp = $_FILES['gambar']['tmp_name'];
			$path = "public/images/";
			move_uploaded_file($tmp, $path.$name); //Stores the image in the uploads folder
		}
		return $name;
	}

	public static function namaSatuan($id)
	{
		$p = new KategoriProduk();
		$result = $p->findBy('id_kategori_produk', $id);
		if($result != null){
			if($result[0]['satuan'] != 'rim'){
				$r = $result[0]['satuan'].'';
			}else{
				$r = $result[0]['satuan'];
			}
			return $r;
		}
	}

	public static function namaKategori($id)
	{
		$p = new KategoriProduk();
		$result = $p->findBy('id_kategori_produk', $id);
		if($result != null){
			return $result[0]['nama_kategori'];
		}
	}

	public static function namaJenis($id)
	{
		$p = new JenisCetak();
		$result = $p->findBy('id_jenis_cetak', $id);
		if($result != null){
			return $result[0]['nama_jenis_cetak'];
		}
	}

	public static function namaBahan($id)
	{
		$p = new Bahan();
		$result = $p->findBy('id_bahan', $id);
		if($result != null){
			return $result[0]['nama_bahan'];
		}
	}

	public static function dateInd($str) {
        setlocale (LC_TIME, 'id_ID');
        $date = strftime( "%d-%m-%Y", strtotime($str));

        return $date;
    }

    public static function status($v)
	{
		switch ($v) {
			case '-':
				$vf = 'Dibatalkan';
				break;
			case '0':
				$vf = 'Pemesanan Belum Selesai';
				break;
			case '1':
				$vf = 'Pending';
				break;
			case '2':
				$vf = 'Proses Produksi';
				break;
			case '3':
				$vf = 'Proses Pengiriman';
				break;
			case '4':
				$vf = 'Selesai';
				break;
			
			default:
				$vf = '';
				break;
		}
		return $vf;
	}

	public static function pendingNotif()
	{
		$j = new Pesan();
		$result = $j->raw("SELECT count(id_pesan) as jumlah FROM tbl_pesan where status=1");
		return $result[0]['jumlah'];
	}

	public static function isLogged()
	{
		$logged_in = false;
		//jika session username belum dibuat, atau session username kosong
		if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {	
			//redirect ke halaman login
			// header("Location:index.php?page=login");
			header("Location:login.php");
		} else {
			$logged_in = true;
		}
	}

	public static function isAdmin()
	{
		$logged_in = false;
		//jika session username belum dibuat, atau session username kosong
		if (isset($_SESSION) && $_SESSION['level_user'] != 'admin') {	
			//redirect ke halaman login
			// header("Location:index.php?page=login");
			Lib::redirect('home');
			// header("Location:login.php");
		} else {
			$logged_in = true;
		}
	}
	
}