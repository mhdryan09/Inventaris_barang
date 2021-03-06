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

    <div class="box">
        <div class="box-header">
            <div class="pull-right">
                <a href="<?= site_url('unit') ?>" class="btn btn-default">
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
                            <form action="<?= site_url('unit/process'); ?>" method="post">
                                <div class="form-group">
                                    <label for="">Nama Unit *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-group"></i>
                                        </span>

                                        <!--inputan ini digunakan untuk mengambil data berdasarkan id nya. id_unit adalah nama kolom di tabel -->
                                        <input type="hidden" name="id_unit" value="<?= $row->id_unit; ?>">
                                        <input type="text" name="unit_name" value="<?= $row->nama_unit; ?>" class="form-control" required placeholder="Masukan Nama Unit">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Penanggung Jawab *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input type="text" name="nama_penanggung_jawab" value="<?= $row->nama_penanggung_jawab; ?>" class="form-control" placeholder="Masukan Nama Penanggung Jawab">
                                    </div>
                                </div>
                                <div class="form-group" style="float: right;">
                                    <button type="submit" name="<?= $page; ?>" class="btn btn-primary">
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