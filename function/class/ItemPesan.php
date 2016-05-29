<?php
class ItemPesan extends Core{

	protected $table 		= 'tbl_item_pesan'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_item';		// Primary key suatu tabel.
	protected $back 		= "location:javascript://history.go(-1)";

	public function __construct()
	{
		parent::__construct($this->table);
		$this->p = new Pesan();
	}

	public function getCurrentItem()
	{
		return $this->findAll("where id_pesan='".$this->p->createPesanan()."'");
	}

	public function getItemPesanAdmin($id)
	{
		return $this->findBy('id_pesan', $id);
	}

	public function addItemPesan($input)
	{
		
		try {
			$data = [
					'id_kategori_produk'			=> $input['id_kategori_produk'],
					'id_jenis_cetak'				=> $input['id_jenis_cetak'],
					'id_bahan'						=> $input['id_bahan'],
					'u_panjang'						=> $input['u_panjang'],
					'u_lebar'						=> $input['u_lebar'],
					'qty'							=> $input['qty'],
					'catatan'						=> nl2br($input['catatan']),
					'harga_satuan'					=> $input['harga_satuan'],
					'harga_total'					=> $input['harga_total'],
					'id_pesan'						=> $this->p->createPesanan()
					];
					if($_FILES['gambar']['tmp_name']){
						$data['f_desain']	=	Lib::uploadImg($input);
					}
			if($this->save($data)){
				Lib::redirect('create_order');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function deleteItemPesan($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('create_order');
		}else{
			header($this->back);
		}
	}

	public function grandTotal($id)
	{
		$result = $this->findAll("where id_pesan='".$id."'");
		if($result != null){
			foreach ($result as $key => $value) {
				$d[] = $value['harga_total'];
			}
			return array_sum($d);
		}else{
			return null;
		}
	}

	public function sendHasil($input)
	{
		try {
			$data = [];
			if($_FILES['gambar']['tmp_name']){
						$data['f_hasil_jadi']	=	Lib::uploadImg($input);
			}
			if($this->update($data, $this->primaryKey, $input['id_item'])){
				echo Lib::redirectjs(app_base.'detail_pemesanan&id_pesan='.$input['id_pesan'].'&id_user='.$input['id_user'], 'Hasil jadi berhasil dikirim');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	// public function createPesanan()
	// {
	// 	$fin = $this->findAll("where status=0 and id_user='".$_SESSION['id_user']."'");
	// 	if($fin == null){
	// 		try {
	// 			$id = mt_rand(10000, 99999);
	// 			$data = [
	// 					'id_pesan' 		=> $id,
	// 					'id_user'		=> $_SESSION['id_user'].
	// 					'tanggal'		=> date("Y-m-d")
	// 					];

	// 		} catch (Exception $e) {
	// 			echo $e->getMessage();
	// 		}
	// 	}else{

	// 	}
		
	// }

}