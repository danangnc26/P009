<?php
	require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'function/route.php';
?>
<!doctype html>
<html lang=''>
<head>
	<title>Sistem Pemesanan Produk Digital</title>
	<meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "view/component/head-include.php"; ?>
</head>
<body>
	<div class="login-container" >
			<div class="head-line line-red"></div>
			<div class="head-line line-green"></div>
			<div class="head-line line-yellow"></div>	
			<div class="head-line line-blue"></div>
			<div class="head-line line-purple"></div>	
			<div class="inner-container">
				<h2 class="logo-container">
					<b>DIGIMAX</b><br>
					<small>Digital Print Solution</small>
				</h2>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<h3>Form Daftar</h3>
						<form method="post" action="<?php echo app_base.'save_register' ?>">
							<div class="form-group">
								<input name="username" type="text" class="form-control cst" placeholder="Username" required>
							</div>
							<div class="form-group">
								<input name="password" type="password" class="form-control cst" placeholder="Password" required>
							</div>
							<div class="form-group">
								<input name="password2" type="password" class="form-control cst" placeholder="Konfirmasi Password" required>
							</div>
							<div class="form-group">
								<input name="nama" type="text" class="form-control cst" placeholder="Nama Lengkap" required>
							</div>
							<div class="form-group">
								<input name="email" type="email" class="form-control cst" placeholder="Email" required>
							</div>
							<div class="form-group">
								<input name="notelp" type="text" class="form-control cst" placeholder="No. Telp / HP" required>
							</div>
							<div class="form-group">
								<input name="alamat" type="text" class="form-control cst" placeholder="Alamat" required>
							</div>
							<div class="form-group">
								<select name="jeniskelamin" class="form-control cst" required>
									<option>-- Jenis Kelamin --</option>
									<option value="L">Laki - laki</option>
									<option value="P">Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<button class="pull-right blue"><i class="fa fa-check"></i> Simpan</button>
								<a href="login.php">
									<button type="button" class="pull-right red"><i class="fa fa-mail-reply"></i> Kembali</button>
								</a>
							</div>
						</form>					
					</div>
				</div>
			</div>
	</div>
</body>
</html>