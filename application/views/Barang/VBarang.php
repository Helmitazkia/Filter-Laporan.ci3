<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
        <a href="<?php echo site_url('Penjualan/VFormAddBarang'); ?>" role="button" class="btn btn-primary">Tambah Barang</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Jenis</th>
                        <th>nama</th>
                        <th>harga</th>
                        <th>jumlah</th>
                        <th>Tanggal Masuk</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Jenis</th>
                        <th>nama</th>
                        <th>harga</th>
                        <th>jumlah</th>
                        <th>Tanggal Masuk</th>
                        <th>Tools</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    if (!empty($DataBarang)) {
                        foreach ($DataBarang as $ReadDS) {
                    ?>
                            <tr>
                                <td><?php echo $ReadDS->kd_barang; ?></td>
                                <td><?php echo $ReadDS->jenis; ?></td>
                                <td><?php echo $ReadDS->nama; ?></td>
                                <td><?php echo $ReadDS->harga; ?></td>
                                <td><?php echo $ReadDS->jumlah; ?></td>
                                <td><?php echo $ReadDS->tgl_masuk; ?></td>
                                <td>
                                    <a href="<?php echo base_url('Penjualan/EditVformBarang/' . $ReadDS->kd_barang); ?>" class="btn btn-warning" class="btn btn-primary">Update</a>
                                    <a href="<?php echo site_url('Penjualan/DeleteDataBarang/' . $ReadDS->kd_barang) ?>" role="button" class="btn btn-danger" class="btn btn-warning">Delete</a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>