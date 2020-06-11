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
                        <!-- <div class="form-group">
                            <p for="foto">foto</p>
                            <div style="margin-bottom:0.1px">
                                <img class="zoom" style="margin-top:30px;margin-bottom:30px;border: 1px solid black;" src="<?= base_url() ?>/uploads/foto/<?= $fotografi['foto'] ?>" width="100">
                            </div>
                        </div>
                        <div class="form-group">
                            <p for="image">foto</label>
                            <input type="hidden" name="fotoLama" value="<?= $fotografi['foto']; ?>">
                            <input type="file" class="form-control" id="image" name="image">
                        </div> -->
                        <div class="form-group">
                            <p for="gambar">Foto : </p>
                            <?php if ($fotografi['foto'] == null) : ?>
                                <small>(Foto tidak ada)</small>
                            <?php else : ?>
                                <img src="<?= base_url() ?>/uploads/foto/<?= $fotografi['foto'] ?>" alt="" width="75px">
                            <?php endif ?>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="fotoLama" value="<?= $fotografi['foto']; ?>">
                            <label for="image">Ubah Foto:</label>
                            <input type="file" name="image" class="form-control-file">
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