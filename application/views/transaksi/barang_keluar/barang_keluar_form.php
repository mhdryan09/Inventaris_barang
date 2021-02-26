<section class="content-header">
    <h1>
        Pengeluaran Barang
        <small>Barang Keluar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Beranda</a></li>
        <li>Barang Keluar</li>
        <li class="active">Tambah</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box box-success">
        <div class="box-header">
            <div class="pull-right">
                <a href="<?= site_url('pengeluaran_barang/barang_keluar') ?>" class="btn btn-default">
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
                            <!-- arahkan isi form nya ke controller stock dan method process -->
                            <form action="<?= site_url('pengeluaran_barang/process'); ?>" method="post" name="formBarangKeluar">
                                <div class="form-group">
                                    <label for="">Tanggal Barang Keluar *</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fas fa-calendar-day"></i>
                                        </span>
                                        <input type="date" name="tanggal" value="<?= date('Y-m-d'); ?>" class="tanggal form-control" required>
                                    </div>
                                </div>
                                <div>
                                    <label for="kode_barang">Kode Barang *</label>
                                </div>
                                <div class="form-group input-group">
                                    <input type="hidden" name="id_barang" id="id_barang">
                                    <input type="text" name="kode_barang" id="kode_barang" class="form-control" required>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-item">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Barang *</label>
                                    <input type="text" name="nama_barang" id="nama_barang" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label for="nama_satuan_brg">Satuan Barang</label>
                                            <input type="text" name="nama_satuan_brg" id="nama_satuan_brg" value="-" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="stok">Stok Awal</label>
                                            <input type="text" name="stok" id="stok" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi *</label>
                                    <input type="text" name="deskripsi" class="form-control" placeholder="Digunakan untuk .. " required>
                                </div>
                                <div class="form-group">
                                    <label for="">Unit Kerja</label>
                                    <select name="unit_kerja" class="form-control">
                                        <option value="">- Pilih Unit Kerja -</option>\
                                        <?php foreach ($unit as $s => $data) : ?>
                                            <!-- data berdasarkan id supplier -->
                                            <option value="<?= $data->id_unit ?>">
                                                <!-- kolom yang akan tampil  -->
                                                <?= $data->nama_unit; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah *</label>
                                    <input type="number" name="jumlah" class="form-control" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="cek_jumlah_keluar(this)&cek_stok(this)" class="form-control" required>
                                </div>
                                <div class="form-group" style="float: right;">
                                    <button type="submit" name="barang_keluar" class="btn btn-primary">
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

<div class="modal fade" id="modal-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Data Barang Tersedia</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <!-- $item di dapat dari data yang kita kirimkan di controller baris 32, di dalam tanda '' -->
                        <?php foreach ($barang as $i => $data) : ?>
                            <tr>
                                <td><?= $data->kode_barang; ?></td>
                                <td><?= $data->nama_barang; ?></td>
                                <td><?= $data->satuan_barang_name; ?></td>
                                <td class="text-center"><?= $data->stok; ?></td>
                                <td class="text-center">
                                    <!-- data diambil berdasarkan kolom di database -->
                                    <button class="btn btn-xs btn-info" id="select" data-id="<?= $data->id_barang ?>" data-kode_barang="<?= $data->kode_barang ?>" data-nama="<?= $data->nama_barang ?>" data-satuan="<?= $data->satuan_barang_name ?>" data-stok="<?= $data->stok ?>">
                                        <i class="fa fa-check"></i> Pilih
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            // data('id'), id tersebut diambil dari penamaan data di button nya tadi (data-id=""), sesuaikan yang lain nya
            var id_barang = $(this).data('id');
            var kode_barang = $(this).data('kode_barang');
            var nama_barang = $(this).data('nama');
            var nama_satuan = $(this).data('satuan');
            var stok = $(this).data('stok');

            // tanda # ini samakan dengan isi id="" pada masing masing inputan, dan yang didalam val() adalah nama var nya
            // cth: item_name adalah isi id nya, dan name adalah var yang kita defenisikan diatas
            $('#id_barang').val(id_barang);
            $('#kode_barang').val(kode_barang);
            $('#nama_barang').val(nama_barang);
            $('#nama_satuan_brg').val(nama_satuan);
            $('#stok').val(stok);

            // hide modal setelah di klik select
            $('#modal-item').modal('hide');
        })
    })
</script>


<script>
    function cek_jumlah_keluar(input) {
        jml = document.formBarangKeluar.jumlah.value;
        var jumlah_stok = eval(jml);

        if (jumlah_stok < 1) {
            alert('Jumlah keluar tidak boleh lebih dari 0');
            input.value = input.value.substring(0, input.value.length - 1);
        }
    }

    function cek_stok(input) {
        st = document.formBarangKeluar.stok.value;
        jm = document.formBarangKeluar.jumlah.value;
        var num = input.value;
        var stk = eval(st);
        var jml = eval(jm);
        if (stk < jml) {
            alert('Stok Tidak Memenuhi, Kurangi Jumlah Barang Keluar');
            input.value = input.value.substring(0, input.value.length - 1);
        }
    }
</script>