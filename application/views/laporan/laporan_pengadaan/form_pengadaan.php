<section class="content-header">
    <h1>
        Laporan Pengadaan Barang
        <small>Barang Pengadaan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
        <li>Laporan</li>
        <li class="active">Pengadaan Barang</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- halaman cetak per tanggal -->
            <div class="box box-success"> <br>
                <form method="post" action="<?= site_url('Laporan_pengadaan/cetak_periode'); ?>" class="form-horizontal">
                    <div class="box-body bg-lightskyblue">
                        <div class="form-group">
                            <label class="col-sm-1">Tanggal</label>
                            <div class="col-sm-2">
                                <input type="text" class="tanggal form-control" name="tgl_awal" id="" autocomplete="off">
                            </div>
                            <label class="col-sm-1">s.d</label>
                            <div class="col-sm-2">
                                <input style="margin-left:-35px" type="text" class="tanggal form-control" name="tgl_akhir" autocomplete="off">
                            </div>
                            <div class="col-sm-2">
                                <button href="" class="btn btn-danger" name="cetak_barang">
                                    <i class="fa fa-print"></i> Cetak
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>

                <!-- data penerimaan -->
                <div class="box-body table-responsive">
                    <h4><i class="fa fa-file-text-o icon-title"></i>
                        Data Transaksi pengadaan</h4> <br>
                    <table class="table table-bordered table-striped table-hover" id="table1">
                        <thead style="background-color: #dff2e1;">
                            <tr>
                                <th>No</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Kode Barang</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Unit Kerja</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($row as $key => $data) :
                            ?>
                                <tr>
                                    <td style="width: 5%"> <?= $no++;  ?>.</td>
                                    <td class="text-center"> <?= date('d F Y', strtotime($data->tanggal)); ?> </td>
                                    <td class="text-center"> <?= $data->kode_barang; ?> </td>
                                    <td class="text-center"> <?= $data->barang; ?> </td>
                                    <td class="text-center"> <?= $data->jumlah; ?></td>
                                    <td class="text-center"> <?= $data->unit; ?> </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table><br>
                    <!-- <a href="<?= site_url('report/cetak_barang_keluar'); ?>" style="float: right" class="btn btn-danger">
                        <i class="fa fa-print"></i> Cetak Semua Data
                    </a> -->
                </div>
            </div>
        </div>
    </div>
</section>