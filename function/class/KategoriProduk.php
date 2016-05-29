
<?php
class KategoriProduk extends Core{

	protected $table 		= 'tbl_kategori_produk'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_kategori_produk';		// Primary key suatu tabel.
	protected $back			= "location:javascript://history.go(-1)";

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function indexKategoriProduk()
	{
		return $this->findAll('order by nama_kategori asc');
	}

	public function findKategoriProduk($id)
	{
		return $this->findBy($this->primaryKey, $id);
	}

	public function saveKategoriProduk($input)
	{
		try {
			$data = [
					'nama_kategori'		=> $input['nama_kategori'],
					'satuan'			=> $input['satuan'],
					'harga'				=> $input['harga']
					];
			if($this->save($data)){
				Lib::redirect('index_kategori');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function updateKategoriProduk($input)
	{
		try {
			$data = [
					'nama_kategori'		=> $input['nama_kategori'],
					'satuan'			=> $input['satuan'],
					'harga'				=> $input['harga']
					];
			if($this->update($data, $this->primaryKey, $input['id_kategori'])){
				Lib::redirect('index_kategori');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function deleteKategoriProduk($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('index_kategori');
		}else{
			header($this->back);
		}
	}

}