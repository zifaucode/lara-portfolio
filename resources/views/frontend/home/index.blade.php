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
              Hero Start Here
    ===================================-->
<div id="app" v-cloak>
    <div class="hero-main">
        <div class="container-fluid" style="min-height: 100vh;">
            <div class="row row-custom">
                <div class="col-lg-6 col-content-otr">
                    <div class="col-content-inr">
                        <h1 class="heading-h1 heading">
                            Fauzi
                            <span class="text-color"> Agustian </span>
                        </h1>
                        <p class="desc heading-L">Cuma website Biasa</p>

                        <div class="action">
                            <a href="/blog" class="btn-primary-1 left-btn heading-SB">Blog</a>
                            <a href="/project" class="btn-primary-2 heading-SB">Project</a>
                        </div>
                        <div class="staticstics">

                            <div class="staticstics-box text-center">
                                <a href="/code">
                                    <img class="hero-img img-fluid" src="assets/img/code.png" alt="hero-img" width="100px" />
                                    <p class="heading-MB static-desc">
                                        Source Code 🤫
                                    </p>
                                </a>
                            </div>

                            <div class="staticstics-box text-center">
                                <a href="https://trakteer.id/zifau" target="_blank">
                                    <img class="hero-img img-fluid" src="assets/img/kopi.png" alt="hero-img" width="100px" />
                                    <p class="heading-MB static-desc">
                                        Traktir Kopi 😆
                                    </p>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-img-otr">
                    <div class="col-img-inr">
                        <div class="img-otr">
                            <a href="">
                                <img class="hero-img img-fluid" src="assets/img/bunga.png" alt="hero-img">
                            </a>



                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==================================
              Hero End Here
    ===================================-->

    <!--==================================
        Feature Artwork Start Here
    ===================================-->

    <div class="feature-main">
        <div class="container-fluid">
            <div class="wrapper">
                <h2 class="heading heading-h2">Project by Request</h2>
                <a href="/project" class="view-all">
                    <p class="view heading-SB">View All Project</p>
                    <i class="ri-arrow-right-line arrow-right"></i>
                </a>
            </div>
            <div class="row row-custom">
                <div class="col-lg-3 col-otr " v-for="pj in project">
                    <div class="col-inr box-1">
                        <div class="cover-img-otr">
                            <a href="">
                                <template v-if="pj.image !=''">
                                    <img class="cover-img" :src="'/files/project/' + pj.image" alt="Artwork" />
                                </template>

                                <template v-else>
                                    <img class="cover-img" src="/files/project/default-project.png" alt="Artwork" />
                                </template>


                            </a>
                            <div class="time-otr">
                                <span class="heading-SB timer" style="color:black;">Post: Admin</span>
                            </div>
                            <span class="heart-icon-otr2 heart1">
                                <i class="ri-heart-line heart-icon2 heart-1"></i>
                            </span>
                        </div>
                        <a href="" class="art-name heading-MB-Mon">@{{ pj.name ?? ''}}</a>
                        <div class="bid-main">
                            <p class="bid heading-S">Laravel, VueJs</p>
                            <p class="Price heading-SB">@{{ dateOnly(pj.created_at) }}</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="responsive">
                <a href="/project" class="view-all">
                    <p class="view heading-SB">View All Artwork</p>
                    <i class="ri-arrow-right-line arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!--==================================
        Feature Artwork End Here
    ===================================-->

    <!--==================================
                Blog Start Here
    ===================================-->

    <div class="blog-main">
        <div class="container-fluid">
            <div class="wrapper">
                <h2 class="heading heading-h2">Blog</h2>
                <a href="/blog" class="view-all">
                    <p class="view heading-SB">View All Blog</p>
                    <i class="ri-arrow-right-line arrow-right"></i>
                </a>
            </div>
            <div class="row row-custom">
                <div class="col-lg-4 col-md-6 col-otr mb-4" v-for="bl in blog">
                    <div class="col-inr box-1">
                        <a :href="'/blog/detail/' + bl.id" class="img-otr">
                            <template v-if="bl.image !=''">
                                <img class="blog-img" :src="'/files/blog/' + bl.image" height="240px" alt="blog" />
                            </template>

                            <template v-else>
                                <img class="blog-img" src="/files/blog/default-blog.png" height="240px" alt="blog" />
                            </template>

                        </a>
                        <div class="content-otr">
                            <p class="date-otr heading-S">• @{{ bl.categories.name ?? ''}} <span class="date-inr"> • @{{ dateOnly(bl.date) }}</span></p>
                            <a :href="'/blog/detail/' + bl.id" class="heading heading-h5">@{{bl.title}}</a>
                            <p v-html="$options.filters.liveSubstr(bl.content, 100)" class="desc heading-S">

                                <a :href="'/blog/detail/' + bl.id" class="date-otr heading-S">Selengkapnya --></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="responsive">
                <a href="/blog" class="view-all">
                    <p class="view heading-SB">View All Blog</p>
                    <i class="ri-arrow-right-line arrow-right"></i>
                </a>
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
<script src="https://momentjs.com/downloads/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>

<script>
    Vue.filter('liveSubstr', function(value, length) {
        const strippedText = value.replace(/<[^>]+>/g, ''); // Remove HTML tags
        const truncated = strippedText.substring(0, length);
        const ellipsis = strippedText.length > length ? '...' : '';
        return `${value.substring(0, value.indexOf(truncated) + truncated.length)}${ellipsis}`;
    });

    const blog = <?php echo Illuminate\Support\Js::from($blog) ?>;
    const project = <?php echo Illuminate\Support\Js::from($project) ?>;
    let app = new Vue({
        el: '#app',
        data: {
            blog,
            project,
        },
        methods: {
            dateOnly(value) {
                return moment(value).format("DD-MM-YYYY");
            },

        },
    })
</script>
@endsection