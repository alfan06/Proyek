    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
<div class="container" style="padding: 20px; margin: 10 px auto; margin-left: auto; margin-right: auto;">
            <center>
                <h1>Order Now</h1><br>
            </center>
            <div class="row">
                <div class="col-lg-12" style="background-color: #f2f2f2; max-height: 2000px; max-width: 3000px; padding: 10px; border-radius: 25px;">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" name="form1" id="form1" action="<?= base_url(); ?>transaksi/tambah_user">
                          <center>
                            <center><img class="zoom" style="margin-top:30px;margin-bottom:30px;border: 1px solid black;" src="<?= base_url() ?>/uploads/foto/<?= $fotografi['foto'] ?>" width="140"></center>
                            <h2><?php echo $fotografi['nama']; ?></h2>
                            <h5>"Rp. <?php echo $fotografi['harga']; ?>"</h5>
                            <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>" id="id_user" maxlength="20" required>
                            <input type="hidden" name="id_fotografi" value="<?= $fotografi['id_fotografi']; ?>" id="id_fotografi" required>
                            <div class="form-group">
                                <label for="alamatfotografi">Masukan Alamat anda</label>
                                <input type="text" class="form-control" id="alamatfotograf" name="alamatfotografi">
                            </div>
                          </center>
                          <center><button style="font-size:10px;width:150px;height:50px;margin-top:20px;" class="btn btn-success">Order</button></center>
                    </form>
                </div>
                <br>
</div>
<br>
<div class="container">
    <div class="w3-panel w3-teal">
		<p><b>Kolom Komentar:</b></p>
	</div>
    <form method="POST" action="<?= base_url(); ?>komen/kirimKomen">
        <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>" id="id_user" maxlength="20" required>
        <input type="hidden" name="id_fotografi" value="<?= $fotografi['id_fotografi']; ?>" id="id_fotografi" required>
        <div class="w3-padding">
            <input textarea name="isi"style="resize:none;width:300px;height:100px;"></textarea>
        </div>

        <button class="w3-button w3-block w3-teal w3-section w3-padding" type="submit">Kirim Komentar</button>
    </form>
</div>


<div class="container">
	<div class="w3-panel w3-pale-blue w3-leftbar w3-border-teal">
        <?php foreach ($komen as $d) : ?>
        <b><?= $d['nama']?></b>
			<br><?=$d['isi']?>
		</p>
        <?php endforeach ?>
    </div>

</div>
<br>