<section class="content-header">
    <h1>
        Unit
        <small>Unit Kerja</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Unit</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- load halaman yang berisi flashdata messages -->
    <?php $this->view('messages'); ?>
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Data Unit Kerja</h3>
            <div class="pull-right">
                <a href="<?= site_url('Unit/add') ?>" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead style="background-color: #dff2e1;">
                    <tr>
                        <th>No</th>
                        <th>Nama Unit Kerja</th>
                        <th>Nama Penanggung Jawab</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    // $unit didapat dari ['unit'] yang ada di Unit.php
                    foreach ($unit->result() as $key => $data) :
                    ?>
                        <tr>
                            <td style=" width: 5%"><?= $no++; ?></td>
                            <td><?= $data->nama_unit; ?></td>
                            <td><?= $data->nama_penanggung_jawab;  ?></td>
                            <td class="text-center" width="160px">
                                <!-- sesuaikan id nya dengan kolom id (id_unit) yang ada di database -->
                                <a href="<?= site_url('Unit/edit/' . $data->id_unit) ?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i> Ubah
                                </a>
                                <!-- sesuaikan id nya dengan kolom id (id_unit) yang ada di database -->
                                <a href="<?= site_url('Unit/delete/' . $data->id_unit) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>