<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Flickermotion</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendors/linericon/style.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/themify-icons.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendors/owl-carousel/owl.carousel.min.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendors/lightbox/simpleLightbox.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendors/nice-select/css/nice-select.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendors/animate-css/animate.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendors/jquery-ui/jquery-ui.css') ?>" />
  <!-- main css -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css') ?>" />
</head>


<!-- Custom fonts for this template -->
<link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


<!-- Custom styles for this template -->
<link href="<?= base_url('assets/css/grayscale2.min.css') ?>" rel="stylesheet">

</head>

<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">flicker.Motion</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>galeri">Galeri</a>
          </li>
          <!-- Try -->
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>fotografi">Fotografi</a>
          </li>
          <!-- Try -->
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?= base_url(); ?>transaksi/user_transaki">Transaksi Saya</a>
          </li>
          <li class="nav-item submenu dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">WELCOME, <?= $this->session->userdata('user') ?></a>
            <ul class="dropdown-menu">
              <li class="nav-item">
                <a class="nav-link(dropdown)" href="<?= base_url(); ?>auth/logout">Logout</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>