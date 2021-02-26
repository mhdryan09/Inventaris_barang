<section class="content-header">
    <h1>
        Users
        <small>Pengguna</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <div class="pull-right">
                <a href="<?= site_url('User') ?>" class="btn btn-default">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <?php //echo validation_errors(); 
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">Form Tambah</div>
                        <div class="panel-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group <?= form_error('fullname') ? 'has-error' : null ?>">
                                    <label for="">Nama Lengkap *</label>
                                    <input type="text" name="fullname" value="<?= set_value('fullname'); ?>" class="form-control">
                                    <?= form_error('fullname') ?>
                                </div>

                                <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                                    <label for="">Username *</label>
                                    <input type="text" name="username" value="<?= set_value('username'); ?>" class="form-control">
                                    <?= form_error('username') ?>
                                </div>

                                <div class="form-group <?= form_error('pass') ? 'has-error' : null ?>">
                                    <label for="">Password *</label>
                                    <input type="password" name="pass" value="<?= set_value('pass'); ?>" class="form-control">
                                    <?= form_error('pass') ?>
                                </div>

                                <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
                                    <label for="">Konfirmasi Password *</label>
                                    <input type="password" name="passconf" value="<?= set_value('passconf'); ?>" class="form-control">
                                    <?= form_error('passconf') ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="address" class="form-control">
                                <?= set_value('address'); ?>
                            </textarea>
                                    <?= form_error('address') ?>
                                </div>
                                <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
                                    <label for="">Level</label>
                                    <select name="level" class="form-control">
                                        <option value="">- Pilih -</option>
                                        <option value="1" <?php set_value('level') == 1 ? "selected" : null ?>>Admin</option>
                                        <option value="2" <?php set_value('level') == 2 ? "selected" : null ?>>Pegawai</option>
                                        <option value="3" <?php set_value('level') == 3 ? "selected" : null ?>>Kepala Sapras</option>
                                    </select>
                                    <?= form_error('level') ?>
                                </div>
                                <div class="form-group" style="float: right;">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-paper-plane"></i> Simpan
                                    </button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>