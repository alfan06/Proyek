<style type="text/css">
    .bg-login {
        background-image: url(<?php echo base_url('images/bg1.jpeg'); ?>);
        background-repeat: repeat;
        background-size: cover;
    }
</style>

<body class="bg-login">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <!-- https://getbootstrap.com/docs/4.4/components/card/ -->

                <div class="card-header">
                    Form Edit Data fotografi
                </div>
                <div class="card-body">
                    <!-- untuk menampilkan pesan error -->
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="post">
                        <input type="hidden" name="id_fotografi" value="<?= $fotografi['id_fotografi']; ?>">
                        <!-- https://getbootstrap.com/docs/4.4/components/forms/ -->
                        <div class="form-group">
                            <label for="nama">Nama fotografi</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $fotografi['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="harga">harga fotografi</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $fotografi['harga']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="foto">fotografi</label>
                            <input type="text" class="form-control" id="foto" name="foto" value="<?= $fotografi['foto']; ?>">
                        </div>
                        <button type="submit" name="edit" class="btn btn-primary float-right"> Edit </button>
                    </form>
                    <a href="<?= base_url(); ?>fotografi" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>