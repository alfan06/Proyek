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
                <div class="card">

                <div class="card-header">
                    Form Edit Data fotografi
                </div>
                <div class="card-body">
                    <!-- untuk menampilkan pesan error -->
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif ?>
                    <form action="fotografi/edit" method="post">
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
                        <input type="hidden" name="image" id="image" value="<?= $fotografi['foto']; ?>">
                        </div>
                        <!-- <div class="form-group">
                            <p for="gambar">Foto : </p>
                            <?php if ($fotografi['foto'] == null) : ?>
                                <small>(Foto tidak ada)</small>
                            <?php else : ?>
                                <img src="<?= base_url() ?>/uploads/foto/<?= $fotografi['foto'] ?>" alt="" width="75px">
                            <?php endif ?>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="fotoLama" id="foto" value="<?= $fotografi['foto']; ?>">
                            <label for="image">Ubah Foto:</label>
                            <input type="file" name="image" id="foto" class="form-control-file">
                        </div> -->
                        
                        <button type="submit" name="edit" class="btn btn-primary float-right"> Edit </button>
                    </form>
                    <a href="<?= base_url(); ?>fotografi" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>