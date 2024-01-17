<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="icon" href="../../../assets/img/colokan.png" sizes="16x16" />
    <link rel="stylesheet" href="../../../assets/libs/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../assets/libs/owl.carousel/dist/assets/owl.carousel.css" />
    <link rel="stylesheet" href="../../../assets/libs/owl.carousel/dist/assets/owl.theme.default.css" />
    <link rel="stylesheet" href="../../../assets/libs/remixicon/fonts/remixicon.css" />
    <link rel="stylesheet" href="../../../assets/fonts/fonts.css" />
    <link rel="stylesheet" href="../../../assets/css/app.css" />

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
                            <h4 class="text heading-h4">Register</h4>
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
                            <form class="form-main" method="post" action="{{ route('register.perform') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" class="input heading-SB" name="level" value="2">

                                <div class="input-otr">
                                    <input type="text" class="input heading-SB" name="full_name" value="{{ old('full_name') }}" placeholder="Full name" required autocomplete="off">
                                    @if ($errors->has('full_name'))
                                    <span class="text-danger text-left">{{ $errors->first('full_name') }}</span>
                                    @endif
                                </div>

                                <div class="input-otr">
                                    <input type="email" class="input heading-SB" name="email" value="{{ old('email') }}" placeholder="name@example.com" required autocomplete="off">
                                    @if ($errors->has('email'))
                                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="input-otr">
                                    <input type="text" class="input heading-SB" name="username" value="{{ old('username') }}" placeholder="Username" required autocomplete="off">
                                    @if ($errors->has('username'))
                                    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                                <div class="input-otr input-otr-2">
                                    <input type="password" class="input heading-SB" name="password" value="{{ old('password') }}" placeholder="Password" required>
                                    @if ($errors->has('password'))
                                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="input-otr input-otr-2">
                                    <input type="password" class="input heading-SB" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required>
                                    @if ($errors->has('password_confirmation'))
                                    <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>
                                <br>
                                <div class="check-main">
                                    <a href="/" class="forget heading-SB">Home</a>
                                    <a href="/login" class="forget heading-SB">Login</a>

                                </div>
                                <div class="action">
                                    <input class="button heading-SB" type="submit" value="Submit">
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


    <script src="../../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../../assets/libs/jquery.countdown/jquery.countdown.min.js"></script>
    <script src="../../../assets/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="../../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/js/app.js"></script>

</body>

</html>