<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
        <a href="<?php echo base_url('Penjualan/VFormAddJnsBarang'); ?>" class="btn btn-primary">Tambah Jenis Barang</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode Jenis</th>
                        <th>nama</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Kode Jenis</th>
                        <th>nama</th>
                        <th>Tools</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php

                    foreach ($Jbarang as $ReadDS) {
                    ?>
                        <tr>
                            <td><?php echo $ReadDS->kd_jns; ?></td>
                            <td><?php echo $ReadDS->nama; ?></td>
                            <td>
                                <a href="<?php echo base_url('Penjualan/EditVformJenisBarang/' . $ReadDS->kd_jns); ?>" class="btn btn-warning" class="btn btn-primary">Update</a>
                                <a href="<?php echo site_url('Penjualan/DeleteDataJnsBarang/' . $ReadDS->kd_jns); ?>" role="button" class="btn btn-danger" class="btn btn-warning">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>