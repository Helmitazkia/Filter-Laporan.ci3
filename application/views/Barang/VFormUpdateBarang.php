<div class="card">
	<div class="card-header"><?php echo $title; ?></div>
	<div class="card-body">
		<?php foreach ($barang as $detail) : ?>
			<form action="<?php echo site_url('Penjualan/UpdateDataBarang'); ?>" method="post">
				<table class="table table-bordered">
					<tr>
						<td>Jenis</td>
						<td>
							<input type="hidden" name="kd_barang" value="<?php echo $detail['kd_barang']; ?>">
							<select class="form-control" name="kd_jns">
								<?php
								foreach ($Jbarang as $row) {
									echo '<option value="' . $row->kd_jns . '">' . $row->nama . '</option>';
								}
								?>
							</select>
					</tr>
					<tr>
						<td>Nama</td>
						<td><input type="text" name="nama" value="<?php echo $detail['nama']; ?>" class="form-control" required></td>
					</tr>
					<tr>
						<td>Harga</td>
						<td><input type="number" name="harga" value="<?php echo $detail['harga']; ?>" class="form-control" required></td>
					</tr>
					<tr>
						<td>Jumlah</td>
						<td><input type="number" name="jumlah" value="<?php echo $detail['jumlah']; ?>" class="form-control" required></td>
					</tr>
					<tr>
						<td>Tanggal Masuk</td>
						<td><input type="date" name="tgl_masuk" class="form-control" value="<?php echo $detail['tgl_masuk']; ?>" required></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="btn_simpan" value="Simpan" class="btn btn-primary"></td>
					</tr>
				</table>
			</form>
		<?php endforeach; ?>
	</div>
</div>