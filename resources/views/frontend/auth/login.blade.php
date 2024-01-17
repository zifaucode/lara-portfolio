<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="icon" href="assets/img/colokan.png" sizes="16x16" />
    <link rel="stylesheet" href="assets/libs/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/libs/owl.carousel/dist/assets/owl.carousel.css" />
    <link rel="stylesheet" href="assets/libs/owl.carousel/dist/assets/owl.theme.default.css" />
    <link rel="stylesheet" href="assets/libs/remixicon/fonts/remixicon.css" />
    <link rel="stylesheet" href="assets/fonts/fonts.css" />
    <link rel="stylesheet" href="assets/css/app.css" />

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



    <!--==================================
            Login Start Here
    ===================================-->

    <div class="login-main">
        <div class="container-fluid">
            <div class="row row-login">
                <div class="col-lg-8 col-login-otr">
                    <div class="col-login-inr">
                        <div class="content">
                            <h4 class="text heading-h4">Login</h4>
                            <!-- <div class="btn-main">
                                <a href="" class="btn">
                                    <i class="ri-facebook-circle-fill icon"></i>
                                    <p class="text heading-SB">Facebook</p>
                                </a>
                                <a href="" class="btn">
                                    <i class="ri-google-fill icon"></i>
                                    <p class="text heading-SB">Google</p>
                                </a>
                            </div>
                            <h4 class="text heading-h4">-- OR --</h4> -->
                            <form class="form-main" action="{{ route('auth') }}" method="post">
                                @csrf

                                @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                                @endif

                                @if (Session::has('error'))
                                <div class="alert alert-danger mb-0" role="alert">
                                    <span>{{ Session::get('error') }}</span>

                                </div>
                                @endif

                                <div class="input-otr">
                                    <input type="text" name="email" class="input heading-SB" value="{{ old('email') }}" placeholder="Email" required autofocus>
                                    @if ($errors->has('email'))
                                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="input-otr input-otr-2">
                                    <input type="password" name="password" class="input heading-SB" placeholder="Password" required>

                                </div>
                                <br>

                                <div class="check-main">
                                    <a href="/" class="forget heading-SB">Home</a>
                                    <a href="/register" class="forget heading-SB">Daftar</a>

                                </div>
                                <br>
                                <div class="action">
                                    <button type="submit" class="button heading-SB"> Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==================================
            Login End Here
    ===================================-->


    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/jquery.countdown/jquery.countdown.min.js"></script>
    <script src="assets/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").fadeTo(300, 0).slideUp(300, function() {
                $(this).remove();
            });

        }, 3000);
    </script>

</body>

</html>