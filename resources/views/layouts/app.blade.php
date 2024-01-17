<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="icon" href="../../../assets/img/colokan.png" sizes="16x16" />
    <link rel="stylesheet" href="../../../assets/libs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/libs/owl.carousel/dist/assets/owl.carousel.css">
    <link rel="stylesheet" href="../../../assets/libs/owl.carousel/dist/assets/owl.theme.default.css">
    <link rel="stylesheet" href="../../../assets/libs/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="../../../assets/fonts/fonts.css">
    <link rel="stylesheet" href="../../../assets/css/app.css">

    @yield('head')
</head>

<body>


    <div class="Loader">
        <div class="spinnerPairHolder">
            <div class="spinnerPair">
                <div class="spinnerPairCercle"></div>
                <div class="spinnerPairCercle"></div>
            </div>
            <div class="spinnerPair">
                <div class="spinnerPairCercle"></div>
                <div class="spinnerPairCercle"></div>
            </div>
            <div class="spinnerPair">
                <div class="spinnerPairCercle"></div>
                <div class="spinnerPairCercle"></div>
            </div>
            <div class="spinnerPair">
                <div class="spinnerPairCercle"></div>
                <div class="spinnerPairCercle"></div>
            </div>
            <div class="spinnerPair">
                <div class="spinnerPairCercle"></div>
                <div class="spinnerPairCercle"></div>
            </div>
        </div>
    </div>
    @include('layouts.sidebar')


    <div>
        @yield('content')
    </div>



    @include('layouts.footer')



    <script src="../../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../../assets/libs/jquery.countdown/jquery.countdown.min.js"></script>
    <script src="../../../assets/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="../../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/js/app.js"></script>
    @yield('pagescript')
</body>

</html>