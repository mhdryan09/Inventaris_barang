<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Inventarisasi Barang SMK Muhammadiyah 3 Yogyakarta</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>plugin/fontawesome/css/all.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.css">

  <!--datatables  -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- datepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>plugin/datepicker/css/bootstrap-datepicker3.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>

<body class="hold-transition skin-green sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?= base_url('dashboard') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>SI</b>I</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SI</b> Inventaris</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url() ?>assets/img/2.png" class="user-image" alt="User Image">
                <span class="hidden-xs">
                  <?= $this->fungsi->user_login()->username; ?>
                </span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?= base_url() ?>assets/img/2.png" class="img-circle" alt="User Image">

                  <p>
                    <?= $this->fungsi->user_login()->name; ?>

                    <small><?= $this->fungsi->user_login()->address; ?> </small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="<?= site_url(); ?>Auth/logout" class="btn btn-default btn-flat">Keluar</a>
                  </div>
                </li>
              </ul>
            </li>

          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?= base_url() ?>assets/img/2.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?= $this->fungsi->user_login()->username; ?> </p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MENU UTAMA</li>
          <!-- segment(1) artinya controller nya, setelah nama project kita
              jika dia ada segment dashboard atau kosong, maka tampilkan class active
           -->
          <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : ''  ?>>
            <a href="<?= site_url('dashboard') ?>"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>
          </li>
          <?php if ($this->session->userdata('level') == 2) { ?>
            <li class="header">DATA MASTER</li>
            <li <?= $this->uri->segment(1) == 'supplier' ? 'class="active"' : ''  ?>>
              <a href="<?= site_url('supplier') ?>"> <i class="fa fa-truck"></i> <span>Data Supplier</span> </a>
            </li>
            <li <?= $this->uri->segment(1) == 'unit' ? 'class="active"' : ''  ?>>
              <a href="<?= site_url('unit') ?>"> <i class="fa fa-users"></i> <span>Data Unit Kerja</span> </a>
            </li>
            <!-- untuk menu dropdown hanya kita gunakan active saja, karena di submenu nya sudah ada class active -->
            <li class="treeview <?= $this->uri->segment(1) == 'jenis_barang' || $this->uri->segment(1) == 'satuan_barang' || $this->uri->segment(1) == 'barang' ? 'active' : '' ?>">
              <a href="#">
                <i class="fa fa-archive"></i> <span> Data barang </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li <?= $this->uri->segment(1) == 'jenis_barang' ? 'class="active"' : ''  ?>><a href="<?= site_url('jenis_barang') ?>"><i class="fa fa-circle-o"></i> Data Jenis Barang</a></li>
                <li <?= $this->uri->segment(1) == 'satuan_barang' ? 'class="active"' : ''  ?>><a href="<?= site_url('satuan_barang') ?>"><i class="fa fa-circle-o"></i> Data Satuan Barang</a></li>
                <li <?= $this->uri->segment(1) == 'barang' ? 'class="active"' : ''  ?>><a href="<?= site_url('barang') ?>"><i class="fa fa-circle-o"></i> Data Barang</a></li>
              </ul>
            </li>
            <li class="header">TRANSAKSI </li>
            <li class="treeview <?= $this->uri->segment(1) == 'penerimaan_barang' || $this->uri->segment(1) == 'pengeluaran_barang' || $this->uri->segment(1) == 'pengadaan_barang' ? 'active' : '' ?>">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Transaksi</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li <?= $this->uri->segment(1) == 'penerimaan_barang' && $this->uri->segment(2) == 'barang_masuk' ? 'class="active"' : '' ?>>
                  <a href="<?= site_url('penerimaan_barang/barang_masuk') ?>"><i class="fa fa-circle-o"></i>Penerimaan Barang
                  </a>
                </li>
                <li <?= $this->uri->segment(1) == 'pengeluaran_barang' && $this->uri->segment(2) == 'barang_keluar' ? 'class="active"' : '' ?>>
                  <a href="<?= site_url('pengeluaran_barang/barang_keluar') ?>"><i class="fa fa-circle-o"></i>Pengeluaran Barang</a>
                </li>
                <li><a href="<?= site_url('pengadaan_barang/barang_pengadaan') ?>"><i class="fa fa-circle-o"></i>Pengadaan Barang</a></li>
              </ul>
            </li>
          <?php } ?>

          <?php if ($this->session->userdata('level') == 2 || $this->session->userdata('level') == 3) { ?>
            <li class="header">LAPORAN </li>
            <li class="treeview <?= $this->uri->segment(1) == 'laporan_penerimaan' || $this->uri->segment(1) == 'laporan_pengeluaran' || $this->uri->segment(1) == 'laporan_pengadaan' ? 'active' : '' ?>">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Laporan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li <?= $this->uri->segment(1) == 'laporan_penerimaan' && $this->uri->segment(2) == 'barang_masuk' ? 'class="active"' : '' ?>><a href="<?= site_url('laporan_penerimaan/cetak_penerimaan') ?>"><i class="fa fa-circle-o"></i> Penerimaan Barang</a></li>
                <li <?= $this->uri->segment(1) == 'laporan_pengeluaran' && $this->uri->segment(2) == 'barang_keluar' ? 'class="active"' : '' ?>>
                  <a href="<?= site_url('laporan_pengeluaran/cetak_pengeluaran'); ?>"><i class="fa fa-circle-o"></i> Pengeluaran Barang
                  </a>
                </li>
                <li <?= $this->uri->segment(1) == 'laporan_pengadaan' && $this->uri->segment(2) == 'barang_pengadaan' ? 'class="active"' : '' ?>>
                  <a href="<?= site_url('laporan_pengadaan/cetak_pengadaan'); ?>"><i class="fa fa-circle-o"></i> Pengadaan Barang
                  </a>
                </li>
              </ul>
            </li>
          <?php } ?>

          <!-- <?php if ($this->session->userdata('level') == 3) { ?>
            <li class="header">Grafik </li>
            <li class="treeview <?= $this->uri->segment(1) == 'grafik' ? 'active' : '' ?>">
              <a href="#">
                <i class="fa fa-bar-chart"></i>
                <span>Grafik</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li <?= $this->uri->segment(1) == 'grafik' && $this->uri->segment(2) == 'barang_masuk' ? 'class="active"' : '' ?>><a href="<?= site_url('grafik/grafik_barang_masuk_data') ?>"><i class="fa fa-circle-o"></i> Penerimaan Barang</a></li>
                <li <?= $this->uri->segment(1) == 'grafik' && $this->uri->segment(2) == 'barang_keluar' ? 'class="active"' : '' ?>>
                  <a href="<?= site_url('grafik/grafik_barang_keluar_data') ?>"><i class="fa fa-circle-o"></i> Pengeluaran Barang
                  </a>
                </li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Pengadaan Barang</a></li>
              </ul>
            </li>
          <?php } ?> -->

          <?php if ($this->fungsi->user_login()->level == 1) { ?>
            <li class="header">USERS</li>
            <li>
              <a href="<?= site_url('user') ?>"><i class="fa fa-users"></i>
                <span> Users </span>
              </a>
            </li>
          <?php } ?>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->
    <!-- jQuery 3 -->
    <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?php echo $contents ?>

    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer text-center">
      <strong>Copyright &copy; 2020 <a href="https://instagram/mhdryan09">Mhd Ryan Pranata</a>.</strong> Forza Milan
    </footer>

  </div>
  <!-- ./wrapper -->


  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!--datatables  -->
  <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- datepicker -->
  <script src="<?= base_url() ?>plugin/datepicker/js/bootstrap-datepicker.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>


  <script type="text/javascript">
    $(document).ready(function() {
      $('#table1').DataTable();
    });
    $(document).ready(function() {
      $('.tanggal').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
      });
    })
  </script>
</body>

</html>