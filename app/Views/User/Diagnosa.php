<?= $this->extend('Template/TemplateUser/Template') ?>
<?= $this->section('content'); ?>
<?php 
$session = session();
$fail = $session->getFlashdata('fail');
?>
<div class="diagnosa">
    <div class="diagnosaContainer">
        <div class="diagnoasaForm">   
            <form action="/Diagnosa/CheckDiagnosa" class="container formDiagnosa" method="post">
                <?php if($fail): ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <?= $fail ?>
                    </div>
                <?php endif ?>
                <h1 class="titleForm">Gejala Pada Laptop</h1>
                <?php foreach($gejala as $g):  ?>
                <div class="mb-1 row qGejala">
                    <label class="col-sm-10 col-10   col-form-label textLabel"><?= $g->kode_gejala ?> | Apakah
                        <?=$g->nama_gejala ?> ? </label>
                    <div class="col-sm-2 col-2">
                        <input class="form-check-input" type="checkbox" id="<?= $g->id_gejala ?>"
                            value="<?= $g->id_gejala ?>" name="id_gejala[]" >
                    </div>
                </div>
                <?php endforeach ?>
                <div class="submitBtn">
                    <button type="submit" class="btn btnSubmit ">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>