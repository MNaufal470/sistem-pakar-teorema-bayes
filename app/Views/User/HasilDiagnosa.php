<?= $this->extend('Template/TemplateUser/Template') ?>
<?= $this->section('content') ?>
<?php     function konversi($angka){
      $hasil_rupiah = "Rp " . number_format($angka);
      return $hasil_rupiah;
    } ?>
<div class="hDiagnosa container">
    <div class="hDiagnosaContent">
        <h1 class="text-center">Hasil Diagnosa</h1>
        <div class="row justify-content-center">
            <?php foreach($diagnosa as $diag): ?>
            <div class="col-lg-4 col-12 col-md-6">
                <?php
                if ($diag['id_kerusakan'] == 1) {
                  $diag['id_kerusakan'] = 'Rusak Pada IC Power';
                } else if ($diag['id_kerusakan'] == 2) {
                  $diag['id_kerusakan'] = 'Rusak Pada IC VGA';
                } else if ($diag['id_kerusakan'] == 3) {
                  $diag['id_kerusakan'] = 'Rusak pada Inverter/gangguan pada fleksibel kabel';
                } else if ($diag['id_kerusakan'] == 4) {
                  $diag['id_kerusakan'] = 'Rusak pada LCD';
                } else if ($diag['id_kerusakan'] == 5) {
                  $diag['id_kerusakan'] = 'Rusak pada Keyboard';
                }
                ?>
                <div class="hDiagnosaItem">
                    <h3><?= $diag['id_kerusakan'] ?></h3>
                    <div class="boxProbalitas">
                        <span><?= floor($diag['hasil_probabilitas'] * 100) ?> %</span>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <div class="hasilAPost mt-5">
            <div class="boxHasil ">
                <div class="infoUser mb-2 row ">
                    <div class="titleHasilDiagnosa col-md-3 col-12 col-sm-4 p-0">
                        <span class="titleDiag">Nama</span>
                        <span class="titleDiag">:</span>
                    </div>
                    <span class="col-md-8 col-12 col-sm-7 p-0 text-capitalize"> <?= $user['name'] ?></span>
                </div>
                <div class="gDipilih mb-2 row">
                    <div class="titleHasilDiagnosa col-md-3 col-12 col-sm-4 p-0">
                        <span class="titleDiag">Gejala</span>
                        <span class="titleDiag">:</span>
                    </div>
                    <div class="daftarGejala col-md-8 col-12 col-sm-7 p-0">
                        <ul>
                            <?php foreach($gejala as $g): ?>
                            <li> <?=$g['kode_gejala'] ?> | Apakah <?=$g['nama_gejala'] ?> ?</li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
                <div class="hasilDiagnosa mb-2 row">
                    <div class="titleHasilDiagnosa col-md-3 col-12 col-sm-4 p-0">
                        <span class=" titleDiag">Hasil Diagnosa </span>
                        <span class="titleDiag">:</span>
                    </div>
                    <div class="imgDiagnosa col-md-8 col-12 col-sm-7 p-0">
                        <?php foreach ($tertinggi as $tinggi) : ?>
                        <?php
                if ($tinggi['id_kerusakan'] == 1) {
                  $tinggi['id_kerusakan'] = 'Rusak Pada IC Power';
                } elseif ($tinggi['id_kerusakan'] == 2) {
                  $tinggi['id_kerusakan'] = 'Rusak Pada IC VGA';
                } elseif ($tinggi['id_kerusakan'] == 3) {
                  $tinggi['id_kerusakan'] = 'Rusak pada Inverter/gangguan pada fleksibel kabel';
                } elseif ($tinggi['id_kerusakan'] == 4) {
                  $tinggi['id_kerusakan'] = 'Rusak pada LCD';
                } elseif ($tinggi['id_kerusakan'] == 5) {
                  $tinggi['id_kerusakan'] = 'Rusak pada Keyboard';
                }
                endforeach ?>
                        <span class="text-capitalize"><?= $tinggi['id_kerusakan'] ?></span>
                        <?php foreach($detail as $d) : ?>
                        <img src="/Assets/Img/Kerusakan/<?= $d['gambar'] ?>" alt="" class="img-diagnosa">
                    </div>
                </div>
                <div class="solusi mb-2 row ">
                    <div class="titleHasilDiagnosa col-md-3 col-12 col-sm-4 p-0">
                        <span class=" titleDiag">Solusi</span>
                        <span class="titleDiag">:</span>
                    </div>
                    <span class="col-md-8 col-12 col-sm-7 p-0"><?= $d['solusi'] ?></span>
                </div>
            </div>
            <?php endforeach ?>
            <div class="blogPostHasil">
                <?php if($tinggi['id_kerusakan'] == 'Rusak Pada IC Power'){ ?>
                <div class="card cardInfoBlog" style="width: 18rem;">
                    <img src=" /Assets/Img/ImgBlog/icPower.jpg" class="card-img-top img-blog" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-blue">Kerusakan Ic Power</h5>
                        <p class="card-text text-gray">Kunjungi halaman ini untuk mengetahui informasi tentang kerusakan
                            pada ic power.</p>
                        <a href="/Blog/IcPower" class="btn btnSubmit">Lihat Sekarang</a>
                    </div>
                </div>
                <?php } ?>
                <?php if($tinggi['id_kerusakan'] == 'Rusak Pada IC VGA'){ ?>
                <div class="card cardInfoBlog" style="width: 18rem;">
                    <img src=" /Assets/Img/ImgBlog/icVga.jpg" class="card-img-top img-blog" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-blue">Kerusakan IC VGA</h5>
                        <p class="card-text text-gray">Kunjungi halaman ini untuk mengetahui informasi tentang kerusakan
                            pada ic vga.</p>
                        <a href="/Blog/IcVga" class="btn btnSubmit">Lihat Sekarang</a>
                    </div>
                </div>
                <?php } ?>
                <?php if($tinggi['id_kerusakan'] == 'Rusak pada Inverter/gangguan pada fleksibel kabel'){ ?>
                <div class="card cardInfoBlog" style="width: 18rem;">
                    <img src=" /Assets/Img/ImgBlog/kabelFlexibel.jpg" class="card-img-top img-blog" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-blue">Kerusakan Kabel Flexibel </h5>
                        <p class="card-text text-gray">Kunjungi halaman ini untuk mengetahui informasi tentang kerusakan
                            pada kabel flexibel.</p>
                        <a href="/Blog/KabelFlexibel" class="btn btnSubmit">Lihat Sekarang</a>
                    </div>
                </div>
                <?php } ?>
                <?php if($tinggi['id_kerusakan'] == 'Rusak pada LCD'){ ?>
                <div class="card cardInfoBlog" style="width: 18rem;">
                    <img src=" /Assets/Img/ImgBlog/LcdLaptop.jpg" class="card-img-top img-blog" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-blue">Kerusakan LCD</h5>
                        <p class="card-text text-gray">Kunjungi halaman ini untuk mengetahui informasi tentang kerusakan
                            pada LCD.</p>
                        <a href="/Blog/LcdError" class="btn btnSubmit">Lihat Sekarang</a>
                    </div>
                </div>
                <?php } ?>
                <?php if($tinggi['id_kerusakan'] == 'Rusak pada Keyboard'){ ?>
                <div class="card cardInfoBlog" style="width: 18rem;">
                    <img src=" /Assets/Img/ImgBlog/Keyboard.jpg" class="card-img-top img-blog" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-blue">Kerusakan Keyboard</h5>
                        <p class="card-text text-gray">Kunjungi halaman ini untuk mengetahui informasi tentang kerusakan
                            pada keyboard.</p>
                        <a href="/Blog/Keyboard" class="btn btnSubmit">Lihat Sekarang</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

    </div>
</div>




<?= $this->endSection(); ?>