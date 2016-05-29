<div class="row">
	<div class="col-md-3" style="border-right: 1px solid #eee">
		<?php include "view/component/admin-menu.php" ?>
	</div>
	<div class="col-md-9">
		<div class="notif">
			<?php include "view/component/notif.php" ?>
		</div>
		<h4 style="margin:0px;">Kategori Produk</h4>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<a href="<?php echo app_base.'create_kategori' ?>">
					<button class="blue"><i class="fa fa-plus"></i> Tambahkan Kategori</button>
				</a>
				<br><br>
				<table width="100%" border="1" class="data">
					<tr>
						<th width="20">No.</th>
						<th>Produk</th>
						<th>Satuan</th>
						<th>Harga</th>
						<th>Action</th>
					</tr>
					<?php
					if($data == null)
					{
						echo "<tr><td colspan='5' align='center'> -- Data tidak ditemukan -- </td></tr>";
					}else{
					foreach ($data as $key => $value) {
					?>
					<tr>
						<td><?php echo $key+1 ?></td>
						<td><?php echo $value['nama_kategori'] ?></td>
						<td><?php echo (!empty($value['satuan'])) ? Lib::persegi($value['satuan']) : '' ?></td>
						<td><?php echo Lib::ind($value['harga']) ?></td>
						<td width="130">
							<a href="<?php echo app_base.'edit_kategori&id_kategori='.$value['id_kategori_produk'] ?>">
								<button style="border:none; background:none; color:#000">
									<i class="fa fa-edit" style="font-size:1.2em"></i>
								</button>
							</a>
							<a onclick="return confirm('Hapus data ini?')" href="<?php echo app_base.'delete_kategori&id_kategori='.$value['id_kategori_produk'] ?>">
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
