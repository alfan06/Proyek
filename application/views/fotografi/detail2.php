
    <!--================Single Product Area =================-->
        <div class="container" style="padding: 20px; margin: 10 px auto; margin-left: auto; margin-right: auto;">
            <center>
                <h1>Detail Produk</h1><br>
            </center>
            <div class="row">
                <div class="col-lg-12" style="background-color: #f2f2f2; max-height: 2000px; max-width: 3000px; padding: 10px; border-radius: 25px;">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="prosesPesanBuku.php" name="form1" id="form1">
                                <center>
                                    <center><img class="zoom" style="margin-top:30px;margin-bottom:30px;border: 1px solid black;" src="<?= base_url() ?>/uploads/foto/<?= $fotografi['foto'] ?>" width="140"></center>
                                    <h2><?php echo $fotografi['nama']; ?></h2>
                                    <h5>"Rp. <?php echo $fotografi['harga']; ?>"</h5>
                                </center>
                                <br>
                                <center><button type="submit" style="width:500px;height:50px;font-size:25px;margin-top:15px;" class="btn btn-success" value="Pesan">Order Now</button></center>
                    </form>
            </div>
        </div>
    
