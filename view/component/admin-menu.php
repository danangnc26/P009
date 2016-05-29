		<h4 style="margin:0px;">Menu</h4>
		<hr>
		<div class="list-group box-cst">
			
		  <a href="<?php echo app_base.'show_welcome' ?>" class="list-group-item">
		  	Dashboard
		  </a>
		  <a href="<?php echo app_base.'index_kategori' ?>" class="list-group-item">
		  	Kategori
		  </a>
		  <a href="<?php echo app_base.'index_jenis' ?>" class="list-group-item">
		  	Jenis
		  </a>
		  <a href="<?php echo app_base.'index_bahan' ?>" class="list-group-item">
		  	Bahan
		  </a>
		  <a href="<?php echo app_base.'index_pemesanan' ?>" class="list-group-item">
		  	Data Pemesanan
		  </a>
		  <a href="<?php echo app_base.'index_customer' ?>" class="list-group-item">
		  	Data Customer
		  </a>
		  <a href="<?php echo app_base.'index_laporan' ?>" class="list-group-item">
		  	Laporan
		  </a>
		  <!-- <a href="<?php echo app_base.'ubah_password' ?>" class="list-group-item">
		  	Ubah Password
		  </a> -->
		  <a href="<?php echo app_base.'logout' ?>" class="list-group-item">
		  	Logout
		  </a>
		</div>
		<?php
		Lib::isAdmin();
		?>