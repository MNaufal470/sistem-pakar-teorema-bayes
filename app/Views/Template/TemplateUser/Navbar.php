<nav class="navbar navbar-expand-lg navbar-light bg-header ">
    <div class="container-fluid absoluteNav">
        <a class="navbar-brand textLogo" href="/Home"><img src="/Assets/Img/Logo/Logo.png" alt="" class="logoNavbar">
            <span class="textLogoColor"> Master</span>Comp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav ms-auto me-3">
                <li class="nav-item">
                    <a class="nav-link active TextWithLogo" aria-current="page" href="/Home"><i
                            class="ri-home-3-line"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link TextWithLogo mx-3" href="/Home#about"><i
                            class="ri-information-line "></i>About</a>
                </li>
                <?php if (session()->get('loggedUser')) : ?>
                <li class="nav-item">
                    <a class="nav-link TextWithLogo" href="/UserAuth/Logout" style="text-transform: capitalize;"><i
                            class="ri-login-circle-line"></i>Hi,
                        <?= session()->get('loggedUser') ?></a>
                </li>
                <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link TextWithLogo" href="/UserAuth"><i class="ri-login-circle-line"></i>Login</a>
                </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>