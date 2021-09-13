<div class="card">
	<div class="card-header"><?php echo $title; ?></div>
	<div class="card-body">
		<?php foreach ($Datapembelian as $detail) { ?>
			<form action="<?php echo base_url('Penjualan/UpdateDataPembelian'); ?>" method="post">
				<table class="table table-bordered">
					<tr>
						<td>Struk</td>
						<td><input type="hidden" name="kd_pembelian" value="<?php echo $detail['kd_pembelian']; ?>">
							<input type="text" name="struk" value="<?php echo $detail['struk']; ?>" class="form-control" required>
						</td>
					</tr>
					<tr>
						<td>Barang</td>
						<td>
							<select class="form-control" name="kd_barang" required>
								<?php
								foreach ($DataBarang as $row) {
									echo '<option value="' . $row->kd_barang . '">' . $row->nama . '</option>';
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Jumlah Beli</td>
						<td><input type="text" name="jml_beli" value="<?php echo $detail['jml_beli']; ?>" class="form-control" required></td>
					</tr>
					<tr>
						<td>Tanggal Masuk</td>
						<td><input type="date" name="tgl_beli" class="form-control" value="<?php echo $detail['tgl_beli']; ?>" required></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="btn_simpan" value="Simpan" class="btn btn-primary" required></td>
					</tr>
				</table>
			</form>
		<?php } ?>
	</div>
</div>