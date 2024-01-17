@extends('layouts.app')
@section('title')
Blog - Zifau
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
<div id="app" v-cloak>

    <div class="inner-header-main">
        <div class="container-fluid">
            <div class="wrapper">
                <h2 class="heading heading-h2">Blog</h2>
                <div class="linkk-otr">
                    <a href="/" class="home-link linkk-page heading-S">Home</a>
                    <p class="link-slash heading-S">/</p>
                    <a href="/blog" class="inner-page-link linkk-page heading-S">Blog</a>
                </div>
            </div>
        </div>
    </div>

    <!--==================================
            inner-header End Here
    ===================================-->



    <!--==================================
                Blog Start Here
    ===================================-->

    <div class="blog-main-inr">
        <div class="container-fluid">
            <div class="row row-custom">
                <div class="col-lg-4 col-md-6 col-otr mb-4" v-for="bl in blog">
                    <div class="col-inr box-1">
                        <a :href="'/blog/detail/' + bl.id" class="img-otr">
                            <img class="blog-img" :src="'/files/blog/' + bl.image" height="240px" alt="blog" />
                        </a>
                        <div class="content-otr">
                            <p class="date-otr heading-S">• by @{{ bl.users.username }} <span class="date-inr"> • @{{ bl.date }}</span></p>
                            <a :href="'/blog/detail/' + bl.id" class="heading heading-h5">@{{bl.title}}</a>
                            <p class="desc heading-S">
                                @{{ bl.content | liveSubstr}} <a :href="'/blog/detail/' + bl.id" class="date-otr heading-S">Selengkapnya --></a>
                            </p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-12 col-btn-otr">
                    <div class="col-btn-inr">
                        <a href="" class="btn-primary-2 btn-more heading-SB">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================
                Blog End Here
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
        },
        methods: {

        },
        filters: {

            liveSubstr: function(string) {
                return string.substring(0, 70) + '...';
            }

        }
    })
</script>
@endsection