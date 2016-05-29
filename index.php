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
	<div class="main-container">
			<div class="head-line line-red"></div>
			<div class="head-line line-green"></div>
			<div class="head-line line-yellow"></div>	
			<div class="head-line line-blue"></div>
			<div class="head-line line-purple"></div>	
			<div class="inner-container">
				<div class="row">
					<div class="col-md-3">
						<h2 class="logo-container">
							<b>DIGIMAX</b><br>
							<small>Digital Print Solution</small>
						</h2>
					</div>
					<div class="col-md-9">
						<?php include "view/component/menu.php" ?>
					</div>
				</div>
				<hr style="margin-top:0px;">
				<div class="row">
					<div class="col-md-12">
						<!-- DYNAMIC CONTENT -->
							<?php
								$page = (isset($_GET['page']))? $_GET['page'] : "main";
								route($page);
							?>
						<!-- DYNAMIC CONTENT -->
					</div>
				</div>
			</div>
			<footer>
				Copyright &copy; 2016 - Digimax
			</footer>
	</div>
</body>
</html>