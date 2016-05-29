<div class="row">
	<div class="col-md-3" style="border-right: 1px solid #eee">
		<?php include "view/component/admin-menu.php" ?>
	</div>
	<div class="col-md-9">
		<div class="notif">
			<?php include "view/component/notif.php" ?>
		</div>
		<h4 style="margin:0px;">Kategori Produk : Edit Kategori</h4>
		<hr>
		<?php
		if($data == null){

		}else{

		foreach ($data as $key => $value) {

		?>
		<div class="row">
			<div class="col-md-6">
				<form method="post" action="<?php echo app_base.'update_kategori' ?>">
					<input type="hidden" name="id_kategori" value="<?php echo $value['id_kategori_produk'] ?>">
					<div class="form-group">
						<label>Nama Kategori : </label>
						<input type="text" name="nama_kategori" class="form-control cst" value="<?php echo $value['nama_kategori'] ?>">
					</div>
					<div class="form-group">
						<label>Satuan : </label>
						<select class="form-control cst" name="satuan">
							<option <?php echo ($value['satuan'] == '') ? 'selected' : '' ?> value="">-- Pilih Satuan --</option>
							<option <?php echo ($value['satuan'] == 'm') ? 'selected' : '' ?> value="m">Meter Persegi</option>
							<option <?php echo ($value['satuan'] == 'cm') ? 'selected' : '' ?> value="cm">Centimeter Persegi</option>
							<option <?php echo ($value['satuan'] == 'rim') ? 'selected' : '' ?> value="rim">Rim</option>
						</select>
					</div>
					<div class="form-group">
						<label>Harga / Satuan : </label>
						<input type="text" name="harga" pattern="[0-9].{0,}" title="Gunakan Format Angka" class="form-control cst" value="<?php echo $value['harga'] ?>">
					</div>
					<div class="form-group">
						<a href="<?php echo app_base.'index_kategori' ?>">
							<button class="red" type="button"><i class="fa fa-mail-reply"></i> Kembali</button>
						</a>
						<button class="blue"><i class="fa fa-check"></i> Simpan</button>
					</div>
				</form>
			</div>
		</div>
		<?php }} ?>
	</div>
</div>