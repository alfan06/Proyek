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
                <!-- https://getbootstrap.com/docs/4.1/components/card/ -->
                <div class="card">
                    <div class="card-header">
                        Form Tambah Data Galeri
                    </div>
                    <div class="card-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors() ?>
                            </div>
                        <?php endif ?>
                        
                        <?php echo form_open_multipart() ?>
                            <!-- https://getbootstrap.com/docs/4.1/components/forms/ -->
                            <div class="form-group">
                                <label for="nama">tgl_upload</label>
                                <input type="date" class="form-control" id="date" name="tgl_upload" value="<? date('y-m-d')?>">
                            </div>
                            <div class="form-group">
                                <label for="upload-foto">Foto</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                        <?php echo form_close() ?>
                        <a href="<?= base_url(); ?>galeri" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
                &nbsp;
            </div>
        </div>
    </div>
    </div>
</body>