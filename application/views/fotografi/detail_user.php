<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: auto; margin-right: auto;">
            <center>
                <h1>Order Now</h1><br>
            </center>
            <div class="row">
                <div class="col-lg-12" style="background-color: #f2f2f2; max-height: 2000px; max-width: 3000px; padding: 10px; border-radius: 25px;">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" name="form1" id="form1" action="<?= base_url(); ?>fotografi/tambah_transak">
                          <center>
                            <input type="hidden" name="id_fotografi" value="<?php echo $fotografi['id_fotografi']; ?>" id="id_fotografi" maxlength="20" required>
                            <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>" id="id_user" required>
                            <input type="hidden" name="harga" value="<?php echo $fotografi['harga']; ?>" id="harga" required>
                            <center><img class="zoom" style="margin-top:30px;margin-bottom:30px;border: 1px solid black;" src="<?= base_url() ?>/uploads/foto/<?= $fotografi['foto'] ?>" width="140"></center>
                            <h2><?php echo $fotografi['nama']; ?></h2>
                            <h5>"Rp. <?php echo $fotografi['harga']; ?>"</h5>
                            <div class="form-group">
                                <label for="alamatfotografi">Masukan Alamat anda</label>
                                <input type="text" class="form-control" id="alamatfotograf" name="alamatfotograf">
                            </div>
                          </center>
                          <center><button style="font-size:10px;width:150px;height:50px;margin-top:20px;" class="btn btn-success">Order</button></center>
                </div>
                <br>
                </form>
            </div>
</div>