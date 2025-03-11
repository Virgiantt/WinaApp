<div class="col-md-12">
    <div class="card card-primary shadow-none">
        <div class="card-header">
            <h3 class="card-title">Data Member</h3>

            <div class="card-tools">
                <a href="<?= base_url('Member/AddData') ?>" class="btn btn-primary btn-flat btn-sm">
                    <i class=" fas fa-plus"></i> Add
                </a>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('pesan');
                echo '</h5></div>';
            }
            ?>

            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>No HandPhone</th>
                        <th>Password</th>
                        <th>Foto</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($member as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $value['nis'] ?></td>
                            <td><?= $value['nama_siswa'] ?><br>
                                <?php if ($value['verifikasi'] ==  1) { ?>
                                    <a class="text-success"><i class="fa fa-check"></i> Terverifikasi</a>
                                <?php } else { ?>
                                    <a class="text-danger"><i class="fa fa-times"></i> Belum Terverifikasi</a><br>
                                    <a class="btn btn-success btn-xs" href="<?= base_url('Member/Verifikasi/' . $value['id_member']) ?>"> Verifikasi</a>
                                <?php } ?>
                            </td>
                            <td><?= $value['jenis_kelamin'] ?></td>
                            <td><?= $value['nama_kelas'] ?></td>
                            <td><?= $value['no_hp'] ?></td>
                            <td><?= $value['password'] ?></td>
                            <td class="text-center"><img src="<?= base_url('foto/' . $value['foto']) ?>" width="125px" height="125px"></td>
                            <td class="text-center">
                                <a href="<?= base_url('Member/EditData/' . $value['id_member']) ?>" type="button" class="btn btn-warning btn-flat btn-sm">
                                    <i class=" fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#modal-delete<?= $value['id_member'] ?>">
                                    <i class=" fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<!-- /Modal Delete -->
<?php foreach ($member as $key => $value) { ?>
    <div class="modal fade" id="modal-delete<?= $value['id_member'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Member</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open(base_url('Member/DeleteData/' . $value['id_member'])) ?>
                    <div class="form-group">
                        Hapus Siswa?<b><?= $value['nama_siswa'] ?></b>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger btn-flat">Hapus</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>