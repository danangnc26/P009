<div class="row">
	<div class="col-md-12">
		<!-- <h4 class="pull-right">
			No.<?php echo mt_rand(100000,999999);  ?>
		</h4> -->
		<h4>Input Pesanan</h4>
		<hr>
		<form method="post" action="<?php echo app_base.'add_item_pesanan' ?>" enctype="multipart/form-data">
		<div class="row">
			
			<div class="col-md-6">
				<div class="form-group">
					<label>Kategori Produk :</label>
					<select id="s_kategori" class="form-control cst" name="id_kategori_produk" required>
						<?php echo Lib::listKategori() ?>
					</select>
				</div>
				<div class="form-group">
					<label>Jenis Cetak :</label>
					<select id="s_jenis" class="form-control cst" name="id_jenis_cetak" required>
						
					</select>
				</div>
				<div class="form-group">
					<label>Bahan :</label>
					<select id="s_bahan" class="form-control cst" name="id_bahan" required>
						
					</select>
				</div>
				<div class="form-group" id="c_ukuran">
					<label><b>Ukuran :</b></label>
					<div class="row">
						<div class="col-md-3">
							<label>Panjang :</label>
							<input id="i_panjang" type="number" class="form-control cst" name="u_panjang" min="1" max="999">
						</div>
						<div class="col-md-3">
							<label>Lebar :</label>
							<input id="i_lebar" type="number" class="form-control cst" name="u_lebar" min="1" max="999">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>File Desain :</label>
					<input type="file" name="gambar">
					<!-- <div class="row">
						<div class="col-md-4">
							<label>
								<input type="radio" name="desain" value="0"> Desain dari digimax
							</label>
							<div class="harga-desain" style="display:none">
								Harga Desain sebesar Rp. <span id="tx_desain"></span>
							</div>
						</div>
						<div class="col-md-4">
							<label>
								<input type="radio" name="desain" value="1"> Desain Sendiri
							</label><br>
							<div class="lamp-desain" style="display:none">
								<label>Lampirkan File Desain : </label>
								<input type="file">
							</div>
						</div>
					</div> -->
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Qty :</label>
					<input id="qty_b" type="number" class="form-control cst" name="qty" min="1" max="999">
				</div>
				<div class="form-group">
					<label>Catatan :</label>
					<textarea class="form-control cst" style="height:56px;" name="catatan"></textarea>
				</div>
				<div class="form-group">
					<label>Harga <span class="sat"><span class="per">/</span> <b class="satuan"></b></span> :</label>
					<input type="text" readonly class="form-control cst" id="harga_b" name="harga_satuan">
				</div>
				<div class="form-group">
					<label>Harga Total :</label>
					<input type="text" readonly class="form-control cst" id="harga_t" name="harga_total">
				</div>
				<div class="form-group">
					<button class="blue pull-right"><i class="fa fa-save"></i> Tambah Pesanan</button>
					<button id="reset_form" type="button" class="green pull-right"><i class="fa fa-refresh"></i> Reset</button>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
<button type="button" style="margin-left:0px;" id="shw_daftar" class="red"><i class="fa fa-eye"></i> Tampilkan Daftar Pesanan</button>
<button type="button" style="margin-left:0px;" id="hd_daftar" class="red"><i class="fa fa-eye-slash"></i> Sembunyikan Daftar Pesanan</button>
<div class="dftr">
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
					<th width="3%"></th>
				</tr>
			</thead>
			<tbody>
				<?php
				if($data == null){
					echo "<tr><td align='center' colspan='9'> -- Belum ada barang yang dipesan -- </td></tr>";
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
					<td data-label="" align="center">
							<a onclick="return confirm('Hapus data ini?')" href="<?php echo app_base.'delete_item&id_item='.$value['id_item'] ?>">
								<i class="fa fa-trash" style="font-size:1.2em"></i>
							</a>
					</td>
				</tr>
				<?php
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
<hr>
<a href="<?php echo app_base.'konfirmasi_pemesanan' ?>">
	<button class="blue pull-right"><i class="fa fa-arrow-right"></i> Lanjutkan Pemesanan</button>
</a>
<script type="text/javascript">
	$('#shw_daftar').click(function(){
		$('.dftr').show();
		$('#hd_daftar').show();
		$('#shw_daftar').hide();
	});
	$('#hd_daftar').click(function(){
		$('.dftr').hide();
		$('#hd_daftar').hide();
		$('#shw_daftar').show();
	});
</script>
  
		<script type="text/javascript">
			$('#reset_form').click(function(){
				$(this).closest('form').find("input[type=text], input[type=number], textarea").val("");
			});
			$('select#s_kategori').change(function(){
				$(this).closest('form').find("input[type=text], input[type=number], textarea").val("");

				var val = $('select#s_kategori option:selected').val();
				var reset = "<option harga='0'></option>";
				$.get("<?php echo func_url ?>func=list_jenis&id_kategori="+val+"&opt=true", function(data){
					$('select#s_jenis').empty();
					if(data == ''){
						$('select#s_jenis').append(reset);
					}else{
						$('select#s_jenis').append(data);	
					}
				});
				$.get("<?php echo func_url ?>func=list_bahan&id_kategori="+val+"&opt=true", function(data){
					$('select#s_bahan').empty();
					if(data == ''){
						$('select#s_bahan').append(reset);
					}else{
						$('select#s_bahan').append(data);
					}
				});
				hitung();
				var stuan = (($('select#s_kategori option:selected').attr('satuan') == 'cm' || $('select#s_kategori option:selected').attr('satuan') == 'm') ? $('select#s_kategori option:selected').attr('satuan')+'<sup>2</sup>' : $('select#s_kategori option:selected').attr('satuan'));

				$('.satuan').html(stuan);
				$('.tx_desain').text();

				if($('select#s_kategori option:selected').attr('satuan') == 'rim'){
					$('#c_ukuran').hide();
				}else{
					$('#c_ukuran').show();
				}
			});

			$('select#s_jenis').change(function(){
				hitung();
			});
			$('select#s_bahan').change(function(){
				hitung();
			});
			$('input#qty_b').keyup(function(){
				hitung();
			});
			$('input#i_panjang, input#i_lebar').blur(function(){
				hitung();
			});	
			$('input[name=desain]').change(function(){
				if($('input[name=desain]:checked').val() == '1'){
					$('.lamp-desain').show();
					$('.harga-desain').hide();
				}else{
					$('.harga-desain').show();
					$('.lamp-desain').hide();
				}
			});

			function hitung()
			{
				var hasil = 0;
				var jenis;
				var bahan;
				var pl;
				var kategori = Number($('select#s_kategori option:selected').attr("harga"));
				var jenis_temp = Number($('select#s_jenis option:selected').attr("harga"));
				var bahan_temp = Number($('select#s_bahan option:selected').attr("harga"));
				var qty = (($('input#qty_b').val() == '') ? 1 : Number($('input#qty_b').val()));
				jenis = ((isNaN(jenis_temp) == true) ? 0 : jenis_temp);
				// if(){
				// 	jenis = 0;
				// }else{
				// 	jenis = jenis_temp;
				// }
				bahan = ((isNaN(bahan_temp) == true) ? 0 : bahan_temp);
				// if(isNaN(bahan_temp) == true){
				// 	bahan = 0;
				// }else{
				// 	bahan = bahan_temp;
				// }
				
				// alert(jenis_temp);
				var panjang = (($('input#i_panjang').val() == '') ? 1 : Number($('input#i_panjang').val()));
				// Number($('input#i_panjang').val());
				var lebar = (($('input#i_lebar').val() == '') ? 1 : Number($('input#i_lebar').val()));
				pl = panjang * lebar;

				harga_satuan = kategori + jenis + bahan;
				harga_pl = harga_satuan * pl;
				harga_tot = harga_pl * qty;
				$('#harga_b').val(harga_satuan);
				$('#harga_t').val(harga_tot)
			}
		</script>

		<!-- <div class="col-md-3">
		<h4>Data Pemesan</h4>
		<hr>
		<div class="form-group">
			<label>Nama Pemesan :</label>
			<input type="text" class="form-control cst" name="">
		</div>
		<div class="form-group">
			<label>No. Telp / HP :</label>
			<input type="text" class="form-control cst" name="">
		</div>
		<div class="form-group">
			<label>Alamat Lengkap :</label>
			<input type="text" class="form-control cst" name="">
		</div>
		<div class="form-group">
			<label>Email :</label>
			<input type="text" class="form-control cst" name="">
		</div>
	</div> -->