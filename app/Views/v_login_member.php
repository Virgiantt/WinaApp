<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= base_url('Auth') ?>" class="h1"><b>Login</b>Member</a>
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
                echo '<div class="alert alert-danger" role="alert">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>
            <?php echo form_open('Auth/CekLoginMember') ?>
            <div class="input-group mb-3">
                <input class="form-control" name="nis" placeholder="NIS">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <a class="btn btn-warning btn-block" href="<?= base_url('Auth') ?>">Kembali</a>
                </div>
                <!-- /.col -->
                <div class="col-sm-6    ">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
                <!-- /.col -->
            </div>
            <?php echo form_close() ?>

            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="<?= base_url('Auth/Register') ?>" class="btn btn-block btn-warning">
                    <i class="fa fa-user-plus"></i> Daftar Member
                </a>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>