<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
        <a href="<?php echo site_url('Penjualan/VFormAddPembelian'); ?>" role="button" class="btn btn-primary">Tambah Pembelian</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>kode Pembelian</th>
                        <th>Struk</th>
                        <th>kode barang</th>
                        <th>Jumlah beli</th>
                        <th>Tanggal beli</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>kode Pembelian</th>
                        <th>Struk</th>
                        <th>kode barang</th>
                        <th>Jumlah beli</th>
                        <th>Tanggal beli</th>
                        <th>Tools</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    if (!empty($Datapembelian)) {
                        foreach ($Datapembelian as $ReadDS) {
                    ?>
                            <tr>
                                <td><?php echo $ReadDS->kd_pembelian; ?></td>
                                <td><?php echo $ReadDS->struk; ?></td>
                                <td><?php echo $ReadDS->nama; ?></td>
                                <td><?php echo $ReadDS->jml_beli; ?></td>
                                <td><?php echo $ReadDS->tgl_beli; ?></td>
                                <td>
                                    <a href="<?php echo site_url('Penjualan/EditVpembelian/' . $ReadDS->kd_pembelian); ?>" role="button" class="btn btn-warning" class="btn btn-primary">Update</a>
                                    <a href="<?php echo site_url('Penjualan/DeleteDataPembelian/' . $ReadDS->kd_pembelian) ?>" role="button" class="btn btn-danger" class="btn btn-warning">Delete</a>
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