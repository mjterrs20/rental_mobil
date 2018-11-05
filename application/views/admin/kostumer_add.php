<div class="page-header">
	<h3>Kostumer Baru</h3>
</div>
<form method="post" action="<?php echo base_url().'admin/kostumer_add_act' ?>">
	<div class="form-group">
		<label for="nama">Nama Kostumer</label>
		<input type="text" name="nama" id="nama" class="form-control">

		<?php echo form_error('nama'); ?>
	</div>
	<div class="form-group">
		<label for="alamat">Alamat</label>
		<textarea name="alamat" id="alamat" class="form-control"></textarea>

		
	</div>
	<div class="form-group">
		<label>Jenis Kelamin</label>
		<select name="jk" class="form-control">
			<option value="L">Laki-laki</option>
			<option value="P">Perempuan</option>
		</select>

	</div>
	<div class="form-group">
		<label for="hp">HP</label>
		<input type="number" name="hp" id="hp" class="form-control">
	</div>
	<div class="form-group">
		<label for="ktp">No. KTP</label>
		<input type="number" name="ktp" id="ktp" class="form-control">
	</div>
	<div class="form-group">						
		<input type="submit" value="Simpan" class="btn btn-primary">	
	</div>
</form>