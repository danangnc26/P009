<div class="row">
	<div class="col-md-3" style="border-right: 1px solid #eee">
		<?php include "view/component/admin-menu.php" ?>
	</div>
	<div class="col-md-9">
		<div class="notif">
			<?php include "view/component/notif.php" ?>
		</div>
		<h4 style="margin:0px;">Jenis Cetak : <?php echo (isset($_GET['nama_kategori']) && isset($_GET['id_kategori'])) ? $_GET['nama_kategori'] : '' ?></h4>
		<hr>
		<br>
		<div class="row">
			<div class="col-md-12">
				<a href="<?php echo app_base.'create_jenis' ?>">
					<button class="blue"><i class="fa fa-plus"></i> Tambahkan Jenis Cetak</button>
				</a>
				<!-- Split button -->
				<div class="btn-group pull-right">
				  <button type="button" class="btn green">Kategori</button>
				  <button type="button" class="btn green dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <span class="caret"></span>
				    <span class="sr-only">Toggle Dropdown</span>
				  </button>
				  <ul class="dropdown-menu">
				  	<?php
				  	if($kategori->indexKategoriProduk() != null){
				  	foreach ($kategori->indexKategoriProduk() as $key2 => $value2) {
				  	?>
				    <li><a href="<?php echo app_base.'index_jenis&id_kategori='.$value2['id_kategori_produk'] ?>&nama_kategori=<?php echo $value2['nama_kategori'] ?>"><?php echo $value2['nama_kategori'] ?></a></li>
				    <?php }} ?>
				  </ul>
				</div>
				<br><br>
				<table width="100%" border="1" class="data">
					<tr>
						<th width="20">No.</th>
						<th>Kategori</th>
						<th>Jenis Cetak</th>
						<th>Harga</th>
						<th>Action</th>
					</tr>
					<?php
					if($data == null)
					{
						echo "<tr><td colspan='5'  align='center'> -- Data tidak ditemukan -- </td></tr>";
					}else{
					foreach ($data as $key => $value) {
					?>
					<tr>
						<td><?php echo $key+1 ?></td>
						<td><?php echo Lib::getKategoriName($value['id_kategori_produk']) ?></td>
						<td><?php echo $value['nama_jenis_cetak'] ?></td>
						<td><?php echo Lib::ind($value['harga']) ?></td>
						<td width="130">
							<a href="<?php echo app_base.'edit_jenis&id_jenis='.$value['id_jenis_cetak'] ?>">
								<button style="border:none; background:none; color:#000">
									<i class="fa fa-edit" style="font-size:1.2em"></i>
								</button>
							</a>
							<a onclick="return confirm('Hapus data ini?')" href="<?php echo app_base.'delete_jenis&id_jenis='.$value['id_jenis_cetak'] ?>">
								<button style="border:none; background:none; color:#000">
									<i class="fa fa-trash" style="font-size:1.2em"></i>
								</button>
							</a>
						</td>
					</tr>
					<?php }} ?>
				</table>
			</div>
		</div>
	</div>
</div>
