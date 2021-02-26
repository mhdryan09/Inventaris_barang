<section class="content-header">
    <h1>
        Penerimaan Barang
        <small>Barang Masuk</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Transaksi</li>
        <li class="active">Penerimaan Barang</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- load halaman yang berisi flashdata messages -->
    <?php $this->view('messages'); ?>
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Data Penerimaan Barang</h3>
            <div class="pull-right">
                <a href="<?= site_url('penerimaan_barang/barang_masuk/tambah') ?>" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead style="background-color: #dff2e1;">
                    <tr>
                        <th>No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Nama barang</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Supplier</th>
                        <!-- <th class="text-center">Stok</th> -->
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;

                    foreach ($row as $key => $data) :
                    ?>
                        <tr>
                            <td style="width: 5%"> <?= $no++;  ?>. </td>
                            <td class="text-center"> <?= date('d F Y', strtotime($data->tanggal)); ?> </td>
                            <td class="text-center"><?= $data->barang; ?></td>
                            <td class="text-center"><?= $data->jumlah; ?></td>
                            <td class="text-center"><?= $data->supplier; ?></td>
                            <!-- <td class="text-center"><?= $data->stok; ?></td> -->

                            <td class="text-center" width="160px">
                                <a href="#" class="btn btn-default btn-sm" id="set_detail" data-toggle="modal" data-target="#modal-detail" data-kode_barang="<?= $data->kode_barang; ?>" data-nama_barang="<?= $data->barang; ?>" data-jumlah="<?= $data->jumlah; ?>" data-supplier="<?= $data->supplier; ?>" data-tanggal="<?= date('d F Y', strtotime($data->tanggal)); ?>" data-deskripsi="<?= $data->deskripsi; ?>">
                                    <i class="fa fa-info-circle"></i> Detail
                                </a>
                                <!-- <a href="<?= site_url('penerimaan_barang/barang_masuk/delete/' . $data->id_penerimaan_brg . '/' . $data->id_barang) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Hapus
                                </a> -->

                                <?php

                                if ($data->stok < $data->jumlah) {
                                    $aksi = '#modalCoba';
                                } else {
                                    $aksi = '#modalDelete';
                                }

                                ?>
                                <!-- didalam attr (berikan aksi, dan value nya apa) -->
                                <a href="<?php echo $aksi; ?>" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action','<?= site_url('penerimaan_barang/barang_masuk/delete/' . $data->id_penerimaan_brg . '/' . $data->id_barang) ?>')" class="btn btn-danger btn-sm">
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

<!-- modal detail -->
<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center"> Detail Penerimaan Barang</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped no-margin">
                    <tr>
                        <th>Tanggal</th>
                        <td><span id="tanggal_masuk"></span></td>
                    </tr>
                    <tr>
                        <th>Kode Barang</th>
                        <td><span id="kode_barang"></span></td>
                    </tr>
                    <tr>
                        <th>Nama Barang</th>
                        <td><span id="nama_barang"></span></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td><span id="jumlah"></span></td>
                    </tr>
                    <tr>
                        <th>Supplier</th>
                        <td><span id="supplier_name"></span></td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td><span id="deskripsi"></span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- modal untuk hapus -->
<div class="modal fade" id="modalDelete">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Yakin akan menghapus data ini?</h4>
            </div>
            <div class="modal-footer">
                <form action="" method="post" id="formDelete" align="center">
                    <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- modal untuk TIDAK BISA hapus -->
<div class="modal fade" id="modalCoba">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Barang Tidak Bisa Dihapus</h4>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- script untuk modal detail -->
<script>
    $(document).ready(function() {
        $(document).on('click', '#set_detail', function() {
            // data('kode_barang'), nama tersebut diambil dari penamaan data di button nya tadi (data-kode_barang=""), sesuaikan yang lain nya
            var kodebarang = $(this).data('kode_barang');
            var namabarang = $(this).data('nama_barang');
            var jumlah = $(this).data('jumlah');
            var supplier = $(this).data('supplier');
            var tanggal = $(this).data('tanggal');
            var deskripsi = $(this).data('deskripsi');

            // tanda # ini samakan dengan isi id="" pada masing masing inputan
            // cth: kode_barang adalah isi id nya yang di inputan, dan kodebarang adalah var yang kita defenisikan diatas
            $('#kode_barang').text(kodebarang);
            $('#nama_barang').text(namabarang);
            $('#jumlah').text(jumlah);
            $('#supplier_name').text(supplier);
            $('#tanggal_masuk').text(tanggal);
            $('#deskripsi').text(deskripsi);
        })
    })
</script>