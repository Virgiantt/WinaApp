<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data User</h3>
        </div>

        <?php
        echo form_open_multipart('Buku/SimpanData');
        ?>

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
            <div class="row">
                <div class="col-sm-2">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Cover </label>
                            <img src="<?= base_url('foto/blankfoto.jpg') ?>" id="gambar_load" class="img-fluid" width="200px">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>File Cover</label>
                            <input type="file" name="cover" class="form-control" id="preview_gambar" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Kode Buku</label>
                            <input class="form-control" name="kode_buku" value="<?= old('kode_buku') ?>" placeholder=" Nama User">
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ISBN</label>
                                <input class="form-control" name="isbn" value="<?= old('isbn') ?>" placeholder="Judul Buku">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Judul Buku</label>
                                <input class="form-control" name="judul_buku" value="<?= old('judul_buku') ?>" placeholder="Judul Buku">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="id_kategori" class="form-control">
                                    <option value="">--Pilih Kategori--</option>
                                    <?php foreach ($kategori as $key => $value) { ?>
                                        <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Penulis</label>
                                <select name="id_penulis" class="form-control">
                                    <option value="">--Pilih Penulis--</option>
                                    <?php foreach ($penulis as $key => $value) { ?>
                                        <option value="<?= $value['id_penulis'] ?>"><?= $value['nama_penulis'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Penerbit</label>
                                <select name="id_penerbit" class="form-control">
                                    <option value="">--Pilih Penerbit--</option>
                                    <?php foreach ($penerbit as $key => $value) { ?>
                                        <option value="<?= $value['id_penerbit'] ?>"><?= $value['nama_penerbit'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Lokasi</label>
                                <select name="id_rak_buku" class="form-control">
                                    <option value="">--Lokasi Buku--</option>
                                    <?php foreach ($rak as $key => $value) { ?>
                                        <option value="<?= $value['id_rak_buku'] ?>"><?= $value['rak_buku'] ?> No<?= $value['no_rak'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Tahun</label>
                                <select name="tahun" class="form-control">
                                    <option value="">--Pilih Tahun--</option>
                                    <?php for ($i = date('Y'); $i >= 1600; $i--) { ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Bahasa</label>
                                <input class="form-control" name="bahasa" value="<?= old('bahasa') ?>" placeholder="Bahasa">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Halaman</label>
                                <input type="number" class="form-control" name="halaman" value="<?= old('halaman') ?>" placeholder="Halaman">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" class="form-control" name="jumlah_buku" value="<?= old('jumlah_buku') ?>" placeholder="Jumlah">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->

<div class="card-footer">
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Simpan</button>
    <a href="<?= base_url('Buku') ?>" class="btn btn-warning"><i class="fas fa-share"></i>Kembali</a>
</div>
</form>
<?php echo form_close() ?>
</div>
</div>