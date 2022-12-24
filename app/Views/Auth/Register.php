<?= $this->extend('Template/TemplateUser/Template') ?>
<?= $this->section('content') ?>
<?php 
$session = session();
$fail = $session->getFlashdata('fail');
?>
<div class="register containerHome">
    <div class="loginInput">
        <form action="/UserAuth/Regist" method="post" class="inputLoginForm" autocomplete="off">
            <h1 class="text-center mb-3">Register</h1>
            <?= csrf_field(); ?>
            <div class="<?=isset($fail['name'])? 'mb-0': 'mb-3'?>">
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Name"
                    name="name" value="<?= old('name') ?>">
                <?php if(isset($fail['name'])): ?>
                <span class="text-danger p-0"><?=$fail['name']
                 ?></span>
                <?php endif ?>
            </div>
            <div class="<?=isset($fail['email'])? 'mb-0': 'mb-3'?>">
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Email"
                    name="email" value="<?= old('email') ?>">
                <?php if(isset($fail['email'])): ?>
                <span class="text-danger p-0"><?=$fail['email']
                 ?></span>
                <?php endif ?>
            </div>
            <div class="<?=isset($fail['password'])? 'mb-0': 'mb-3'?>">
                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Enter Password"
                    name="password">
                <?php if(isset($fail['password'])): ?>
                <span class="text-danger p-0"><?=$fail['password']
                 ?></span>
                <?php endif ?>
            </div>
            <div class="<?=isset($fail['cpassword'])? 'mb-0': 'mb-3'?>">
                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Confirm Password"
                    name="cpassword">
                <?php if(isset($fail['cpassword'])): ?>
                <span class="text-danger p-0"><?=$fail['cpassword']
                 ?></span>
                <?php endif ?>
            </div>
            <button type="submit" class="btn btnLogin">Register</button>
            <div class="GoToRegister">
                <span>Sudah punya akun ? silahkan Login <a href="/UserAuth/">Disini</a></span>
            </div>
        </form>
    </div>
    <div class="circle"></div>
    <div class="circleR"></div>
</div>

<?= $this->endSection(); ?>