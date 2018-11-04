<div class="page-header">
	<h3>Mobil Baru</h3>
</div>
<form method="post" action="<?php echo base_url().'admin/mobil_add_act' ?>">
	<div class="form-group">
		<label for="merk">Merk Mobil</label>
		<input type="text" name="merk" id="merk" class="form-control">
		<?php echo form_error('merk'); ?>
	</div>
	<div class="form-group">
		<label for="plat">No. Plat Kendaraan</label>
		<input type="text" name="plat" id="plat" class="form-control">
	</div>

	<div class="form-group">
		<label for="warnat">Warna</label>
		<input type="text" name="warna" id="warna" class="form-control">
	</div>

	<div class="form-group">
		<label for="tahun">Tahun Kendaraan</label>
		<input type="text" name="tahun" id="tahun" class="form-control">
	</div>

	<div class="form-group">
		<label>Status Mobil</label>
		<select name="status" class="form-control">
			<option value="1">Tersedia</option>
			<option value="2">Sedang Di Rental</option>
		</select>
		<?php echo form_error('status'); ?>
	</div>	
	<div class="form-group">
		<input type="submit" value="Simpan" class="btn btn-primary">
	</div>
</form>