<div class="row">
	<div class="col-md-5">
		<img src="<?php echo base_url.'assets/img/home2.jpg' ?>" width="100%" style="margin-bottom:20px;">
	</div>
	<div class="col-md-7">
		<h2 class="logo-container">
			<b>DIGIMAX</b><br>
			<small>Digital Print Solution</small>
		</h2>
		<hr>
		<p>
			DIGIMAX merupakan perusahaan yang bergerak dibidang Grafika dengan slogan “Digital Print Solution”. Digimax Digital Print Solution tergabung dalam INFRA GROUP yang berdiri sejak tahun 1987 dengan nama INFRA REPRO.
		</p>
		<p>
			DIGIMAX melayani outdoor printing, indoor printing, Pod Printing, Laser Cutt, Flatbed Printing, Engraving & Cutting, Car branding, dan Advertising Support.
		</p>
		<p>
			Contoh produk yang ditawarkan antara lain : 
			<ol style="margin-left:0px; padding-left:20px;">
			<?php
			if($kategori->indexKategoriProduk() != null){
			foreach ($kategori->indexKategoriProduk() as $key2 => $value2) {
			?>
				<li><?php echo $value2['nama_kategori'] ?></li>
			<?php }} ?>
			</ol>
			<table>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td>Komp. Pertokoan Sriwijaya No.72A-B, Semarang – 50242, Jawa Tengah</td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td>(024) 841.6955 / 841.6672</td>
				</tr>
				<tr>
					<td>Fax</td>
					<td>:</td>
					<td>(024) 841.7011</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td>printingdigimax@gmail.com</td>
				</tr>
			</table>
		</p>
	</div>
</div>