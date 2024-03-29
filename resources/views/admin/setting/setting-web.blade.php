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

                                <div class="mb-4">
                                    <label for="validationCustom01">Web Meta:</label>
                                    <textarea class="form-control" cols="20" rows="3" v-model="web_meta"></textarea>
                                </div>


                                <div class="mb-4">
                                    <label for="validationCustom01">Web Footer:</label>
                                    <input v-model="web_footer" class="form-control" type="text" placeholder="Web Footer">

                                </div>


                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="alert alert-primary">
                                            <div class="d-flex flex-column">
                                                <small> Logo (.jpeg/png/jpg)</small>
                                                <br>
                                                <input type="file" ref="web_logo" class="form-control" accept=".jpeg, .png, .jpg" v-on:change="handleLogoUpload">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="alert alert-primary">
                                            <div class="d-flex flex-column">
                                                <small> Icon (.jpeg/png/jpg)</small>
                                                <br>
                                                <input type="file" ref="web_icon" class="form-control" accept=".jpeg, .png, .jpg" v-on:change="handleIconUpload">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="alert alert-primary">
                                            <div class="d-flex flex-column">
                                                <small> Front Image (.jpeg/png/jpg)</small>
                                                <br>
                                                <input type="file" ref="web_front_image" class="form-control" accept=".jpeg, .png, .jpg" v-on:change="handleFrontImageUpload">
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
            web_logo: '',
            web_icon: '',
            web_front_image: '',
            web_name: `{{ $setting->web_name ?? '' }}`,
            web_desk: `{{ $setting->web_desk ?? '' }}`,
            web_title: `{{ $setting->web_title ?? '' }}`,
            web_meta: `{{ $setting->web_meta ?? '' }}`,
            web_footer: `{{ $setting->web_footer ?? '' }}`,
            image: '',
            loading: false,

        },
        methods: {
            handleLogoUpload: function() {
                this.web_logo = this.$refs.web_logo.files[0];
                console.log(this.web_logo['name']);
            },
            handleIconUpload: function() {
                this.web_icon = this.$refs.web_icon.files[0];
                console.log(this.web_icon['name']);
            },
            handleFrontImageUpload: function() {
                this.web_front_image = this.$refs.web_front_image.files[0];
                console.log(this.web_front_image['name']);
            },
            sendData: function() {
                let vm = this;

                let data = {
                    web_logo: vm.web_logo,
                    web_icon: vm.web_icon,
                    web_front_image: vm.web_front_image,

                    web_name: this.web_name,
                    web_desk: this.web_desk,
                    web_title: this.web_title,
                    web_meta: this.web_meta,
                    web_footer: this.web_footer,

                    logo_name: this.web_logo['name'],
                    icon_name: this.web_icon['name'],
                    front_image_name: this.web_front_image['name'],

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