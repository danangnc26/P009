<?php
class Users extends Core{

	protected $table 		= 'tbl_user'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_user';		// Primary key suatu tabel.
	protected $back			= "location:javascript://history.go(-1)";

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function authenticate($post)
	{
		$username = $this->con()->real_escape_string($post['username']);
		$password = $this->con()->real_escape_string($post['password']);

		$result = $this->findAll("where username='".$username."' and password='".md5($password)."'");
		if(!empty($result) or $result != false){
			foreach ($result as $key => $value) {
				$_SESSION['id_user'] = $value['id_user'];
				$_SESSION['username'] = $value['username'];
				$_SESSION['nama']	= $value['nama'];
				$_SESSION['jeniskelamin']	= $value['jeniskelamin'];
				$_SESSION['level_user']		= $value['level_user'];
			}
			if($_SESSION['level_user'] == 'admin'){
				Lib::redirect('show_welcome');
			}elseif($_SESSION['level_user'] == 'customer'){
				Lib::redirect('home');
			}else{
				echo "default";
			}
		}
	}

	public function logCheck()
	{
		$logged_in = false;
		//jika session username belum dibuat, atau session username kosong
		if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {	
			//redirect ke halaman login
			// header("Location:index.php?page=login");
			Lib::redirectjs(base_url.'login.php');
		} else {
			$logged_in = true;
		}
		
	}

	public function saveUser($post)
	{
		try{
			if($post['password'] == $post['password2']){
				$data = [
					'username' 		=> $post['username'],
					'password' 		=> md5($post['password']),
					'nama'			=> $post['nama'],
					'email'			=> $post['email'],
					'notelp'		=> $post['notelp'],
					'alamat'		=> $post['alamat'],
					'jeniskelamin'	=> $post['jeniskelamin'],
					'level_user'	=> 'customer'
					];
				if($this->save($data)){
					echo Lib::redirectjs(base_url.'login.php', 'Akun anda berhasil dibuat, silahkan login untuk melanjutkan.');
				}
			}else{
				header($this->back);
			}

		}catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function updateProfil($input)
	{
		try {
			$data = [
					'nama'		=> $input['nama'],
					'email'		=> $input['email'],
					'notelp'	=> $input['notelp'],
					'alamat'	=> $input['alamat'],
					'jeniskelamin'	=> $input['jeniskelamin']
					];
			if($this->update($data, $this->primaryKey, $_SESSION['id_user'])){
				Lib::redirect('home');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function updatePassword($input)
	{
		try {
			$data = [
					'password'		=> md5($input['password2'])
					];
			if($this->update($data, $this->primaryKey, $_SESSION['id_user'])){
				Lib::redirect('home');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function getDataLoggedUser()
	{
		return $this->findBy($this->primaryKey, $_SESSION['id_user']);
	}

	public function doLogout()
	{
		session_destroy();
		header("Location:login.php");
		// Lib::redirect('login');
	} 

	public function getUserName($id)
	{
		$result = $this->findBy($this->primaryKey, $id);
		return $result[0]['nama'];
	}

	public function getUser($id)
	{
		return $this->findBy($this->primaryKey, $id);
	}

	public function getListCustomer()
	{
		return $this->findAll("where level_user='customer' order by nama asc");
	}

	public function deleteCustomer($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('index_customer');
		}else{
			header($this->back);
		}
	}

}