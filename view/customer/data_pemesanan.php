<div class="row">
	<div class="col-md-12">
		<h4>Data Pemesanan</h4>
		<hr>
		<table class="data resp" border="1" width="100%">
			<thead>
				<tr>
					<th width="3%">No.</th>
					<th>No. Pesanan</th>
					<th>Tanggal Pesan</th>
					<th>Status Pesanan</th>
					<th width="21%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if($data == null){
					echo "<tr><td align='center' colspan='5'> -- Data tidak ditemukan -- </td></tr>";
				}else{
				foreach ($data as $key => $value) {
				?>
				<tr>
					<td data-label="No."><?php echo $key+1 ?></td>
					<td data-label="No. Pemesanan"><?php echo $value['id_pesan'] ?></td>
					<td data-label="Tanggal Pesan"><?php echo Lib::dateInd($value['tanggal']) ?></td>
					<td data-label="Status Pesanan"><?php echo Lib::status($value['status']) ?></td>
					<td align="center">
						<a href="<?php echo app_base.'detail_pemesanan_customer&id_pesan='.$value['id_pesan'] ?>">
							<button style="margin-left:0px;" class="green"><i class="fa fa-eye"></i> Detail</button>
						</a>
						<?php
						if($value['status'] == '4'){
						?>
						<a onclick="alert('Anda tidak bisa membatalkan pesanan dengan status Selesai.')">
							<button style="margin-left:0px;" class="default"><i class="fa fa-close"></i> Batalkan</button>
						</a>
						<?php
						}else{
						?>
						<a onclick="return confirm('Batalkan pemesanan?')" href="<?php echo app_base.'cancel_pesanan&id_pesan='.$value['id_pesan'] ?>">
							<button style="margin-left:0px;" class="red"><i class="fa fa-close"></i> Batalkan</button>
						</a>
						<?php
						}
						?>
					</td>
				</tr>
				<?php
				}}
				?>
			</tbody>
		</table>
	</div>
</div>

