<div class="row">
	<div class="col-md-3" style="border-right: 1px solid #eee">
		<?php include "view/component/admin-menu.php" ?>
	</div>
	<div class="col-md-9">
		<div class="notif">
			<?php include "view/component/notif.php" ?>
		</div>
		<h4 style="margin:0px;">Jenis Cetak : Tambah Jenis Cetak</h4>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<form method="post" action="<?php echo app_base.'save_jenis' ?>">
					<div class="form-group">
						<label>Kategori Produk: </label>
						<select class="form-control cst" name="id_kategori_produk" required>
							<?php echo Lib::listKategori() ?>
						</select>
					</div>
					<div class="form-group">
						<label>Nama Jenis Cetak : </label>
						<input type="text" name="nama_jenis_cetak" class="form-control cst">
					</div>
					<div class="form-group">
						<label>Harga : </label>
						<input type="text" pattern="[0-9].{0,}" title="Gunakan Format Angka" name="harga" class="form-control cst">
					</div>
					<div class="form-group">
						<a href="<?php echo app_base.'index_jenis' ?>">
							<button class="red" type="button"><i class="fa fa-mail-reply"></i> Kembali</button>
						</a>
						<button class="blue"><i class="fa fa-check"></i> Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>