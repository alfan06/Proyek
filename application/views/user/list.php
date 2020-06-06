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
              <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_karyawan"><i class="fas fa-sm fa-plus"></i> Tambah</button>
              <a href="<?= base_url(); ?>user/laporan_pdf"><button class="btn btn-sm btn-danger mb-3"><i class="fas fa-file-pdf"></i> Export PDF</button></a>
                <table id="listUser" class="table table-bordered table-hover">
                  <thead>
                    <tr style="background-color:darkcyan;color:white">
                      <td>Name</td>
                      <td>Username</td>
                      <td>Email</td>
                      <th>Foto</th>
                      <td>Level</td>
                      <td>Status</td>
                      <td>Action</td>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                                    foreach ($user as $usr) : ?>
                                        <tr>
                                            <td>
                                                <?= $usr->nama ?>
                                            </td>
                                            <td>
                                                <?= $usr->username ?>
                                            </td>
                                            <td>
                                                <?= $usr->email ?>
                                            </td>
                                            <td>
                                               <img src="<?= base_url() ?>/uploads/profil/<?= $usr->foto ?>" alt="" width="100px">
                                            </td>
                                            <td>
                                                <?= $usr->level ?>
                                            </td>
                                            <td>
                                                <?= $usr->status ?>
                                            </td>
                                            <?php
                                            $usernameLoginNow = $this->session->userdata('user');
                                            if ($usr->username  == $usernameLoginNow) { ?>
                                                <td>
                                                    <a href="<?php echo base_url(); ?>user/detail/<?= $usr->id_user ?>" class="btn btn-primary float-center">Detail</a>
                                                </td>
                                            <?php
                                            } else { ?>
                                                <td>
                                                    <a href=" <?php echo base_url(); ?>user/hapusDataUser/<?= $usr->id_user ?>" class="btn btn-danger float-center" onclick="return confirm('Are you sure want to delete this data?')">Delete</a>
                                                    <a href="<?= base_url(); ?>user/edit/<?= $usr->id_user ?>" class="btn btn-success float-center">Edit</a>
                                                    <a href="<?php echo base_url(); ?>user/detail/<?= $usr->id_user ?>" class="btn btn-primary float-center">Detail</a>
                                                    <a href="<?php echo base_url(); ?>user/changePassword/<?= $usr->id_user ?>" class="btn btn-warning float-center">Change Password</a>
                                                </td>
                                            <?php
                                            }
                                            ?>
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

