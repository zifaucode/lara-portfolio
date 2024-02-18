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
            <div class="row">
                <div class="col-md-3">

                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">Nama</h3>

                            <p class="text-muted text-center">Software Engineer</p>


                        </div>
                    </div>


                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                                B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>
                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                                <span class="tag tag-danger">UI Design</span>
                                <span class="tag tag-success">Coding</span>
                                <span class="tag tag-info">Javascript</span>
                                <span class="tag tag-warning">PHP</span>
                                <span class="tag tag-primary">Node.js</span>
                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Hobby</strong>

                            <p class="text-muted">Lorem ipsum dolor sit amet.</p>
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
                                <p>bla bla bla bla</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="post">
                                <div class="user-block">
                                    <h5><b>work experience</b> </h5>
                                </div>
                                <p>bla bla bla bla</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="post">
                                <div class="user-block">
                                    <h5><b>Social Media</b> </h5>
                                </div>
                                <p>bla bla bla bla</p>
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

        },
        methods: {

        }
    })
</script>
@endsection