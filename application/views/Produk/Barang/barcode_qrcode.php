<section class="content-header">
    <h1>
        QR Code Barang
        <small>Scan Kode Barang disini</small>
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
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">QR-Code Generator <i class="fa fa-qrcode"></i> </h3>
            <div class="pull-right">
                <a href="<?= site_url('barang') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>
        <div class="box-body">
            <?php
            $qrCode = new Endroid\QrCode\QrCode('123456');

            // menulis nama file qrcode nya
            $qrCode->writeFile('upload/qr-code/kode-barang-' . $row->kode_barang . '.png');
            ?>

            <img src="<?= base_url('upload/qr-code/kode-barang-' . $row->kode_barang . '.png') ?>" style="width: 200px">
            <br>
            QR-CODE: <?= $row->kode_barang; ?>
        </div>
    </div>

</section>