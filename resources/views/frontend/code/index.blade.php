@extends('layouts.app')
@section('title')
Source Code
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
            Activity Start Here
    ===================================-->

<div class="activity-main" id="app">
    <div class="container-fluid">
        <div class="wrapper">
            <h2 class="heading heading-h2">Source Code 🤨</h2>
        </div>
        <div class="row row-custom">
            <div class="col-lg-12 col-activity-otr">
                <div class="col-activity-inr">
                    <div class="activity box-1" v-for="sc in code">
                        <a href="/" class="img-otr">
                            <img class="img-art img-fluid" :src="'/files/code/' + sc.image" alt="cover-img">
                        </a>
                        <div class="text-otr">
                            <a class="name heading-MB-Mon">@{{sc.name}}</a><br>
                            <div class="btn-otr">
                                <a :href="'https://' + sc.link_demo" class="btn-primary-2 btn-more heading-SB">Demo</a>
                                <a :href="'https://' + sc.link_download" class="icon-a">
                                    <img class="icon" src="/assets/img/download.png" width="80px">
                                </a>
                            </div>
                            <br>
                            <p class="time heading-S">⌚️ @{{sc.date}}</p>
                        </div>


                    </div>


                    <div class="btn-otr">
                        <a href="" class="btn-primary-2 btn-more heading-SB">Load More</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!--==================================
            Activity End Here
    ===================================-->

<!--==================================
            Footer Start Here
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
            code: JSON.parse(String.raw `{!! json_encode($code) !!}`),
        },
        methods: {

        }
    })
</script>
@endsection