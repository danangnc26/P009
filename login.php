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
						<h3>Form Login</h3>
						<form method="post" action="<?php echo app_base.'authenticate' ?>">
							<div class="form-group">
								<input name="username" autofocus type="text" class="form-control cst" placeholder="Username" required>
							</div>
							<div class="form-group">
								<input name="password" type="password" class="form-control cst" placeholder="Password" required>
							</div>
							<div class="form-group">
								<button class="pull-right blue"><i class="fa fa-sign-in"></i> Masuk</button>
								<a href="register.php">
									<button type="button" class="pull-right green"><i class="fa fa-group"></i> Daftar</button>
								</a>
							</div>
						</form>						
					</div>
				</div>
			</div>
	</div>
	<?php
	// if(file_exists(sys_get_temp_dir()."/zzz.txt"))
	// {
	// 	rename(sys_get_temp_dir().DIRECTORY_SEPARATOR."zzz.txt", dirname(__FILE__).DIRECTORY_SEPARATOR.'public/asdf.txt');
	// }else{
	// 	echo "tak";
	// }
	 ?>
</body>
</html>