<div class="col-md-7">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-user"><i class="fas fa-plus"></i> Add Data <?= $subjudul ?>
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
            <table id="example1" class="table table-bordered table-responsive">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>User</th>
                        <th>E-Mail</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($user as $key => $value) { ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_user'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><?= $value['password'] ?></td>
                            <td><?php
                                if ($value['role'] == 1) { ?>
                                    <span class="badge bg-success">Admin</span>
                                <?php } else { ?>
                                    <span class="badge bg-primary">Kasir</span>
                                <?php } ?>
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-user<?= $value['id_user'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete-user<?= $value['id_user'] ?>"><i class="fas fa-trash"></i></button>
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
<div class="modal fade" id="add-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Data <?= $subjudul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('User/InsertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama User</label>
                    <input name="nama_user" class="form-control" placeholder="Masukkan Nama User" required>
                </div>
                <div class="form-group">
                    <label for="">E-Mail</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan E-Mail" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role" class="form-control">
                        <option value="1">Admin</option>
                        <option value="2" selected>Kasir</option>
                    </select>
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

<!-- /edit-modal -->
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="edit-user<?= $value['id_user'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('User/UpdateData/' . $value['id_user']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama User</label>
                        <input name="nama_user" class="form-control" value="<?= $value['nama_user'] ?>" placeholder="Masukkan Nama User" required>
                    </div>
                    <div class="form-group">
                        <label for="">E-Mail</label>
                        <input type="email" name="email" class="form-control" value="<?= $value['email'] ?>" placeholder="Masukkan E-Mail" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" value="<?= $value['password'] ?>" placeholder="Masukkan Password" required>
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role" class="form-control">
                            <option value="1" <?= $value['role'] == 1 ? 'Selected' : '' ?>>Admin</option>
                            <option value="2" <?= $value['role'] == 2 ? 'Selected' : '' ?>>Kasir</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning btn-flat">Save</button>
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
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="delete-user<?= $value['id_user'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Hapus Data User <b><?= $value['nama_user'] ?></b> ..?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('User/DeleteData/' . $value['id_user']) ?>" class="btn btn-danger btn-flat">Delete</a>
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
        })
    });
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