<?php
Lib::isLogged();
// if($_SESSION['level_user'] == 'customer'){
?>
						<nav class="navbar navbar-default" style="margin-bottom:0px; background:transparent; border:none; box-shadow:none;">
						  <div class="container-fluid">
						    <!-- Brand and toggle get grouped for better mobile display -->
						    <div class="navbar-header">
						      <button style="width:auto" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						      </button>
						      <div class="menu">
						      	<h4>Menu</h4>
						      </div>
						    </div>


						    <!-- Collect the nav links, forms, and other content for toggling -->
						    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						      <ul class="nav navbar-nav navbar-right">
						      	<li><a class="nv" href="<?php echo app_base.'home' ?>">Home</a></li>
						      	<?php
						      	if(!empty($_SESSION)){
						      	if($_SESSION['level_user'] == 'customer'){
						      	?>
						        <li><a class="nv" href="<?php echo app_base.'create_order' ?>">Buat Pesanan</a></li>
						        <li><a class="nv" href="<?php echo app_base.'data_pemesanan' ?>">Data Pemesanan</a></li>
						        <!-- <li><a class="nv" href="#">Konfirmasi Pembayaran</a></li> -->
						        <li class="dropdown">
						          <a href="#" class="dropdown-toggle nv" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo ($_SESSION['jeniskelamin'] == 'L') ? 'Tn.' : 'Ny.' ?> <?php echo $_SESSION['nama'] ?> <span class="caret"></span></a>
						          <ul class="dropdown-menu">
						            <li><a href="<?php echo app_base.'ubah_profil' ?>">Ubah Profil</a></li>
						            <li><a href="<?php echo app_base.'ubah_password' ?>">Ubah Password</a></li>
						            <li><a href="<?php echo app_base.'logout' ?>">Logout</a></li>
						          </ul>
						        </li>
						        <?php }} ?>
						      </ul>
						    </div><!-- /.navbar-collapse -->
						  </div><!-- /.container-fluid -->
						</nav>
						<!-- <marquee>asd</marquee> -->
<?php
// }
?>