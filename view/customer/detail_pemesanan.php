<div class="row">
	<div class="col-md-12">
		<h4>Data Pemesanan</h4>
		<hr>
		<div class="row">
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
					<tr>
						<td>Status</td>
						<td>:</td>
						<td><?php echo Lib::status($value3['status']) ?></td>
					</tr>
					<?php
					}}
					?>	
				</table>
			</div>

			<div class="col-md-6">
				<div class="xxx">
					<hr>
				</div>
				
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
								<td><?php echo (Lib::namaSatuan($value['id_kategori_produk']) != 'rim') ? $value['u_panjang'].' x '.$value['u_lebar'].' '.Lib::namaSatuan($value['id_kategori_produk']) : Lib::namaSatuan($value['id_kategori_produk']) ?></td>
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
						</table>
						</div>
						<?php
						$sub_total[] = $value['harga_total'];
						}}
						?>
				</div>
				<hr style="margin-bottom:5px;">
				<div class="row">
					<div class="col-md-12">
						<h4 style="margin-top:5px;" class="pull-right">Sub Total : <?php echo (isset($sub_total)) ? Lib::ind(array_sum($sub_total)) : '' ?></h4>
					</div>
				</div>
				<hr>
				<a href="<?php echo app_base.'data_pemesanan' ?>">
					<button class="red" type="button"><i class="fa fa-mail-reply"></i> Kembali</button>
				</a>
			</div>
		</div>
	</div>
</div>

