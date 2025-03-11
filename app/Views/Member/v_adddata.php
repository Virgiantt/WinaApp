<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Member</h3>
        </div>

        <div class="card-body">
            <?php

            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
                <div class="alert alert-danger" role="alert">
                    <h4>Periksa Kembali Data</h4>
                    <ul>
                        <?php foreach ($errors as $key => $error) { ?>
                            <li><?= esc($error) ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>

            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('pesan');
                echo '</h5></div>';
            }
            ?>

            <?php
            echo form_open_multipart('Member/SimpanData');
            ?>
            <div class="row">
                <div class="col-sm-2">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Foto</label>
                                <img src="<?= base_url('foto/blankfoto.jpg') ?>" id="gambar_load" class="img-fluid" width="200px">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>File Foto</label>
                                <input type="file" name="foto" class="form-control" id="preview_gambar" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>NIS</label>
                                <input class="form-control" name="nis" value="<?= old('nis') ?>" placeholder="NIS">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Nama Siswa</label>
                            <input class="form-control" name="nama_siswa" value="<?= old('nama_siswa') ?>" placeholder=" Nama Siswa">
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="">--Jenis Kelamin--</option>
                                    <option value="0">Laki-Laki</option>
                                    <option value="1">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kelas</label>
                                <select name="id_kelas" class="form-control">
                                    <option value="">-Pilih Kelas-</option>
                                    <?php foreach ($kelas as $key => $value) { ?>
                                        <option value="<?= $value['id_kelas'] ?>"><?= $value['nama_kelas'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>No HandPhone</label>
                                <input class="form-control" name="no_hp" value="<?= old('no_hp') ?>" placeholder="No HandPhone">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" name="password" value="<?= old('password') ?>" placeholder="Password">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Simpan</button>
            <a href="<?= base_url('Member') ?>" class="btn btn-warning"><i class="fas fa-share"></i>Kembali</a>
        </div>
        <?php echo form_close() ?>
    </div>
</div>