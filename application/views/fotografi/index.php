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
              <a href="<?= base_url(); ?>fotografi/tambah"><button class="btn btn-sm btn-primary mb-3" ></i> Tambah</button>
              <a href="<?= base_url(); ?>fotografi/laporan_pdf"><button class="btn btn-sm btn-danger mb-3"></i> Export PDF</button></a>
                <table id="listUser" class="table table-bordered table-hover">
                  <thead>
                  <tr align="center" style="background-color: lightblue;color:black">
                            <th>Kode fotografi</th>
                            <th>Nama fotografi</th>
                            <th>Harga</th>
                            <th>Foto</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                            <th>Detail</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($fotografi as $d) : ?>
                        <tr align="center" style="background-color: white;color:black">
                            <td><?php echo 'KD_D 00' .  $d['id_fotografi']; ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['harga']; ?></td>
                            <td> <img src="<?= base_url() ?>/uploads/foto/<?= $d['foto'] ?>" alt="" width="100px"></td>
                            <td><a href="<?= base_url(); ?>fotografi/edit/<?= $d['id_fotografi']; ?>" class="badge badge-success float-center">Edit</a></td>
                            <td><a href="<?= base_url(); ?>fotografi/hapus/<?= $d['id_fotografi']; ?>" class="badge badge-danger float-center" onclick="return confirm('Yakin Data ini akan dihapus');">Hapus</a></td>
                            <td><a href="<?= base_url(); ?>fotografi/detail/<?= $d['id_fotografi']; ?>" class="badge badge-danger float-center" >Detail</a></td>

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

