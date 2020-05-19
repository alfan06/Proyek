<?=
    form_open('auth/prosesLogin');
?>
<!-- Required meta tags -->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script>
        function passwordShowUnshow() {
            var x = document.getElementById("password");
            var y = document.getElementById("passwordConf");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        }
    </script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6" style="margin:0 auto;background-color: green;border-radius: 25px;color:white">
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors() ?>
                    </div>
                <?php endif ?>
                <h4 style="text-align: center">Login</h4><br>
                <?= $this->session->flashdata('message'); ?>
                <?php
                if (isset($pesan)) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $pesan; ?>
                    </div>
                <?php
                }
                ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <input type="checkbox" onclick="passwordShowUnshow()"> Show/Unshow Password
                    </div>
                    Dont have an account? <a href="<?= base_url(); ?>auth/register">Register Here</a>
                    <button type="submit" name="submit" class="btn btn-primary float-right">Login</button><br><br>
                </form>
            </div>
        </div>
    </div>
</div>
<?=
    form_close();
?>