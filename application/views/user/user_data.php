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
    <!-- load halaman yang berisi flashdata messages -->
    <?php $this->view('messages'); ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Users</h3>
            <div class="pull-right">
                <a href="<?= site_url('User/add') ?>" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead style="background-color: #dff2e1;">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Level</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    // $row didapat dari ['row'] yang ada di User.php
                    foreach ($row->result() as $key => $data) :
                    ?>
                        <tr>
                            <td style="width: 5%"><?= $no++; ?></td>
                            <!-- username, name, alamat, level adalah kolom yang ada di tabel -->
                            <td><?= $data->username; ?></td>
                            <td><?= $data->name; ?></td>
                            <td><?= $data->address; ?></td>
                            <td>
                                <?php if ($data->level == 1) {
                                    echo 'Admin';
                                } else if ($data->level == 2) {
                                    echo 'Pegawai';
                                } else {
                                    echo 'Kepala Sapras';
                                }
                                ?>
                            </td>
                            <td class="text-center" width="220px">
                                <form action=" <?= site_url('user/delete') ?>" method="POST">
                                    <!-- sesuaikan id nya dengan kolom id yang ada di database -->
                                    <a href="<?= site_url('User/edit/' . $data->id_user) ?>" class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil"></i> Ubah
                                    </a>
                                    <!-- berikan id user -->
                                    <input type="hidden" name="user_id" value="<?= $data->id_user; ?>">
                                    <button onclick="return confirm('Apakah anda yakin ingin menghapus?')" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</section>