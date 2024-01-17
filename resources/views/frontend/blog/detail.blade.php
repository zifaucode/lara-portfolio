@extends('layouts.app')
@section('title')
Blog - Zifau detail
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
            Blog Detail Start Here
    ===================================-->
<div id="app" v-cloak>
    <div class="blog-detail-main">
        <div class="container-fluid">

            <div class="row row-custom">
                <div class="col-lg-8 col-detail-otr">
                    <div class="col-detail-inr">
                        <div class="img-otr">
                            <img class="art-img" :src="'/files/blog/' + blog.image" alt="img">
                        </div>
                        <h3 class="head-1 heading-h3">@{{blog.title}}</h3>


                        <p class="desc desc-3 heading-S">
                            @{{blog.content}}
                        </p>

                        <div class="content-otr">
                            <p class="desc-inr heading-S">
                                Untuk Selengkapnya atau iklan
                            </p>
                        </div>
                        <p class="desc desc-7 heading-S">
                            Terimakasih Sudah Membaca Artikel saya, jangan lupa untuk sharenya, Terimakasih. <br>

                        </p>


                    </div>
                </div>
                <div class="col-lg-4 col-sidebar-otr">
                    <div class="col-sidebar-inr">
                        <div class="category-otr">
                            <h4 class="heading heading-h4">Categories</h4>
                            <ul class="caretory-ul">
                                <li class="caretory-li" v-for="cat in category">
                                    <a href="" class="caretory-a">
                                        <p class="name heading-M">@{{cat.name}}</p>

                                    </a>
                                </li>



                                < </ul>
                        </div>
                        <div class="tabs-otr">
                            <h4 class="heading heading-h4">Tags</h4>
                            <ul class="tabs">
                                <li class="tabs-btn btn-1">
                                    <a href="" class="btn-primary-2 button heading-SB">Bitcoin</a>
                                </li>
                                <li class="tabs-btn btn-2">
                                    <a href="" class="btn-primary-2 button heading-SB">NFT</a>
                                </li>
                                <li class="tabs-btn btn-3">
                                    <a href="" class="btn-primary-2 button heading-SB">Arts</a>
                                </li>
                                <li class="tabs-btn btn-4">
                                    <a href="" class="btn-primary-2 button heading-SB">Crypto</a>
                                </li>
                                <li class="tabs-btn btn-5">
                                    <a href="" class="btn-primary-2 button heading-SB">Digital</a>
                                </li>
                                <li class="tabs-btn btn-6">
                                    <a href="" class="btn-primary-2 button heading-SB">Bids</a>
                                </li>
                                <li class="tabs-btn btn-7">
                                    <a href="" class="btn-primary-2 button heading-SB">Marketplace</a>
                                </li>
                                <li class="tabs-btn btn-8">
                                    <a href="" class="btn-primary-2 button heading-SB">Token</a>
                                </li>
                            </ul>
                        </div>
                        <div class="share-otr">
                            <h4 class="heading heading-h4">Share</h4>
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
                                        <img class="icon" src="../../../assets/img/social-icon4.svg" alt="icon">
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
            Blog Detail End Here
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
            blog: JSON.parse(String.raw `{!! json_encode($blog) !!}`),
            category: JSON.parse(String.raw `{!! json_encode($category) !!}`),
        },
        methods: {

        }
    })
</script>
@endsection