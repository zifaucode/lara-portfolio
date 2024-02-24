@extends('layouts-admin.app')
@section('title')
Edit Web Front
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
                    <h1 class="m-0">Edit Web Front</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Web Front</li>
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
                                    <label for="validationCustom01">Web Title:</label>
                                    <input v-model="web_title" class="form-control" type="text" placeholder="Web Title">

                                </div>

                                <div class="mb-4">
                                    <label for="validationCustom01">Web Name:</label>
                                    <input v-model="web_name" class="form-control" type="text" placeholder="Web Name">

                                </div>

                                <div class="mb-4">

                                    <label for="validationCustom01">Web Desk:</label>
                                    <textarea class="form-control" cols="20" rows="3" v-model="web_desk"></textarea>
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
            web_logo: `{{ $setting->web_logo ?? '' }}`,
            web_icon: `{{ $setting->web_icon ?? '' }}`,
            web_name: `{{ $setting->web_name ?? '' }}`,
            web_desk: `{{ $setting->web_desk ?? '' }}`,
            web_title: `{{ $setting->web_title ?? '' }}`,
            web_meta: `{{ $setting->web_meta ?? '' }}`,
            web_front_image: `{{ $setting->web_front_image ?? '' }}`,
            web_footer: `{{ $setting->web_footer ?? '' }}`,
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
                    web_name: this.web_name,
                    web_logo: this.web_logo,
                    web_icon: this.web_icon,
                    web_desk: this.web_desk,
                    web_title: this.web_title,
                    web_meta: this.web_meta,
                    web_front_image: this.web_front_image,
                    web_footer: this.web_footer,
                    image_name: this.image['name']

                }

                let formData = new FormData();
                for (var key in data) {
                    formData.append(key, data[key]);
                }
                axios.post('/admin/setting/update-web-setting', formData)
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Success',
                            text: 'Edit Success.',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/admin/setting';
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