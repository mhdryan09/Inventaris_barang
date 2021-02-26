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

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page); ?> Jenis Barang</h3>
            <div class="pull-right">
                <a href="<?= site_url('jenis_barang') ?>" class="btn btn-default">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Form Tambah</div>
                        <div class="panel-body">
                            <!-- arahkan isi form nya ke method process -->
                            <form action="<?= site_url('jenis_barang/process'); ?>" method="post">
                                <div class="form-group">
                                    <label for="">Nama Jenis Barang *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-folder"></i>
                                        </span>
                                        <!--inputan ini digunakan untuk mengambil data berdasarkan id nya. id_jenis_barang adalah nama kolom di tabel -->
                                        <input type="hidden" name="id_jenis_barang" value="<?= $row->id_jenis_brg; ?>">
                                        <input type="text" name="nama_jenis_barang" value="<?= $row->nama_jenis_brg; ?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group" style="float: right;">
                                    <button type="submit" name="<?= $page; ?>" class="btn btn-primary">
                                        <i class="fa fa-paper-plane"></i> Simpan
                                    </button>
                                    <button type="reset" class="btn btn-danger">
                                        <i class="fa fa-undo"></i> Reset </button>
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