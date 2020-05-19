
<!-- CSS here -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">


<section class="new-product-area section-padding30">
            <div class="container"> 
                <!-- Section tittle -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-tittle mb-70">
                            <h2>Galeri</h2>
                        </div>
                    </div>
                </div>
			</div>
</section>


<section class="cat_product_area section_gap">
    <div class="container">
        <div class="row flex-row-reverse">
          	<div class="col-lg-9">
            	<div class="latest_product_inner">
              		<div class="row">
						<?php
						foreach ($galeri as $d) : ?>
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
							<div class="product-img">
								<img class="card-img" src="<?= base_url() ?>/uploads/galeri/<?= $d['foto'] ?>" alt="">
							</div>
							</div> 
						</div>
						<?php endforeach; ?>
					</div>
              	</div>
            </div>
        </div>
    </div>
</section>