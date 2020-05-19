<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detailed Fotografi
                </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                        <label for=""><b>Fotografi Name :</b></label>
                        <?php echo $fotografi['nama']; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Harga :</b></label>
                        "Rp. <?php echo $fotografi['harga']; ?>"
                    </p>
                    <p class="card-box">
                        <label for=""><b>Foto :</b></label>
                        <img class="zoom" style="margin-top:30px;margin-bottom:30px;border: 1px solid black;" src="<?= base_url() ?>/uploads/foto/<?= $fotografi['foto'] ?>" width="140">
                    </p>
                    <a href="<?= base_url('fotografi/index'); ?>" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>