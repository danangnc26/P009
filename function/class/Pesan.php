<?php
class Pesan extends Core{

	protected $table 		= 'tbl_pesan'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_pesan';		// Primary key suatu tabel.
	protected $back 		= "location:javascript://history.go(-1)";

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function getAllDataPesanan()
	{
		return $this->findAll("where status!=0 order by tanggal desc");
	}

	public function getPesananById($id)
	{
		return $this->findBy($this->primaryKey, $id);
	}

	public function getListPesanByUser()
	{
		return $this->findAll("where id_user='".$_SESSION['id_user']."' and status!=0 order by tanggal desc");
	}

	public function currentPesan()
	{
		return $this->findAll("where status=0 and id_user='".$_SESSION['id_user']."'");
	}

	public function createPesanan()
	{
		$fin = $this->currentPesan();
		if($fin == null){
			try {
				$id = mt_rand(10000, 99999);
				$data = [
						'id_pesan' 		=> $id,
						'id_user'		=> $_SESSION['id_user'],
						'tanggal'		=> date("Y-m-d")
						];
				if($this->save($data)){
					$result = $id;
				}else{
					$result = 0;
				}
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}else{
			$result = $fin[0]['id_pesan'];
		}
		return $result;
	}

	public function kirimPesanan($id)
	{
		$i = new ItemPesan();
		try {
			$data = [
					'status'				=> 1,
					'total_pemesanan'		=> $i->grandTotal($id)
					];
			if($this->update($data, $this->primaryKey, $id)){
				Lib::redirect('data_pemesanan');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function cancelPemesanan($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('data_pemesanan');
		}else{
			header($this->back);
		}
	}

	public function hapusPesanan($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('index_pemesanan');
		}else{
			header($this->back);
		}
	}

	public function updateStatusPesan($input)
	{
		try {
			$data = [
					'status'	=> $input['status']
					];
			if($this->update($data, $this->primaryKey, $input['id_pesan'])){
				echo Lib::redirectjs(app_base.'detail_pemesanan&id_pesan='.$input['id_pesan'].'&id_user='.$input['id_user'], 'Status pemesanan berhasil diubah');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

}