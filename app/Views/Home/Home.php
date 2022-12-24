<?= $this->extend('Template/TemplateUser/Template') ?>
<?= $this->section('content'); ?>
<!-- Home -->
<div class="containerHome ">
    <div class="homeContent">
        <div class="homeImg">
            <img src="/Assets/Img/Logo/LogoCPU.jpg" alt="" class="imgHome">
            <div class="homeImgText">
                <h1 class="homeTextl">Aplikasi sistem pakar metode theorema bayes untuk diagnosa kerusakan pada
                    Laptop /
                    Komputer.
                </h1>
                <!-- <a href="#" class="btn btn-primary mt-3">Login / Register</a> -->
                <a href="/Home/Diagnosa" class="btn btn-primary mt-3 TextWithLogo"><i class="ri-play-line"></i> Mulai
                    Diagnosa</a>
            </div>
        </div>
    </div>

    <div class="circle"></div>
    <div class="circleR"></div>
</div>
<!-- End Home -->

<!-- About -->
<div class="about pt-5" id="about">
    <div class="container-fluid">
        <div class="aboutContent">
            <div class="aboutDesc">
                <span>About</span>
                <h1>Aplikasi Sistem Pakar</h1>
                <p>Aplikasi ini dibangun untuk membantu para pengguna atau teknisi computer/laptop dalam mendiagnosa
                    kerusakan
                    hardwarenya.Sistem ini memiliki 5 jenis kerusakan,berdasarkan 13 gejala yang sering dialami.</p>
                <a href="/UserAuth" class="btn btnCallUs">Masuk / Daftar</a>
            </div>
            <div class="aboutBlog">
                <div class="swiper blog-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="blogItem">
                                <div class="blogImg">
                                    <img src="/Assets/Img/ImgBlog/icPower.jpg" alt="">
                                </div>
                                <div class="blogDesc">
                                    <h3>Kerusakan ic Power</h3>
                                    <p>Banyak sekali penyebab dari kerusakan ic power ini, penyebab yang sering
                                        terjadi
                                        biasanya disebabkan oleh jaringan listrik yang tidak stabil akibat naik
                                        turunnya
                                        tegangan listrik.</p>
                                    <a href="/Blog/IcPower" class="btn btnSubmit">Lihat</a>
                                </div>

                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blogItem">
                                <div class="blogImg">
                                    <img src="/Assets/Img/ImgBlog/icVga.jpg" alt="">
                                </div>
                                <div class="blogDesc">
                                    <h3>Kerusakan IC VGA</h3>
                                    <p>Overheat atau kelebihan panas pada laptop atau komputer adalah musuh nomor
                                        satu
                                        yang
                                        paling sering
                                        mengancam komponen ic VGA.</p>
                                    <a href="/Blog/IcVga" class="btn btnSubmit">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blogItem">
                                <div class="blogImg">
                                    <img src="/Assets/Img/ImgBlog/kabelFlexibel.jpg" alt="">
                                </div>
                                <div class="blogDesc">
                                    <h3>Kerusakan fleksibel kabel</h3>
                                    <p>Overheat atau kelebihan panas pada laptop atau komputer adalah musuh nomor
                                        satu
                                        yang
                                        paling sering
                                        mengancam komponen ic VGA.</p>
                                    <a href="/Blog/KabelFlexibel" class="btn btnSubmit">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blogItem">
                                <div class="blogImg">
                                    <img src="/Assets/Img/ImgBlog/lcdLaptop.jpg" alt="">
                                </div>
                                <div class="blogDesc">
                                    <h3>Kerusakan LCD</h3>
                                    <p>Keruskan LCD biasanya disebabkan karena perlakuan pada LCD yang terjatuh atau
                                        terkena
                                        air dalam jumlah yang banyak atau
                                        gangguan pada hardware yang terhubung oleh LCD. </p>
                                    <a href="/Blog/LcdError" class="btn btnSubmit">Lihat</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blogItem">
                                <div class="blogImg">
                                    <img src="/Assets/Img/ImgBlog/Keyboard.jpg" alt="">
                                </div>
                                <div class="blogDesc">
                                    <h3>Rusak pada Keyboard</h3>
                                    <p> Beberapa hal yang kerap menghambat respons pada keyboard seperti adanya debu
                                        atau kotoran, terkena cairan, terlalu sering menekan salah satu tombol, hingga
                                        gangguan driver keyboard</p>
                                    <a href="/Blog/Keyboard" class="btn btnSubmit">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End about -->

<?= $this->endSection(); ?>