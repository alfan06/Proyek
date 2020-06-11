<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="">welcome, <?= $this->session->userdata('user') ?></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="<?= base_url(); ?>auth/logout" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Logout
          </a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="<?= base_url(); ?>transaksi/tambah"><button class="btn btn-sm btn-primary mb-3" ><i class="fas fa-sm fa-plus"></i> Tambah</button>
              <a href="<?= base_url(); ?>transaksi/laporan_pdf"><button class="btn btn-sm btn-danger mb-3"><i class="fas fa-file-pdf"></i> Export PDF</button></a>
                <table id="listUser" class="table table-bordered table-hover">
                  <thead>
                    <tr style="background-color: lightblue;color:black">
                        <th>Kode Transaksi</th>
                        <th>ID_USER</th>
                        <th>Nama Fotografi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Harga</th>
                        <th>Alamat Fotografi</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($transaksi as $t) : ?>
                        <tr align="center" style="background-color: white;color:black">
                            <td><?php echo 'KD_T 00' . $t['id_transaksi']; ?></td>
                            <td><?php echo $t['id_user']; ?></td>
                            <td><?php echo $t['nama']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($t['tgl_transaksi'])) ?></td>
                            <td><?php echo $t['harga']; ?></td>
                            <td><?php echo $t['alamatfotografi']; ?></td>
                            <td><a href="<?= base_url(); ?>transaksi/edit/<?= $t['id_transaksi']; ?>" class="badge badge-success float-center">Edit</a></td>
                            <td><a href="<?= base_url(); ?>transaksi/hapus/<?= $t['id_transaksi']; ?>" class="badge badge-danger float-center" onclick="return confirm('Yakin Data ini akan dihapus');">Hapus</a></td>
                         </tr>
                    <?php endforeach; ?>
                  </tfoot>
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</body>
</html>




<!-- ----- -->
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/cstyle.css">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>Data Rumah Sakit</title>

    <style>
        body {
            background-image: url('images/3.jpg');
            background-repeat: repeat;
            background-size: cover;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="row mt-4">
            <div class="col-md-6">
                <a href="<?= base_url(); ?>transaksi/tambah" class="btn btn-info"> Tambah Data </a>
                <a href="<?= base_url(); ?>transaksi/laporan_pdfTransaksi" class="btn btn-info">Cetak Data Transaksi</a>
            </div>
        </div>

        <div class="container" style="margin-top:20px">
            <div class="col-lg-12">
                <h2>Daftar Transaksi</h2>

                <table class="table table-striped table-bordered" id="listTransaksi">
                    <thead>
                        <tr align="center" style="background-color: lightblue;color:black">
                            <th>Kode Transaksi</th>
                            <th>Nama Fotografi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Harga</th>
                            <th>Alamat Fotografi</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transaksi as $t) : ?>
                            <tr align="center" style="background-color: white;color:black">
                                <td><?php echo 'KD_T 00' . $t['id_transaksi']; ?></td>
                                <td><?php echo $t['nama']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($t['tgl_transaksi'])) ?></td>
                                <td><?php echo $t['harga']; ?></td>
                                <td><?php echo $t['alamatfotografi']; ?></td>
                                <td><a href="<?= base_url(); ?>transaksi/edit/<?= $t['id_transaksi']; ?>" class="badge badge-success float-center">Edit</a></td>
                                <td><a href="<?= base_url(); ?>transaksi/hapus/<?= $t['id_transaksi']; ?>" class="badge badge-danger float-center" onclick="return confirm('Yakin Data ini akan dihapus');">Hapus</a></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
</body> -->