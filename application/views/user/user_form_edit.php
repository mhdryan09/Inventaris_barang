<section class="content-header">
    <h1>
        Users
        <small>Pengguna</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
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
                    <div class="panel panel-default">
                        <div class="panel-heading">Form Ubah</div>
                        <div class="panel-body">
                            <!-- form action sengaja kosong, agar di proses di halaman ini saja -->
                            <form action="" method="post">
                                <!-- copy bagian form_error ke dalam bagian form_group untuk menampilkan pesan error jika tidak diisi -->
                                <div class="form-group  <?= form_error('fullname') ? 'has-error' : null ?>">
                                    <label for="">Nama Lengkap *</label>
                                    <!--inputan ini digunakan untuk mengambil data berdasarkan id nya. id_user adalah nama kolom di tabel -->
                                    <input type="hidden" name="user_id" value="<?= $row->id_user; ?>">
                                    <!-- value berisi inputan dari post dengan name sesuai di inputan dan
                                $row->name. name adalah nama kolom yang ada di tabel dlm database
                            -->
                                    <input type="text" name="fullname" value="<?= $this->input->post('fullname') ?? $row->name; ?>" class="form-control">
                                    <?= form_error('fullname') ?>
                                </div>

                                <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                                    <label for="">Username *</label>
                                    <input type="text" name="username" value="<?= $this->input->post('username') ?? $row->username; ?>" class="form-control">
                                    <?= form_error('username') ?>
                                </div>

                                <div class="form-group <?= form_error('pass') ? 'has-error' : null ?>">
                                    <label for="">Password</label>
                                    <small>(Biarkan kosong, jika tidak ingin diganti)</small>
                                    <!-- khusus untuk password, tidak perlu cetakan dari $row -->
                                    <input type="password" name="pass" value="<?= $this->input->post('pass'); ?>" class="form-control">
                                    <?= form_error('pass') ?>
                                </div>

                                <div class="form-grou <?= form_error('passconf') ? 'has-error' : null ?>">
                                    <label for="">Konfirmasi Password</label>
                                    <!-- khusus untuk konfirmasi password, tidak perlu cetakan dari $row -->
                                    <input type="password" name="passconf" value="<?= $this->input->post('passconf'); ?>" class="form-control">
                                    <?= form_error('passconf') ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <!-- khusus untuk textarea, kita masukan value nya di dalam text area -->
                                    <textarea name="address" class="form-control">
                                <?= $this->input->post('address') ?? $row->address; ?>
                            </textarea>
                                    <?= form_error('address') ?>
                                </div>

                                <div class=" form-group <?= form_error('level') ? 'has-error' : null ?>">
                                    <label for="">Level</label>
                                    <select name="level" class="form-control">
                                        <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level;  ?>
                                        <!-- if satu baris, artinya jika dia level bernilai 1 alias admin, maka dia terpilih (selected) -->
                                        <option value="1"> Admin</option>
                                        <option value="2" <?php $level == 2 ? "selected" : null ?>>Pegawai</option>
                                        <option value="3" <?php $level == 3 ? "selected" : null ?>>Kepala Sapras</option>
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

<!-- 
    value="<?php //echo $this->input->post('fullname') ? $this->input->post('fullname') : $row->name; 
            ?>"

    sama saja seperti ini :

    value="<?php //echo $this->input->post('fullname') ?? $row->name;
            ?>"
 -->