<div class="row">
	<div class="col-md-3" style="border-right: 1px solid #eee">
		<?php include "view/component/admin-menu.php" ?>
	</div>
	<div class="col-md-9">
		<div class="notif">
			<?php include "view/component/notif.php" ?>
		</div>
		<h4 style="margin:0px;">Data Customer</h4>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<table width="100%" border="1" class="data">
					<tr>
						<th width="20">No.</th>
						<th>Username</th>
						<th>Nama</th>
						<th>Email</th>
						<th>No. Telp</th>
						<th>Alamat</th>
						<th width="100">Action</th>
					</tr>
					<?php
					if($data == null){
						echo "<tr><td align='center' colspan='7'> -- Data tidak ditemukan -- </td></tr>";
					}else{
					foreach ($data as $key => $value) {
					?>
					<tr>
						<td><?php echo $key+1 ?></td>
						<td><?php echo $value['username'] ?></td>
						<td><?php echo $value['nama'] ?></td>
						<td><?php echo $value['email'] ?></td>
						<td><?php echo $value['notelp'] ?></td>
						<td><?php echo $value['alamat'] ?></td>
						<td align="center">
							<a onclick="return confirm('Hapus data ini?')" href="<?php echo app_base.'delete_customer&id_user='.$value['id_user'] ?>">
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
