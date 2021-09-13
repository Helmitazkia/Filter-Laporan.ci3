<div class="card" style="width: 50%;">
	<div class="card-header">Edit Jnsbarang</div>
	<div class="card-body">
		<?php foreach ($Jbarang as $jenisbarang) { ?>
			<form action="<?php echo site_url('Penjualan/UpdateDataJnsBarang'); ?>" method="post">
				<!-- Token CSRF -->
				<!--<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">-->
				<!-- Token CSRF -->
				<div class="form-group">
					<label> Nama Jenis Barang</label>
					<input type="hidden" name="kd_jns" value="<?php echo $jenisbarang['kd_jns']; ?>">
					<input type="text" name="nama" value="<?php echo $jenisbarang['nama']; ?>" class="form-control" required style="width: 60%;">
					<?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
				</div>
				<button class="btn btn-primary">Simpan</button>


			</form>
		<?php } ?>
	</div>
</div>