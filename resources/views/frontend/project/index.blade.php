@extends('layouts.app')
@section('title')
Fauzi Agustian | Project
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
<div id="app">

    <div class="inner-header-main">
        <div class="container-fluid">
            <div class="wrapper">
                <h2 class="heading heading-h2">List Project</h2>
                <div class="linkk-otr">
                    <a href="/" class="home-link linkk-page heading-S">Home</a>
                    <p class="link-slash heading-S">/</p>
                    <a href="/project" class="inner-page-link linkk-page heading-S">List Project</a>
                </div>
            </div>
        </div>
    </div>

    <!--==================================
            inner-header End Here
    ===================================-->

    <!--==================================
        Explore Artwork Start Here
    ===================================-->

    <div class="explore-main">
        <div class="container-fluid">
            <div class="wrapper">
                <div class="teb-main">
                    <div class="tab-otr">
                        <h2 class="heading heading-h2">List Project</h2>
                        <br>


                    </div>

                </div>
            </div>
            <div class="row-custom-main">
                <div id="tab-21" class="tab-content active">
                    <div class="row row-custom-inr">
                        <div class="col-lg-3 col-otr" v-for="pj in project">
                            <div class="col-inr box-1">

                                <div class="cover-img-otr">
                                    <a href="./Single-Artwork.html">
                                        <img class="cover-img" :src="'/files/project/' + pj.image" alt="Artwork" />
                                    </a>
                                    <span class="heart-icon-otr2 heart1">
                                        <i class="ri-heart-line heart-icon2 heart-1"></i>
                                    </span>
                                </div>
                                <a href="./Single-Artwork.html" class="art-name heading-MB-Mon">@{{ pj.name }}</a>
                                <div class="bid-main">
                                    <p class="bid heading-S">Laravel, VueJs</p>
                                    <p class="Price heading-SB">@{{ dateOnly(pj.created_at) }}</p>
                                </div>

                            </div>
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
        Explore Artwork End Here
    ===================================-->

@endsection

@section('pagescript')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://momentjs.com/downloads/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>

<script>
    const project = <?php echo Illuminate\Support\Js::from($project) ?>;
    let app = new Vue({
        el: '#app',
        data: {
            project,
            loading: false,
        },
        methods: {
            dateOnly(value) {
                return moment(value).format("DD-MM-YYYY");
            },
        },
        filters: {

            liveSubstr: function(string) {
                return string.substring(0, 70) + '...';
            }

        }
    })
</script>
@endsection