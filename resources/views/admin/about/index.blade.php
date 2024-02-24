@extends('layouts-admin.app')
@section('title')
About Me
@endsection


@section('head')
<style>
    /* / */
</style>


@endsection

@section('content')

<div id="app" v-cloak>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">About Me</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">About Me</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-info">
                <p>Edit your profil &nbsp;
                    <a href="/admin/about/edit" class="btn btn-sm btn-primary">
                        Click For Edit &nbsp;
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                        </svg>
                    </a>
                </p>
            </div>
            <div class="row">

                <div class="col-md-3">

                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <template v-if="image !=''">
                                    <img class="profile-user-img img-fluid img-circle" :src="`/files/about/` + image">
                                </template>

                                <template v-else>
                                    <img class="profile-user-img img-fluid img-circle" src="/files/about/avatar.png">
                                </template>

                            </div>

                            <h3 class="profile-username text-center">@{{ name }}</h3>

                            <p class="text-muted text-center">@{{ role }}</p>


                        </div>
                    </div>


                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                                @{{ last_education }}
                            </p>
                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                                @{{ skill }}
                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Hobby</strong>

                            <p class="text-muted">@{{ hobby }}</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="post">
                                <div class="user-block">
                                    <h5><b>description</b> </h5>
                                </div>
                                <p>@{{ description }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="post">
                                <div class="user-block">
                                    <h5><b>work experience</b> </h5>
                                </div>
                                <p>@{{ work_experience }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="post">
                                <div class="user-block">
                                    <h5><b>Social</b> </h5>
                                </div>
                                <p>Github: <a :href="github" target="_blank"> @{{ github }}</a></p>
                                <p>Gitlab: <a :href="gitlab" target="_blank">@{{ gitlab }}</a></p>
                                <p>facebook: <a :href="facebook" target="_blank">@{{ facebook }}</a></p>
                                <p>instagram: <a :href="instagram" target="_blank"> @{{ instagram }} </a></p>
                                <p>twitter: <a :href="twitter" target="_blank"> @{{ twitter }} </a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection

@section('pagescript')

@section('pagescript')
<script>
    let app = new Vue({
        el: '#app',
        data: {
            name: `{{ $about->name ?? '' }}`,
            email: `{{ $about->email ?? '' }}`,
            role: `{{ $about->role ?? '' }}`,
            description: `{{ $about->description ?? '' }}`,
            hobby: `{{ $about->hobby ?? '' }}`,
            github: `{{ $about->github ?? '' }}`,
            gitlab: `{{ $about->gitlab ?? '' }}`,
            instagram: `{{ $about->instagram ?? '' }}`,
            facebook: `{{ $about->facebook ?? '' }}`,
            twitter: `{{ $about->twitter ?? '' }}`,
            last_education: `{{ $about->last_education ?? '' }}`,
            skill: `{{ $about->skill ?? '' }}`,
            work_experience: `{{ $about->work_experience ?? '' }}`,
            image: `{{ $about->image ?? '' }}`,
        },
        methods: {

        }
    })
</script>
@endsection