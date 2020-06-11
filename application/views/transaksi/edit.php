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
                <div class="card-header">
                    Form Edit Data Transaksi
                </div>
                <div class="card-body">
                    <!-- untuk menampilkan pesan error -->
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="post">
                        <input type="hidden" name="id_transaksi" value="<?= $transaksi['id_transaksi']; ?>">
                        <input type="hidden" name="id_fotografi" value="<?= $transaksi['id_fotografi']; ?>">
                        <!-- https://getbootstrap.com/docs/4.4/components/forms/ -->
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nama">Nama User</label>
                                <select class="form-control" id="id_user" name="id_user">
                                    <option selected="selected">Pilih user</option>
                                    <?php foreach ($user as $u) : ?>
                                        <option value="<?= $u['id_user'] ?>" selected><?= $u['nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama fotografi</label>
                                <select class="form-control" id="id_fotografi" name="id_fotografi">
                                    <option selected="selected">Pilih fotografi</option>
                                    <?php foreach ($fotografi as $d) : ?>
                                        <option value="<?= $d['id_fotografi'] ?>" selected><?= $d['nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl_transaksi">Tanggal Transaksi</label>
                                <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" value="<?= $transaksi['tgl_transaksi']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="alamatfotografi">alamatfotografi</label>
                                <input type="text" class="form-control" id="alamatfotografi" name="alamatfotografi" value="<?= $transaksi['alamatfotografi']; ?>">
                            </div>
                            <button type="submit" name="edit" class="btn btn-primary float-right"> Edit </button>
                        </form>
                        <a href="<?= base_url(); ?>transaksi" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>