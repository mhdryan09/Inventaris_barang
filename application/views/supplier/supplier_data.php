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
    <!-- load halaman yang berisi flashdata messages -->
    <?php $this->view('messages'); ?>
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Data Suppliers</h3>
            <div class="pull-right">
                <a href="<?= site_url('Supplier/add') ?>" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead style="background-color: #dff2e1;">
                    <tr>
                        <th>No</th>
                        <th>Nama Supplier</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    // $supplier didapat dari ['supplier'] yang ada di Supplier.php
                    foreach ($supplier->result() as $key => $data) :
                    ?>
                        <tr>
                            <td style="width: 5%"><?= $no++; ?></td>
                            <!-- username, name, alamat, level adalah kolom yang ada di tabel -->
                            <td><?= $data->name; ?></td>
                            <td><?= $data->phone; ?></td>
                            <td><?= $data->address; ?></td>
                            <td><?= $data->description; ?></td>
                            <td class="text-center" width="160px">
                                <!-- sesuaikan id nya dengan kolom id (id_supplier) yang ada di database -->
                                <a href="<?= site_url('Supplier/edit/' . $data->id_supplier) ?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i> Ubah
                                </a>
                                <!-- sesuaikan id nya dengan kolom id (id_supplier) yang ada di database -->
                                <!-- <a href="<?= site_url('Supplier/delete/' . $data->id_supplier) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Hapus
                                </a> -->

                                <!-- didalam attr (berikan aksi, dan value nya apa) -->
                                <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action','<?= site_url('Supplier/delete/' . $data->id_supplier) ?>')" class="btn btn-danger btn-sm">
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