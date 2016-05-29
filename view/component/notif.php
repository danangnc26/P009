			<?php if(Lib::pendingNotif() != 0){ ?>
			<a href="<?php echo app_base.'index_pemesanan' ?>" style="color:#fff">
				<div id="notif" class="alert green" role="alert" style="color:#fff; padding:10px;">
				  <i class="fa  fa-exclamation-triangle" style="margin-right:10px;"></i> 
				  <?php echo Lib::pendingNotif() ?> Pesanan Menunggu Untuk Diproses
				  <a onclick="$('#notif').hide()" class="pull-right" href="#" style="color:#fff;"><i class="fa fa-close"></i> </a>
				</div>
			</a>
			<?php } ?>