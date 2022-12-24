<?= $this->extend('Template/TemplateUser/Template') ?>
<?= $this->section('content') ?>
<?php 
$session = session();
$fail = $session->getFlashdata('fail');
$incorrect = $session->getFlashdata('failPassword');
?>
<div class="login containerHome">
    <div class="loginInput">
        <form action="/UserAuth/SignIn" method="post" class="inputLoginForm">
            <h1 class="text-center mb-5">Login</h1>
            <?= csrf_field(); ?>
            <?php if (!empty(session()->getFlashdata('success'))) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif ?>
            <?php if (!empty(session()->getFlashdata('failLogin'))) : ?>
            <div class="alert alert-warning"><?= session()->getFlashdata('failLogin') ?></div>
            <?php endif ?>
            <div class="mb-3">
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Name"
                    name="name" value="<?= old('name') ?>">
                <?php if(isset($fail['name'])): ?>
                <span class="text-danger p-0"><?=$fail['name']
                 ?></span>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Enter Password"
                    name="password">
                <?php if(isset($fail['password']) ): ?>
                <span class="text-danger p-0"><?=$fail['password']
                 ?></span>
                <?php endif ?>
                <?php if(isset($incorrect) ): ?>
                <span class="text-danger p-0"><?=$incorrect
                 ?></span>
                <?php endif ?>
            </div>
            <button type="submit" class="btn btnLogin">Login</button>
            <div class="GoToRegister">
                <span>Tidak punya akun ? silahkan daftar <a href="/UserAuth/Register" class="">Disini</a></span>
            </div>
        </form>
    </div>
    <div class="circle "></div>
    <div class="circleR"></div>
</div>

<?= $this->endSection(); ?>