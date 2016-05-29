<div class="row">
	<div class="col-md-12">
		<h4>Ubah Profil</h4>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<?php
				if($data == null){

				}else{
				foreach ($data as $key => $value) {
				?>
				<form method="post" action="<?php echo app_base.'update_profil' ?>">
							<div class="form-group">
								<label>Nama Lengkap : </label>
								<input name="nama" type="text" class="form-control cst" placeholder="Nama Lengkap" required value="<?php echo $value['nama'] ?>">
							</div>
							<div class="form-group">
								<label>Email : </label>
								<input name="email" type="email" class="form-control cst" placeholder="Email" required value="<?php echo $value['email'] ?>">
							</div>
							<div class="form-group">
								<label>No. Telp / HP : </label>
								<input name="notelp" type="text" class="form-control cst" placeholder="No. Telp / HP" required value="<?php echo $value['notelp'] ?>">
							</div>
							<div class="form-group">
								<label>Alamat :</label>
								<input name="alamat" type="text" class="form-control cst" placeholder="Alamat" required value="<?php echo $value['alamat'] ?>">
							</div>
							<div class="form-group">
								<label>Jenis Kelamin : </label>
								<select name="jeniskelamin" class="form-control cst" required>
									<option <?php echo ($value['jeniskelamin'] == '') ? 'selected' : '' ?>>-- Jenis Kelamin --</option>
									<option <?php echo ($value['jeniskelamin'] == 'L') ? 'selected' : '' ?> value="L">Laki - laki</option>
									<option <?php echo ($value['jeniskelamin'] == 'P') ? 'selected' : '' ?> value="P">Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<button class="pull-right blue"><i class="fa fa-check"></i> Simpan</button>
								<a href="<?php echo app_base.'home' ?>">
									<button type="button" class="pull-right red"><i class="fa fa-mail-reply"></i> Kembali</button>
								</a>
							</div>
				</form>
				<?php }} ?>
			</div>
		</div>
	</div>
</div>