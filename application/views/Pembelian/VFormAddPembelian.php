<div class="card" style="width: 50%;">
	<div class="card-header" style="color: black;"><?php echo $title; ?> </div>
	<div class="card-body">
		<form action="<?php echo base_url('Penjualan/AddDataPembelian'); ?>" method="post">
			<div class="form-group">
				<label for="jenis">Struk</label>
				<td><input type="text" name="struk" class="form-control"></td>
				<?= form_error('struk', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label for="jenis">Barang</label>
				<select class="form-control" name="kd_barang">
					<?php
					foreach ($DataBarang as $row) {
						echo '<option value="' . $row->kd_barang . '">' . $row->nama . '</option>';
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="jenis">Jumlah beli</label>
				<td><input type="text" name="jml_beli" class="form-control"></td>
				<?= form_error('jml_beli', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label for="jenis">Tanggal Beli</label>
				<td><input type="date" name="tgl_beli" class="form-control" style="width: 50%;"></td>
				<?= form_error('tgl_beli', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>

			<button class="btn btn-primary">Simpan</button>


		</form>
	</div>
</div>