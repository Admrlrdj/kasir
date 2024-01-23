<div class="col-md-9">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-produk"><i class="fas fa-plus"></i> Add Data <?= $subjudul ?>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('pesan');
                echo '</h5></div>';
            }
            ?>

            <?php
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
                <div class="alert alert-danger alert-dismissible">
                    <h4>Periksa Kembali Entry Form !!</h4>
                    <ul>
                        <?php foreach ($errors as $key => $error) { ?>
                            <li><?= esc($error) ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
            <table id="example1" class="table table-bordered table-responsive">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Kode Produk</th>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($produk as $key => $value) { ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $value['kode_produk'] ?></td>
                            <td><?= $value['nama_produk'] ?></td>
                            <td><?= $value['nama_kategori'] ?></td>
                            <td>Rp <?= number_format($value['harga_beli'], 0) ?></td>
                            <td>Rp <?= number_format($value['harga_jual'], 0) ?></td>
                            <td><?= $value['nama_satuan'] ?></td>
                            <td><?= $value['stok'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-produk<?= $value['id_produk'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete-produk<?= $value['id_produk'] ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- /add-modal -->
<div class="modal fade" id="add-produk">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Data <?= $subjudul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('Produk/InsertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Kode Produk</label>
                    <input name="kode_produk" class="form-control" value="<?= old('kode_produk') ?>" placeholder="Masukkan Kode Produk" required>
                </div>
                <div class="form-group">
                    <label for="">Nama Produk</label>
                    <input name="nama_produk" class="form-control" value="<?= old('nama_produk') ?>" placeholder="Masukkan Nama Produk" required>
                </div>
                <div class="form-group">
                    <label for="">Kategori</label>
                    <select name="kategori" class="form-control">
                        <option value=""> ---Pilih Kategori--- </option>
                        <?php foreach ($kategori as $key => $value) { ?>
                            <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Satuan</label>
                    <select name="satuan" class="form-control">
                        <option value=""> ---Pilih Satuan--- </option>
                        <?php foreach ($satuan as $key => $value) { ?>
                            <option value="<?= $value['id_satuan'] ?>"><?= $value['nama_satuan'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Harga Beli</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input name="harga_beli" id="harga_beli" value="<?= old('harga_beli') ?>" class="form-control" placeholder="Masukkan Harga Beli" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Harga Jual</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input name="harga_jual" id="harga_jual" value="<?= old('harga_jual') ?>" class="form-control" placeholder="Masukkan Harga Jual" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Stok</label>
                    <input name="stok" type="number" value="<?= old('stok') ?>" class="form-control" placeholder="Masukkan Stok" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat">Save</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php foreach ($produk as $key => $value) { ?>
    <!-- /edit-modal -->
    <div class="modal fade" id="edit-produk<?= $value['id_produk'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('Produk/UpdateData/' . $value['id_produk']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Kode Produk</label>
                        <input name="kode_produk" class="form-control" value="<?= $value['kode_produk'] ?>" placeholder="Masukkan Kode Produk" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Produk</label>
                        <input name="nama_produk" class="form-control" value="<?= $value['nama_produk'] ?>" placeholder="Masukkan Nama Produk" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="kategori" class="form-control">
                            <option value=""> ---Pilih Kategori--- </option>
                            <?php foreach ($kategori as $key => $k) { ?>
                                <option value="<?= $k['id_kategori'] ?>" <?= $value['id_kategori'] == $k['id_kategori'] ? 'Selected' : '' ?>><?= $k['nama_kategori'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Satuan</label>
                        <select name="satuan" class="form-control">
                            <option value=""> ---Pilih Satuan--- </option>
                            <?php foreach ($satuan as $key => $s) { ?>
                                <option value="<?= $s['id_satuan'] ?>" <?= $value['id_satuan'] == $s['id_satuan'] ? 'Selected' : '' ?>><?= $s['nama_satuan'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Harga Beli</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input name="harga_beli" id="harga_beli<?= $value['id_produk'] ?>" value="<?= $value['harga_beli'] ?>" class="form-control" placeholder="Masukkan Harga Beli" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Harga Jual</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input name="harga_jual" id="harga_jual<?= $value['id_produk'] ?>" value="<?= $value['harga_jual'] ?>" class="form-control" placeholder="Masukkan Harga Jual" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input name="stok" type="number" value="<?= $value['stok'] ?>" class="form-control" placeholder="Masukkan Stok" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat">Save</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<!-- /delete-modal -->
<?php foreach ($produk as $key => $value) { ?>
    <div class="modal fade" id="delete-produk<?= $value['id_produk'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Hapus Data Satuan <b><?= $value['nama_produk'] ?></b> ..?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('Produk/DeleteData/' . $value['id_produk']) ?>" class="btn btn-danger btn-flat">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            "paging": true,
            "info": true,
            "ordering": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    new AutoNumeric('#harga_jual', {
        digitGroupSeparator: ',',
        decimalPlaces: 0
    });
    new AutoNumeric('#harga_beli', {
        digitGroupSeparator: ',',
        decimalPlaces: 0,
    });

    <?php foreach ($produk as $key => $value) { ?>
        new AutoNumeric('#harga_jual<?= $value['id_produk'] ?>', {
            digitGroupSeparator: ',',
            decimalPlaces: 0
        });
        new AutoNumeric('#harga_beli<?= $value['id_produk'] ?>', {
            digitGroupSeparator: ',',
            decimalPlaces: 0,
        });
    <?php } ?>
</script>

<script>
    // Fungsi untuk menutup alert secara otomatis
    function closeAlert() {
        $('.alert').fadeOut('slow'); // Menggunakan jQuery untuk fade out alert
    }

    // Fungsi untuk memanggil closeAlert() setelah beberapa detik (misal: 5 detik)
    function setupAlertTimer() {
        setTimeout(closeAlert, 2000); // 5000 milidetik (5 detik)
    }

    // Panggil fungsi setupAlertTimer() saat dokumen siap (selesai di-load)
    $(document).ready(function() {
        setupAlertTimer();
    });
</script>