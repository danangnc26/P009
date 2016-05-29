<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-4">
				<h4>Data Pemesan</h4>
				<hr>
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
			<div class="col-md-5">
				<h4>Metode Pembayaran</h4>
				<hr>
				<table>
					<tr>
						<td>Metode Pembayaran</td>
						<td>:</td>
						<td>Transfer</td>
					</tr>
					<tr>
						<td valign="top">Bank Account</td>
						<td valign="top">:</td>
						<td valign="top">
							<li> BCA 0191092121  - a.n CV.Digimax</li>
					  		<li> BNI 4021390131  - a.n CV.Digimax</li>
					  		<li> Mandiri 3824719223  - a.n CV.Digimax</li>
					  		<li> BRI 1938183102  - a.n CV.Digimax</li>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-md-3">
				<h4>Pengiriman</h4>
				<hr>
				<table>
					<tr>
						<td>Kurir</td>
						<td>:</td>
						<td>JNE ( REG )</td>
					</tr>
					<tr>
						<td>Lama Pengiriman</td>
						<td>:</td>
						<td>3 - 6 Hari Kerja</td>
					</tr>
					<tr>
						<td>Biaya</td>
						<td>:</td>
						<td>Rp. 20.000</td>
					</tr>
				</table>
			</div>
		</div>
		<h4>Daftar Pesanan</h4>
		<hr>
		<table width="100%" border="1" class="resp data">
			<thead>
				<tr>
					<th>Produk</th>
					<th>Jenis Cetak</th>
					<th>Bahan</th>
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
					<td data-label="Produk"><?php echo Lib::namaKategori($value['id_kategori_produk']) ?></td>
					<td data-label="Jenis"><?php echo Lib::namaJenis($value['id_jenis_cetak']) ?></td>
					<td data-label="Bahan"><?php echo Lib::namaBahan($value['id_bahan']) ?></td>
					<td data-label="Ukuran"><?php echo $value['u_panjang'].' x '.$value['u_lebar'].' '.Lib::namaSatuan($value['id_kategori_produk']) ?></td>
					<td data-label="Catatan"><?php echo $value['catatan'] ?></td>
					<td data-label="File Desain"><?php echo ($value['f_desain'] != '') ? '<a target="_blank" href="'.base_url.'public/images/'.$value['f_desain'].'"><i class="fa fa-paperclip"></i> '.$value['f_desain'].'</a>' : '-' ?></td>
					<td data-label="Qty"><?php echo $value['qty'] ?></td>
					<td data-label="Harga"><?php echo Lib::ind($value['harga_satuan']) ?></td>
					<td data-label="Total"><?php echo Lib::ind($value['harga_total']) ?></td>
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
		</table>		
	</div>
</div>

<hr>
<a onclick="return confirm('Pesanan yang dikirim tidak dapat diubah lagi, lanjutkan?')" href="<?php echo app_base.'kirim_pesanan&id_pesan='.$v['id_pes'] ?>">
	<button class="blue pull-right"><i class="fa fa-send"></i> Kirim Pesanan</button>
</a>
<a href="<?php echo app_base.'create_order' ?>">
	<button class="red pull-right"><i class="fa fa-arrow-left"></i> Kembali</button>
</a>
