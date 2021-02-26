<section class="content-header">
  <h1>
    Dashboard
    <small>Control Panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-archive"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Barang</span>
          <span class="info-box-number"><?= $this->fungsi->count_barang(); ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-truck"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pemasok</span>
          <span class="info-box-number"><?= $this->fungsi->count_supplier(); ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Unit Kerja</span>
          <span class="info-box-number"><?= $this->fungsi->count_unit(); ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pengguna</span>
          <span class="info-box-number"><?= $this->fungsi->count_user(); ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->


  <div class="row">
    <div class="col-md-6">
      Grafik Penerimaan Barang
      <section class="content">
        <div id="data_barang"></div>

      </section>

      <!-- ambil data dari database -->
      <?php
      $data = $this->Penerimaan_Model->ambil_penerimaan_brg()->result();

      foreach ($data as $key => $data) {
        $nama_brg[] = $data->barang;
        $stok_brg[] = intval($data->jumlah);
      }
      ?>

      <script src="<?= site_url('plugin/chartjs/highcharts.js') ?>"></script>
      <script src="<?= site_url('plugin/chartjs/exporting.js') ?>"></script>

      <script>
        Highcharts.chart('data_barang', {
          chart: {
            type: 'area'
          },
          title: {
            text: 'Data Nama dan Jumlah Penerimaan Barang'
          },
          subtitle: {
            text: 'Sumber : Data Penerimaan Barang'
          },
          xAxis: {
            categories: <?= json_encode($nama_brg); ?>,
            tickmarkPlacement: 'on',
            title: {
              enabled: false
            }
          },
          yAxis: {
            title: {
              text: 'Jumlah Satuan'
            },
            labels: {
              formatter: function() {
                return this.value;
              }
            }
          },
          tooltip: {
            split: true,
            valueSuffix: ''
          },
          plotOptions: {
            area: {
              stacking: 'normal',
              lineColor: '#666666',
              lineWidth: 1,
              marker: {
                lineWidth: 1,
                lineColor: '#666666'
              }
            }
          },
          series: [{
            name: 'Jumlah Stok Barang',
            data: <?= json_encode($stok_brg); ?>
          }]
        });
      </script>
    </div>

    <div class="col-md-6">
      Grafik Pengeluaran Barang
      <section class="content">
        <div id="data_barang2"></div>

      </section>

      <!-- ambil data dari database -->
      <?php
      $data2 = $this->Pengeluaran_Model->ambil_pengeluaran_brg()->result();

      foreach ($data2 as $key => $data) {
        $nama_brg2[] = $data->barang;
        $stok_brg2[] = intval($data->jumlah);
      }
      ?>

      <script src="<?= site_url('plugin/chartjs/highcharts.js') ?>"></script>
      <script src="<?= site_url('plugin/chartjs/exporting.js') ?>"></script>

      <script>
        Highcharts.chart('data_barang2', {
          chart: {
            type: 'area'
          },
          title: {
            text: 'Data Nama dan Jumlah Pengeluaran Barang'
          },
          subtitle: {
            text: 'Sumber : Data Pengeluaran Barang'
          },
          xAxis: {
            categories: <?= json_encode($nama_brg2); ?>,
            tickmarkPlacement: 'on',
            title: {
              enabled: false
            }
          },
          yAxis: {
            title: {
              text: 'Jumlah Satuan'
            },
            labels: {
              formatter: function() {
                return this.value;
              }
            }
          },
          tooltip: {
            split: true,
            valueSuffix: ''
          },
          plotOptions: {
            area: {
              stacking: 'normal',
              lineColor: '#666666',
              lineWidth: 1,
              marker: {
                lineWidth: 1,
                lineColor: '#666666'
              }
            }
          },
          series: [{
            name: 'Jumlah Stok Barang',
            data: <?= json_encode($stok_brg2); ?>
          }]
        });
      </script>

    </div>

</section>
<!-- /.content -->