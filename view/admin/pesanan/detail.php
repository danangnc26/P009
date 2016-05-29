<div class="row">
	<div class="col-md-3" style="border-right: 1px solid #eee">
		<?php include "view/component/admin-menu.php" ?>
	</div>
	<div class="col-md-9">
		<div class="notif">
			<?php include "view/component/notif.php" ?>
		</div>
		<h4 style="margin:0px;">Data Pemesanan : Detail Pemesanan</h4>
		<hr style="margin-bottom:5px;">
		<div class="row">
			<div class="col-md-12">
				<?php
					if($data3 == null){

					}else{
					foreach ($data3 as $key3 => $value3) {
				?>
				<form method="post" action="<?php echo app_base.'update_status_pesan' ?>">
				<table>
					<tr>
						<td>Status Pemesanan</td>
						<td>:</td>
						<td>
							<input type="hidden" name="id_user" value="<?php echo $_GET['id_user'] ?>">
							<input type="hidden" name="id_pesan" value="<?php echo $value3['id_pesan'] ?>">
							<select name="status" class="form-control cst">
								<option value="">-- Pilih Status Pemesanan --</option>
								<option <?php echo ($value3['status'] == '1') ? 'selected' : '' ?> value="1">Pending</option>
							  	<option <?php echo ($value3['status'] == '2') ? 'selected' : '' ?> value="2">Proses Produksi</option>
							  	<option <?php echo ($value3['status'] == '3') ? 'selected' : '' ?> value="3">Proses Pengiriman</option>
							  	<option <?php echo ($value3['status'] == '4') ? 'selected' : '' ?> value="4">Selesai</option>
							</select>
						</td>
						<td>
							<button class="blue"><i class="fa fa-refresh "></i> Ubah Status</button>
						</td>
					</tr>
				</table>
				</form>
				<?php }} ?>
				<hr style="margin-top:5px;">
			</div>
			<div class="col-md-6">
				<table border="0">
					<?php
					if($data3 == null){

					}else{
					foreach ($data3 as $key3 => $value3) {
					?>
					<tr>
						<td>No. Pemesanan</td>
						<td>:</td>
						<td><?php echo $value3['id_pesan'] ?></td>
					</tr>
					<tr>
						<td>Tanggal Pemesanan</td>
						<td>:</td>
						<td><?php echo Lib::dateInd($value3['tanggal']) ?></td>
					</tr>
					<tr>
						<td>Total Pemesanan</td>
						<td>:</td>
						<td><?php echo Lib::ind($value3['total_pemesanan']) ?></td>
					</tr>
					<?php
					}}
					?>	
				</table>
			</div>
			<div class="col-md-6">
			
				<table border="0">
					<?php
					if($data2 == null){

					}else{
					foreach ($data2 as $key2 => $value2) {
					?>
					<tr>
						<td>Nama Pemesan</td>
						<td>:</td>
						<td><?php echo $value2['nama'] ?></td>
					</tr>
					<tr>
						<td>No. Telp</td>
						<td>:</td>
						<td><?php echo $value2['notelp'] ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><?php echo $value2['alamat'] ?></td>
					</tr>
					<?php
					}}
					?>	
				</table>
			</div>
			<div class="col-md-12">
				<hr>
				<div class="row">
						<?php
						if($data == null){
							echo "<tr><td align='center' colspan='8'> -- Belum ada barang yang dipesan -- </td></tr>";
						}else{
						foreach ($data as $key => $value) {
						?>
						<div class="col-md-6">
						<table width="100%">
							<tr>
								<td style="border-bottom:1px dashed #ddd; font-weight:bold" colspan="3">Pesanan No. <?php echo $key+1 ?></td>
							</tr>
							<tr>
								<td width="40%">Produk</td>
								<td width="1%">:</td>
								<td><?php echo Lib::namaKategori($value['id_kategori_produk']) ?></td>
							</tr>
							<tr>
								<td>Jenis Cetak</td>
								<td>:</td>
								<td><?php echo Lib::namaJenis($value['id_jenis_cetak']) ?></td>
							</tr>
							<tr>
								<td>Bahan</td>
								<td>:</td>
								<td><?php echo Lib::namaBahan($value['id_bahan']) ?></td>
							</tr>
							<tr>
								<td>Ukuran</td>
								<td>:</td>
								<td><?php echo $value['u_panjang'].' x '.$value['u_lebar'].' '.Lib::namaSatuan($value['id_kategori_produk']) ?></td>
							</tr>
							<tr>
								<td>Banyaknya Pesanan</td>
								<td>:</td>
								<td><?php echo $value['qty'] ?></td>
							</tr>
							<tr>
								<td>Harga Satuan</td>
								<td>:</td>
								<td><?php echo Lib::ind($value['harga_satuan']) ?></td>
							</tr>
							<tr>
								<td>Harga Total</td>
								<td>:</td>
								<td><?php echo Lib::ind($value['harga_total']) ?></td>
							</tr>
							<tr>
								<td>File Desain</td>
								<td>:</td>
								<td>
									<?php echo ($value['f_desain'] != '') ? '<a target="_blank" href="'.base_url.'public/images/'.$value['f_desain'].'"><i class="fa fa-paperclip"></i> '.$value['f_desain'].'</a>' : '-' ?>
								</td>
							</tr>
							<tr>
								<td>Hasil Jadi</td>
								<td>:</td>
								<td>
									<?php echo ($value['f_hasil_jadi'] != '') ? '<a target="_blank" href="'.base_url.'public/images/'.$value['f_hasil_jadi'].'"><i class="fa fa-paperclip"></i> '.$value['f_hasil_jadi'].'</a>' : '-' ?>
								</td>
							</tr>
							<tr>
								<td colspan="2"></td>
								<td>
									<form method="post" action="<?php echo app_base.'send_hasil_jadi' ?>" enctype="multipart/form-data">
										<input type="hidden" name="id_item" value="<?php echo $value['id_item'] ?>">
										<input type="hidden" name="id_user" value="<?php echo $_GET['id_user'] ?>">
										<input type="hidden" name="id_pesan" value="<?php echo $_GET['id_pesan'] ?>">
										<input class="pull-left" type="file" name="gambar" style="width:155px; " required>
										<button style="padding-left:5px; padding-right:5px; padding-top:3px; padding-bottom:3px; font-size:11px;" class="blue pull-left"><i class="fa fa-send"></i> Kirim</button>
									</form>
								</td>
							</tr>
						</table>
						</div>
						<?php
						$sub_total[] = $value['harga_total'];
						}}
						?>
				</div>
				<!-- <table width="100%" border="1" class="data">
					<thead>
						<tr>
							<th>Produk</th>
							<th>Ukuran</th>
							<th>Catatan</th>
							<th>File Desain</th>
							<th>Qty</th>
							<th>Harga</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if($data == null){
							echo "<tr><td align='center' colspan='8'> -- Belum ada barang yang dipesan -- </td></tr>";
						}else{
						foreach ($data as $key => $value) {
						?>
						<tr>
							<td><?php echo 'Produk : '.Lib::namaKategori($value['id_kategori_produk']).'<br>Jenis Cetak : '.Lib::namaJenis($value['id_jenis_cetak']).'<br>Bahan : '.Lib::namaBahan($value['id_bahan']) ?></td>
							<td><?php echo $value['u_panjang'].' x '.$value['u_lebar'].' '.Lib::namaSatuan($value['id_kategori_produk']) ?></td>
							<td><?php echo $value['catatan'] ?></td>
							<td><?php echo ($value['f_desain'] != '') ? '<a target="_blank" href="'.base_url.'public/images/'.$value['f_desain'].'"><i class="fa fa-paperclip"></i> '.$value['f_desain'].'</a>' : '-' ?></td>
							<td><?php echo $value['qty'] ?></td>
							<td><?php echo Lib::ind($value['harga_satuan']) ?></td>
							<td><?php echo Lib::ind($value['harga_total']) ?></td>
						</tr>
						<?php
						$v['id_pes'] = $value['id_pesan'];
						$sub_total[] = $value['harga_total'];
						}}
						?>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="8">Sub Total</th>
							<td style="font-weight:bold"><?php echo (isset($sub_total)) ? Lib::ind(array_sum($sub_total)) : '' ?></td>
						</tr>
					</tfoot>
				</table> -->
				<hr style="margin-bottom:5px;">
				<a href="<?php echo app_base.'index_pemesanan' ?>">
					<button class="red" type="button"><i class="fa fa-mail-reply"></i> Kembali</button>
				</a>
				<h4 style="margin-top:5px;" class="pull-right">Sub Total : <?php echo (isset($sub_total)) ? Lib::ind(array_sum($sub_total)) : '' ?></h4>
			</div>
		</div>
	</div>
</div>
