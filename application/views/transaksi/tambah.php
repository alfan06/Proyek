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
                        Form Tambah Data Transaksi
                    </div>
                    <div class="card-body">
                        <!-- untuk menampilkan pesan error -->
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif ?>
                        <form action="" method="post">
                            <!-- https://getbootstrap.com/docs/4.4/components/forms/ -->
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="id_user">Nama User</label>
                                    <select class="form-control" id="id_user" name="id_user">
                                        <option selected="selected">Pilih User</option>
                                        <?php foreach ($user as $u) : ?>
                                            <option value="<?= $u['id_user'] ?>"><?= $u['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="id_fotografi">Nama fotografi</label>
                                    <select class="form-control" id="id_fotografi" name="id_fotografi">
                                        <option selected="selected">Pilih fotografi</option>
                                        <?php foreach ($fotografi as $d) : ?>
                                            <option value="<?= $d['id_fotografi'] ?>"><?= $d['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamatfotografi">Alamat Fotografi</label>
                                    <input type="text" class="form-control" id="alamatfotografi" name="alamatfotografi">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary float-right"> Submit </button>
                            </form>
                            <a href="<?= base_url(); ?>transaksi" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
                &nbsp;
            </div>
        </div>
    </div>

</body>