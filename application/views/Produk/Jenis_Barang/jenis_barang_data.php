<section class="content-header">
    <h1>
        Jenis Barang
        <small>Kategori Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jenis Barang</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- load halaman yang berisi flashdata messages -->
    <?php $this->view('messages'); ?>
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Data Jenis Barang</h3>
            <div class="pull-right">
                <a href="<?= site_url('Jenis_barang/add') ?>" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead style="background-color: #dff2e1;">
                    <tr>
                        <th>No</th>
                        <th>Nama Jenis Barang</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    // $jenis_barang didapat dari ['jenis_barang'] yang ada di Jenis_barang.php
                    foreach ($jenis_barang->result() as $key => $data) :
                    ?>
                        <tr>
                            <td style="width: 5%"><?= $no++; ?></td>
                            <!-- nama_jenis_barang adalah kolom yang ada di tabel -->
                            <td><?= $data->nama_jenis_brg; ?></td>
                            <td class="text-center" width="160px">
                                <!-- sesuaikan id nya dengan kolom id (id_jenis_brg) yang ada di database -->
                                <a href="<?= site_url('jenis_barang/edit/' . $data->id_jenis_brg) ?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i> Ubah
                                </a>
                                <!-- sesuaikan id nya dengan kolom id (id_jenis_brg) yang ada di database -->
                                <a href="<?= site_url('jenis_barang/delete/' . $data->id_jenis_brg) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')" class="btn btn-danger btn-sm">
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