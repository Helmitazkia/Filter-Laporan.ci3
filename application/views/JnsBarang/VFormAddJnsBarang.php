<?php
$delete_at = '0';
?>
<div class="card" style="width: 50%;">
	<div class="card-header" style="color: black;">Tambah JnsBarang</div>
	<div class="card-body">
		<!---<font color="red"><?php echo validation_errors(); ?></font>-->
		<form action="<?php echo site_url('Penjualan/AddDataJnsBarang'); ?>" method="post">

			<!-- Token CSRF -->
			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
			<!-- Token CSRF -->

			<div class="form-group">
				<label style="color: black;">Nama jenis:</label>
				<td><input type="text" name="nama" class="form-control" style="width: 60%;"></td>
				<?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
				<input type="hidden" name="deleted" class="form-control" style="width: 60%;" value="<?php echo $delete_at; ?>">
			</div>
			<button class="btn btn-primary">Simpan</button>

		</form>
	</div>
</div>