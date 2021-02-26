<section class="content-header">
    <h1>
        Barang
        <small>Data Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Barang</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- load halaman yang berisi flashdata messages -->
    <?php $this->view('messages'); ?>
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Data Barang</h3>
            <div class="pull-right">
                <a href="<?= site_url('barang/add') ?>" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead style="background-color: #dff2e1;">
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jenis Barang</th>
                        <th>Satuan Barang</th>
                        <th>Stok</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    // $barang didapat dari ['barang'] yang ada di barang.php
                    foreach ($barang->result() as $key => $data) :
                    ?>
                        <tr>
                            <td style="width: 5%"><?= $no++; ?></td>
                            <!-- kode_barang adalah kolom yang ada di tabel -->
                            <td><?= $data->kode_barang; ?> <br>
                                <!-- menampilkan generate qrcode -->
                                <!-- <a href="<?= site_url('barang/barcode_qrcode/' . $data->id_barang) ?>" class="btn btn-default btn-xs">
                                    <i class="fa fa-barcode"></i>
                                </a> -->
                            </td>
                            <td><?= $data->nama_barang; ?></td>
                            <td><?= $data->jenis_barang_name; ?></td>
                            <td><?= $data->satuan_barang_name; ?></td>
                            <td><?= $data->stok; ?></td>
                            <td class="text-center" width="160px">
                                <!-- sesuaikan id nya dengan kolom id (id_barang) yang ada di database -->
                                <a href="<?= site_url('barang/edit/' . $data->id_barang) ?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i> Ubah
                                </a>
                                <!-- sesuaikan id nya dengan kolom id (id_barang) yang ada di database -->
                                <a href="<?= site_url('barang/delete/' . $data->id_barang) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')" class="btn btn-danger btn-sm">
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

<script>
    $(document).ready(function() {
        $('#table1').DataTable()
    })
</script>