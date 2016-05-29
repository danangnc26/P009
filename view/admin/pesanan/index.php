<div class="row">
	<div class="col-md-3" style="border-right: 1px solid #eee">
		<?php include "view/component/admin-menu.php" ?>
	</div>
	<div class="col-md-9">
		<div class="notif">
			<?php include "view/component/notif.php" ?>
		</div>
		<h4 style="margin:0px;">Data Pemesanan</h4>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<table width="100%" border="1" class="data">
					<tr>
						<th width="20">No.</th>
						<th>No. Pemesanan</th>
						<th>Tanggal</th>
						<th>Nama Pemesan</th>
						<th>Status Pemesanan</th>
						<th width="25%">Action</th>
					</tr>
					<?php
					if($data == null){
						echo "<tr><td align='center' colspan='6'> -- Data tidak ditemukan -- </td></tr>";
					}else{
					foreach ($data as $key => $value) {
					?>
					<tr>
						<td><?php echo $key+1 ?></td>
						<td><?php echo $value['id_pesan'] ?></td>
						<td><?php echo Lib::dateInd($value['tanggal']) ?></td>
						<td><?php echo $user->getUserName($value['id_user']) ?></td>
						<td><?php echo Lib::status($value['status']) ?></td>
						<td align="center">
							<a href="<?php echo app_base.'detail_pemesanan&id_pesan='.$value['id_pesan'].'&id_user='.$value['id_user'] ?>">
								<button style="margin-left:0px;" class="blue"><i class="fa fa-eye"></i> Detail</button>
							</a>
							<a onclick="return confirm('Hapus Pesanan?')" href="<?php echo app_base.'delete_pesanan&id_pesan='.$value['id_pesan'] ?>">
								<button style="margin-left:0px;" class="red"><i class="fa fa-trash"></i> Hapus</button>
							</a>
						</td>
					</tr>
					<?php
					}}
					?>
				</table>
			</div>
		</div>
	</div>
</div>
