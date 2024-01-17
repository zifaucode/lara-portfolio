@extends('layouts.app')
@section('title')
Fauzi Agustian
@endsection


@section('head')
<style>
    [v-cloak]>* {
        display: none;
    }

    [v-cloak]::before {
        content: "loading...";
    }

    table tr td {
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>


@endsection

@section('content')



<!--==================================
            inner-header Start Here
    ===================================-->

<div class="inner-header-main">
    <div class="container-fluid">
        <div class="wrapper">
            <h2 class="heading heading-h2">About</h2>
            <div class="linkk-otr">
                <a href="/" class="home-link linkk-page heading-S">Home</a>
                <p class="link-slash heading-S">/</p>
                <a href="/about" class="inner-page-link linkk-page heading-S">About</a>
            </div>
        </div>
    </div>
</div>

<!--==================================
            inner-header End Here
    ===================================-->

<!--==================================
            About Start Here
    ===================================-->
<div id="app" v-cloak>
    <div class="blog-detail-main">
        <div class="container-fluid">

            <div class="row row-custom">
                <div class="col-lg-8 col-detail-otr">
                    <div class="col-detail-inr">
                        <div class="img-otr">

                        </div>
                        <h3 class="head-1 heading-h3">@{{about.email}}</h3>


                        <p class="desc desc-3 heading-S">
                            @{{about.role}}
                        </p>

                        <div class="content-otr">
                            <p class="desc-inr heading-S">
                                Untuk Selengkapnya atau iklan
                            </p>
                        </div>



                    </div>
                </div>
                <div class="col-lg-4 col-sidebar-otr">
                    <div class="col-sidebar-inr">
                        <div class="category-otr">
                            <h4 class="heading heading-h4">FOTO</h4>
                            <ul class="caretory-ul">
                                <li class="caretory-li" v-for="cat in category">
                                    <a href="" class="caretory-a">
                                        <p class="name heading-M"></p>

                                    </a>
                                </li>



                            </ul>
                        </div>
                        <div class="tabs-otr">
                            <h4 class="heading heading-h4">Skill</h4>
                            <ul class="tabs">
                                <li class="tabs-btn btn-1">
                                    <a href="" class="btn-primary-2 button heading-SB">Laravel</a>
                                </li>

                            </ul>
                        </div>
                        <div class="share-otr">

                            <ul class="icon-ul">
                                <li class="icon-li">
                                    <a href="" class="icon-a">
                                        <img class="icon" src="../../../assets/img/social-icon1.svg" alt="icon">
                                    </a>
                                </li>
                                <li class="icon-li">
                                    <a href="" class="icon-a">
                                        <img class="icon" src="../../../assets/img/social-icon2.svg" alt="icon">
                                    </a>
                                </li>
                                <li class="icon-li">
                                    <a href="" class="icon-a">
                                        <img class="icon" src="../../../assets/img/social-icon3.svg" alt="icon">
                                    </a>
                                </li>

                                <li class="icon-li">
                                    <a href="" class="icon-a">
                                        <img class="icon" src="../../../assets/img/social-icon5.svg" alt="icon">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<!--==================================
            About End Here
    ===================================-->

@endsection

@section('pagescript')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let app = new Vue({
        el: '#app',
        data: {
            about: JSON.parse(String.raw `{!! json_encode($about) !!}`),
        },
        methods: {

        }
    })
</script>
@endsection
