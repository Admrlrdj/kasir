<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <title>RdjKasir | Login</title>

    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/login.css">
</head>

<body class="hold-transition login-page" id="bg">
    <div class="login">
        <?php $errors = session()->getFlashdata('errors');
        if (!empty($errors)) { ?>
            <div class="alert alert-danger alert-dismissible mb-4">
                <ul>
                    <?php foreach ($errors as $key => $error) { ?>
                        <li><?= esc($error) ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
        <?php if (session()->getFlashdata('gagal')) {
            echo '<div class="alert alert-danger alert-dismissible"> <i class="icon fas fa-times"></i>';
            echo session()->getFlashdata('gagal');
            echo '</div>';
        } ?>
        <?php if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissible"> <h5><i class="icon fas fa-check"></i>';
            echo session()->getFlashdata('pesan');
            echo '</h5></div>';
        } ?>
        <?php echo form_open('Home/CekLogin', array('class' => 'login__form')); ?>
        <h1 class="login__title">Login</h1>

        <div class="login__content">
            <div class="login__box">
                <i class="ri-user-3-line login__icon"></i>

                <div class="login__box-input">
                    <input type="email" class="login__input" name="email" placeholder="">
                    <label for="" class="login__label">Email</label>
                </div>
            </div>

            <div class="login__box">
                <i class="ri-lock-2-line login__icon"></i>

                <div class="login__box-input">
                    <input type="password" class="login__input" name="password" placeholder="">
                    <label for="" class="login__label">Password</label>
                </div>
            </div>
        </div>

        <button type="submit" class="login__button">Login</button>

        <p class="login__register">
            Don't have an account? <a href="<?= base_url('Auth/Register') ?>">Register</a>
        </p>
        <?php form_close(); ?>
    </div>
</body>

</html>