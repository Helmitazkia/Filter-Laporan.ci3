<?php
$delete_at = '0';
?>
<div class="card">
	<div class="card-header" style="color: black;">Tambah Barang</div>
	<div class="card-body">
		<form action="<?php echo site_url('Penjualan/AddDataBarang'); ?>" method="post">
			<div class="form-group">
				<label for="jenis">Jenis</label>
				<select class="form-control" name="kd_jns" id="jenis" style="width: 50%;">
					<?php
					foreach ($DataJns as $row) {
						echo '<option value="' . $row->kd_jns . '">' . $row->nama . '</option>';
					}
					?>
				</select>
				<?= form_error('kd_jns', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label for="jenis">Nama</label>
				<td><input type="text" name="nama" class="form-control" style="width: 50%;"></td>
				<?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label for="jenis">Harga</label>
				<input type="text" name="harga" class="form-control" style="width: 50%;">
				<?= form_error('harga', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label for="jenis">Jumlah</label>
				<td><input type="number" name="Jumlah" class="form-control" style="width: 50%;"></td>
				<?= form_error('Jumlah', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label for="jenis">Tanggal Masuk</label>
				<td><input type="date" name="tgl_masuk" class="form-control" style="width: 50%;"></td>
				<?= form_error('tgl_masuk', '<small class="text-danger pl-2">', '</small>'); ?>
				<input type="hidden" name="deleted" class="form-control" style="width: 60%;" value="<?php echo $delete_at; ?>">
			</div>

			<button class="btn btn-primary">Simpan</button>


		</form>
	</div>
</div>