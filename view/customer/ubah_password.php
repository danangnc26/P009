<div class="row">
	<div class="col-md-12">
		<h4>Ubah Password</h4>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<form method="post" action="<?php echo app_base.'update_password' ?>">
							<div class="form-group">
								<label>Password Baru : </label>
								<input type="password" id="password1" name="password" class="form-control cst" required placeholder="Tulis Password Baru">
							</div>
							<div class="form-group">
								<label>Konfirmasi Password Baru : </label>
								<input type="password" id="password2" name="password2" class="form-control cst" required placeholder="Tulis Konfirmasi Password Baru">
							</div>
							<div class="form-group">
								<button class="pull-right blue"><i class="fa fa-check"></i> Simpan</button>
								<a href="<?php echo app_base.'home' ?>">
									<button type="button" class="pull-right red"><i class="fa fa-mail-reply"></i> Kembali</button>
								</a>
							</div>
				</form>
			</div>
		</div>
	</div>
</div>
			<script type="text/javascript">
			$('#password2').change(function(){
				validatePassword();
			});
			function validatePassword(){
			var pass2=$("#password2").val();
			var pass1=$("#password1").val();
			if(pass1!=pass2){
				// document.getElementById("password2").setCustomValidity("Passwords Don't Match");
				alert('Password tidak sama, silahkan ulangi lagi.');
			}}
			</script>