@extends('layouts-admin.app')
@section('title')
Edit
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

    .scroll {
        max-height: 650px;
        overflow-y: auto;
    }
</style>





@endsection


@section('content')
<div id="app" v-cloak>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Source Code</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Source Code</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="col-lg-12">

                <div class="card card-primary card-outline">
                    <div class="card-header">

                    </div>
                    <div class="card-body scroll">
                        <form @submit.prevent="sendData" enctype="multipart/form-data">
                            <div class="col-sm-12">
                                <div class="mb-4">
                                    <label for="validationCustom01">Name:</label>
                                    <input v-model="name" class="form-control" type="text" placeholder="Name">

                                </div>

                                <div class="mb-4">
                                    <label for="validationCustom01">Email:</label>
                                    <input v-model="email" class="form-control" type="email" placeholder="Email">

                                </div>


                                <div class="mb-4">
                                    <label for="validationCustom01">Role:</label>
                                    <input v-model="role" class="form-control" type="text" placeholder="ex : Web Developer">

                                </div>

                                <div class="mb-4">
                                    <label for="validationCustom01">last Education:</label>
                                    <input v-model="last_education" class="form-control" type="text" placeholder="ex :S1 Ilkom Universitas Indonesia">

                                </div>

                                <div class="mb-4">
                                    <label for="validationCustom01">Skills:</label>
                                    <input v-model="skill" class="form-control" type="text" placeholder="ex :Html, css , Laravel, vue JS">

                                </div>

                                <div class="mb-4">

                                    <label for="validationCustom01">Work Experience:</label>
                                    <textarea class="form-control" cols="20" rows="3" v-model="work_experience"></textarea>
                                </div>

                                <div class="mb-4">

                                    <label for="validationCustom01">Hobby:</label>
                                    <textarea class="form-control" cols="20" rows="3" v-model="hobby"></textarea>
                                </div>

                                <div class="mb-4">

                                    <label for="validationCustom01">Description:</label>
                                    <textarea class="form-control" cols="20" rows="3" v-model="description"></textarea>
                                </div>


                                <div class="mb-4">
                                    <label for="validationCustom01">Gitlab:</label>
                                    <span class="input-group-text">https://
                                        <input v-model="gitlab" class="form-control" type="text" placeholder="gitlab.com">
                                    </span>
                                </div>

                                <div class="mb-4">
                                    <label for="validationCustom01">Github:</label>
                                    <span class="input-group-text">https://
                                        <input v-model="github" class="form-control" type="text" placeholder="github.com">
                                    </span>
                                </div>

                                <div class="mb-4">
                                    <label for="validationCustom01">Instagram:</label>
                                    <span class="input-group-text">https://
                                        <input v-model="instagram" class="form-control" type="text" placeholder="instagram.com">
                                    </span>
                                </div>

                                <div class="mb-4">
                                    <label for="validationCustom01">Facebook:</label>
                                    <span class="input-group-text">https://
                                        <input v-model="facebook" class="form-control" type="text" placeholder="facebook.com">
                                    </span>
                                </div>

                                <div class="mb-4">
                                    <label for="validationCustom01">Twitter:</label>
                                    <span class="input-group-text">https://
                                        <input v-model="twitter" class="form-control" type="text" placeholder="twitter.com">
                                    </span>
                                </div>


                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-primary">
                                            <div class="d-flex flex-column">
                                                <small> File Gambar (.jpeg/png/jpg)</small>
                                                <br>
                                                <input type="file" ref="image" class="form-control" accept=".jpeg, .png, .jpg" v-on:change="handleFotoUpload">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div style="text-align: right;">
                                    <button class="btn btn-primary" type="submit">Save</button>

                                </div>
                            </div>
                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>




@endsection

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
            work_experience: `{{ $about->work_experience ?? '' }}`,
            skill: `{{ $about->skill ?? '' }}`,
            image: '',
            loading: false,
        },
        methods: {
            handleFotoUpload: function() {
                this.image = this.$refs.image.files[0];
                console.log(this.image['name']);
            },
            sendData: function() {
                let vm = this;

                let data = {
                    image: vm.image,
                    name: this.name,
                    email: this.email,
                    role: this.role,
                    description: this.description,
                    hobby: this.hobby,
                    github: this.github,
                    gitlab: this.gitlab,
                    instagram: this.instagram,
                    facebook: this.facebook,
                    twitter: this.twitter,
                    last_education: this.last_education,
                    skill: this.skill,
                    work_experience: this.work_experience,
                    image_name: this.image['name']

                }

                let formData = new FormData();
                for (var key in data) {
                    formData.append(key, data[key]);
                }
                axios.post('/admin/about', formData)
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Success',
                            text: 'Edit Success.',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/admin/about';
                            }
                        })
                        // console.log(response);
                    })
                    .catch(err => {
                        console.log('error', err.response.data)
                        Swal.fire({
                            title: 'Error',
                            text: `${err.response.data.errors['image']}`,
                            icon: 'error',
                        })
                    })
            },

        }
    })
</script>
@endsection