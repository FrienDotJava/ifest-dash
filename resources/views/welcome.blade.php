<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Informatics Festival #12</title>
        <link rel="stylesheet" href="{{ asset('landingpage_/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('landingpage_/css/custom.css') }}">
        <link rel="shortcut icon" href="{{ asset('images/ifest.png') }}" type="image/x-icon">
    </head>
    <body id="main_wlcm_fst">
        <!-- Star -->
        <div id='stars'></div>
        <div id='stars2'></div>
        <div id='stars3'></div>

        <header class="d-flex justify-content-center mt-2">
            <a href="https://uajy.ac.id" tagret="_blank">
                <img src="{{ asset('images/atma_jaya5050.png') }}" class="icon_ifst" alt="uajy">
            </a>
            <a href="https://v3.himaforka-uajy.org" target="_blank">
                <img src="https://v3.himaforka-uajy.org/assets/images/logo.png" class="icon_ifst" alt="himaforka">
            </a>
            <a href="https://ifest.uajy.ac.id">
                <img src="{{ asset('images/ifest.png') }}" class="icon_ifst" alt="ifest">
            </a>
        </header>

        <main class="ifst_cs1 mt-4 mb-5 mb-md-0">
            <div class="d-flex justify-content-center fst">
                <section class="section_tp_ifst d-flex flex-column align-content-center">
                    <img src="{{ asset('landingpage_/images/Innovation _Monochromatic.svg') }}" alt="Icon" style="height:15rem">
                    <h1 class="text-white fst-italic text-center mt-2 mb-0">Informatics Festival #12</h1>
                </section>
            </div>
            <!-- <br> -->
            <div class="d-flex justify-content-center mt-5">
                <section class="section_tp_ifst fst_btn">
                    <h5 class="text-white text-center wlcm_ifst">Selamat datang di Sistem Registrasi Kompetisi Informatics Festival (IFest) #12.</h5>
                    <div class="btn_log_reg d-flex justify-content-center">
                        @auth
                            <a href="masuk" class="text-white btn_fst_log_reg">Dashboard</a>
                        @else
                            <a href="masuk" class="text-white btn_fst_log_reg me-4">Masuk</a>
                            <a href="daftar" class="text-white btn_fst_log_reg ms-4">Daftar</a>
                        @endif
                    </div>
                </section>
            </div>
        </main>

        <footer class="position-fixed fixed-bottom d-flex justify-content-center text-center">
            <small class="text-white">&copy; 2022-{{ date('Y')+1 }} <strong>Informatics Festival (IFest)</strong>. Hak Cipta Dilindungi.</small>
        </footer>

        <script src="{{ asset('landingpage_/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('landingpage_/js/jquery.min.js') }}"></script>
        <script src="{{ asset('landingpage_/js/custom.js') }}"></script>
    </body>
</html>
