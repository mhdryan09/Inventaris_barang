<section class="content-header">
    <h1>
        Suppliers
        <small>Pemasok Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Suppliers</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box box-success">
        <div class="box-header">
            <!-- <h3 class="box-title"><?= ucfirst($page); ?> Suppliers</h3> -->
            <div class="pull-right">
                <a href="<?= site_url('Supplier') ?>" class="btn btn-default">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!-- arahkan isi form nya ke method process -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Form Tambah</div>
                        <div class="panel-body">
                            <form action="<?= site_url('Supplier/process'); ?>" method="post">
                                <div class="form-group">
                                    <label for="">Nama Supplier *</label>
                                    <!--inputan ini digunakan untuk mengambil data berdasarkan id nya. id_supplier adalah nama kolom di tabel -->
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-group"></i>
                                        </span>
                                        <input type="hidden" name="id_supplier" value="<?= $row->id_supplier; ?>">
                                        <input type="text" name="supplier_name" value="<?= $row->name; ?>" class="form-control" placeholder="Masukkan nama supplier ..." required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Nomor Telepon *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                        <input type="number" name="phone" value="<?= $row->phone; ?>" class="form-control" placeholder="Masukkan Nomor Telepon ..." required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-home"></i>
                                        </span>
                                        <input type="text" name="addr" value="<?= $row->address; ?>" class="form-control" placeholder="Masukkan Alamat ...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-info-circle"></i>
                                        </span>
                                        <textarea name="desc" class="form-control"><?= $row->description; ?> </textarea>
                                    </div>
                                </div>
                                <div class="form-group" style="float: right;">
                                    <button type="submit" name="<?= $page; ?>" class="btn btn-primary">
                                        <i class="fa fa-paper-plane"></i> Simpan
                                    </button>
                                    <button type="reset" class="btn btn-danger">
                                        <i class="fa fa-undo"></i> Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>