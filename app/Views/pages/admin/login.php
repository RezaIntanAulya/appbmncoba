<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/template/css/azzara.min.css">
    <link rel="icon" type="image/x-icon" href="<?= base_url('startbootstrap'); ?>/img/logo-bps.png">
</head>

<body class="login" >
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <div class="icon-object border-slate-300 text-center">
                <img src="<?= base_url('startbootstrap') ?>/img/logo-bps.png" width="70">
            </div>
                 <h3 class="text-center">Silahkan Login</h3>
                <?php
                if (session()->getFlashdata('message')) { ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php } ?>
                <form method="post" action="<?= base_url('login/auth') ?>">
                    <div class="login-form">    
                        <div class="form-group">
                            <label><b>Username</b></label>
                            <input type="text" class="form-control" name="username" required="" placeholder="Masukkan Username">
                        </div>
                        <div class="form-group">
                            <label><b>Password</b></label>
                            <input type="password" class="form-control" name="password" required="" placeholder="Masukkan Password">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block " type="submit">Login</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</body>

</html>