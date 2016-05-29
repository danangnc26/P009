<?php
class JenisCetak extends Core{

	protected $table 		= 'tbl_jenis_cetak'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_jenis_cetak';		// Primary key suatu tabel.
	protected $back			= "location:javascript://history.go(-1)";

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function indexJenisCetak($id_kategori = '')
	{
		if($id_kategori != ''){
			$prop = "where id_kategori_produk='".$id_kategori."' order by nama_jenis_cetak asc";
		}else{
			$prop = "";
		}
		return $this->findAll($prop);
	}

	public function findJenisCetak($id)
	{
		return $this->findBy($this->primaryKey, $id);
	}

	public function saveJenisCetak($input)
	{
		try {
			$data = [
					'nama_jenis_cetak'		=> $input['nama_jenis_cetak'],
					'harga'					=> $input['harga'],
					'id_kategori_produk'	=> $input['id_kategori_produk']
					];
			if($this->save($data)){
				Lib::redirect('index_jenis');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function updateJenisCetak($input)
	{
		try {
			$data = [
					'nama_jenis_cetak'		=> $input['nama_jenis_cetak'],
					'harga'					=> $input['harga'],
					'id_kategori_produk'	=> $input['id_kategori_produk']
					];
			if($this->update($data, $this->primaryKey, $input['id_jenis'])){
				Lib::redirect('index_jenis');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function deleteJenisCetak($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('index_jenis');
		}else{
			header($this->back);
		}
	}

}