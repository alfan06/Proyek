<!-- <body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">	
			<section class="cat_product_area section_gap">
              <div class="container">
                <div class="row flex-row-reverse">
                  <div class="col-lg-9">
                    <div class="latest_product_inner">
                      <div class="row"> -->

					  	<!-- <?php foreach ($fotografi as $d) : ?>
                            <div class="col-lg-4 col-md-6">
                              <center>
                                <div class="single-product">
                                  <div class="product-img">
                                    <img class="card-img" src="<?= base_url() ?>/uploads/foto/<?= $d['foto'] ?>">
                                  </div>
                                  <div class="product-btm">
                                    <a href="#" class="d-block">
                                      <h4>"<?php echo $d['nama']; ?>"</h4>
                                    </a>
                                    <div class="mt-3">
                                      <span class="mr-4">"<?php echo $d['harga']; ?>"</span> -->
                                      <!-- <del>"<?php echo $row['harga2'] ?>"</del> -->
                                    <!-- </div>
                                  </div>
                                </div>
                              </center>
                            </div>
						<?php endforeach; ?>    -->

						<!-- <table id="listUser" class="table table-bordered table-hover">
                  <thead>
                  <tr align="center" style="background-color: lightblue;color:black">
                            <th>Kode fotografi</th>
                            <th>Nama fotografi</th>
                            <th>Harga</th>
                            <th>Foto</th>
                            <th>Edit</th>
                            <th>Hapus</th>
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

                        </tr>
                    <?php endforeach; ?>
                  </tfoot>
                  </table> -->
                        <!--sds-->
                        <!--ddd-->
                      <!-- </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
</body>
</html> -->

   <!-- Header -->
   <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">FLICKER MOTION</h1>
		<h2 class="text-white-50 mx-auto mt-2 mb-5">"Capture Your Memories"</h2>
		<h3 class="text-white-50 mx-auto mt-2 mb-5">"Hi, <?= $this->session->userdata('user') ?>"</h2>
        <a href="<?= base_url(); ?>fotografi" class="btn btn-primary js-scroll-trigger">Get Started</a>
      </div>
    </div>
  </header>
  </body>
</html>