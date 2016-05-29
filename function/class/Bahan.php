<?php
class Bahan extends Core{

	protected $table 		= 'tbl_bahan'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_bahan';		// Primary key suatu tabel.
	protected $back			= "location:javascript://history.go(-1)";

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function indexBahan($id_kategori = '')
	{
		if($id_kategori != ''){
			$prop = "where id_kategori_produk='".$id_kategori."' order by nama_bahan asc";
		}else{
			$prop = "";
		}
		return $this->findAll($prop);
	}

	public function findBahan($id)
	{
		return $this->findBy($this->primaryKey, $id);
	}

	public function saveBahan($input)
	{
		try {
			$data = [
					'nama_bahan'			=> $input['nama_bahan'],
					'harga'					=> $input['harga'],
					'id_kategori_produk'	=> $input['id_kategori_produk']
					];
			if($this->save($data)){
				Lib::redirect('index_bahan');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function updateBahan($input)
	{
		try {
			$data = [
					'nama_bahan'		=> $input['nama_bahan'],
					'harga'					=> $input['harga'],
					'id_kategori_produk'	=> $input['id_kategori_produk']
					];
			if($this->update($data, $this->primaryKey, $input['id_bahan'])){
				Lib::redirect('index_bahan');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function deleteBahan($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('index_bahan');
		}else{
			header($this->back);
		}
	}

}