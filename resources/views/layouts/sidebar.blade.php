<!--==================================
              Overlay Start Here
    ===================================-->

@php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
@endphp

<div class="overlay-content">
    <div class="modal-content-inr">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="logo-main">
                <div class="logo-otr"></div>
                <div class="close-icon-otr">
                    <i class="ri-close-line close-icon"></i>
                </div>
            </div>
            <div class="linkk-otr">
                <a href="/" class="linkk-home heading-h4">Home 🏛</a>
            </div>

            <div class="linkk-otr">
                <a href="/blog" class="linkk-home heading-h4">Blog 📝</a>
            </div>

            <div class="linkk-otr">
                <a href="/project" class="linkk-home heading-h4">Project 👨‍💻</a>
            </div>
            <div class="linkk-otr">
                <a href="/code" class="linkk-home heading-h4">SourceCode 🕵🏻‍♀️</a>
            </div>

            <div class="linkk-otr">
                <a href="/about" class="linkk-home heading-h4">About 🙌🏻</a>
            </div>
        </div>
        @auth
        {{auth()->user()->name}}
        <div class="action">
            <a href="/dashboard" class="btn-primary-1 upload-btn heading-SB mb-4">Profile </a>
            <a href="{{ route('logout.perform') }}" class="btn-primary-1 upload-btn heading-SB mb-4">Logout</a>

        </div>
        @endauth

        @guest
        <div class="action">
            <a href="/login" class="btn-primary-1 upload-btn heading-SB mb-4">Login</a>
            <a href="/register" class="btn-primary-1 upload-btn heading-SB mb-4">Register</a>
        </div>
        @endguest
    </div>
</div>

<!--==================================
        Overlay End Here
===================================-->

<!--==================================
              Navbar Start Here
    ===================================-->

<div class="navbar-main">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="logo-otr">
                <a href="/" class="logo-a">
                    <img src="../../../assets/img/fauzi.png" alt="brand-logo" width="200px">
                </a>
            </div>
            <div class="navigation-otr">
                <ul class="navigation-inr">
                    <li class="navigation-li nav-li1">
                        <a href="/" class="nav-a heading-SB">Home 🏛</a>
                    </li>

                    <li class="navigation-li nav-li2">
                        <a href="/blog" class="nav-a heading-SB">Blog 📝</a>
                    </li>
                    <li class="navigation-li nav-li3">
                        <a href="/project" class="nav-a heading-SB">Project 👨‍💻</a>
                    </li>
                    <li class="navigation-li nav-li4">
                        <a href="/code" class="nav-a heading-SB">SourceCode 🕵🏻‍♀️</a>
                    </li>

                    <li class="navigation-li nav-li5">
                        <a href="/about" class="nav-a heading-SB">About 🙌🏻</a>
                    </li>
                </ul>
            </div>
            <div class="search-main right-space">
                <input type="text" class="input heading-SB" placeholder="Search" />
                <i class="ri-search-line search-icon"></i>
            </div>


            @auth
            {{auth()->user()->name}}

            <div class="action">
                @if ($user->level == 1)
                <a href="/dashboard" class="btn-primary-2">🕵🏻‍♀️</a>&nbsp;
                <a href="{{ route('logout.perform') }}" class="btn-primary-2 heading-SB btn-wallet">Logout</a>
                @else
                <a href="/" class="btn-primary-2">🕵🏻‍♀️</a>&nbsp;
                <a href="{{ route('logout.perform') }}" class="btn-primary-2 heading-SB btn-wallet">Logout</a>
                @endif
            </div>
            @endauth

            @guest
            <div class="action">
                <a href="/login" class="btn-primary-2 heading-SB btn-wallet">Login</a>
            </div>
            @endguest
            <div class="burger-icon-otr">
                <i class="ri-menu-4-line burger-icon"></i>
            </div>
        </div>
    </div>
</div>

<!--==================================
              Navbar End Here
    ===================================-->