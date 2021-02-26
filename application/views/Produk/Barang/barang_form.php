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
            <div class="pull-right">
                <a href="<?= site_url('barang') ?>" class="btn btn-default">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Form Tambah</div>
                        <div class="panel-body">
                            <!-- arahkan isi form nya ke method process -->
                            <form action="<?= site_url('barang/process'); ?>" method="post">
                                <div class="form-group">
                                    <label for="">Kode Barang *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fas fa-box"></i>
                                        </span>
                                        <!--inputan ini digunakan untuk mengambil data berdasarkan id nya. id_barang adalah nama kolom di tabel -->
                                        <input type="hidden" name="id_barang" value="<?= $row->id_barang; ?>">
                                        <input type="text" name="kode_barang" value="<?= $row->kode_barang; ?>" class="form-control" required placeholder="Masukan Kode Barang" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama barang *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-archive"></i>
                                        </span>
                                        <input type="text" name="nama_barang" value="<?= $row->nama_barang; ?>" class="form-control" required placeholder="Masukan Nama Barang">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Barang</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-folder"></i>
                                        </span>
                                        <select name="jenis_barang" class="form-control">
                                            <option value="">Pilih Jenis Barang</option>
                                            <?php foreach ($jenis_barang->result() as $key => $data) : ?>
                                                <option value="<?= $data->id_jenis_brg ?>" <?= $data->id_jenis_brg == $row->id_jenis_brg ? "selected" : null ?>><?= $data->nama_jenis_brg ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Satuan barang</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-inbox"></i>
                                        </span>
                                        <select name="satuan_barang" class="form-control">
                                            <option value="">Pilih Satuan Barang</option>
                                            <?php foreach ($satuan_barang->result() as $key => $data) : ?>
                                                <option value="<?= $data->id_satuan_brg ?>" <?= $data->id_satuan_brg == $row->id_satuan_brg ? "selected" : null ?>><?= $data->nama_satuan_brg; ?></option>
                                            <?php endforeach; ?>
                                        </select>
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
    </div>

</section>