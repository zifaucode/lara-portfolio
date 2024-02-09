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
</style>



@endsection


@section('content')
<div id="app" v-cloak>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Source Code</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Source Code</li>
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
                    <div class="card-body">
                        <form @submit.prevent="sendData" enctype="multipart/form-data">
                            <div class="col-sm-12">
                                <div class="mb-2">
                                    <label for="validationCustom01">Code Name:</label>
                                    <input v-model="name" class="form-control" id="validationCustom01" type="text" placeholder="Code Name" required="">

                                </div>
                                <br>

                                <div class="mb-2">
                                    <label for="validationCustom01">Author Code:</label>
                                    <input v-model="author_code" class="form-control" id="validationCustom01" type="text" placeholder="ex : JohnDoe" required="">

                                </div>
                                <br>
                                <div class="mb-2">

                                    <label for="validationCustom01">Link Download:</label>
                                    <span class="input-group-text" id="inputGroupPrepend">https://
                                        <input v-model="link_download" class="form-control" id="validationCustom01" type="text" placeholder="github.com/zifaucode" required="">
                                    </span>
                                </div>
                                <br>

                                <div class="mb-2">
                                    <label for="validationCustom01">Link Demo:</label>
                                    <span class="input-group-text" id="inputGroupPrepend">https://
                                        <input v-model="link_demo" class="form-control" id="validationCustom01" type="text" placeholder="demoweb.com" required="">
                                    </span>
                                </div>
                                <br>



                                <br>
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
                                <br>
                                <br>

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
            name: '{{ $code->name }}',
            link_download: '{{ $code->link_download }}',
            link_demo: '{{ $code->link_demo }}',
            image: '',
            author_code: '{{ $code->author_code }}',
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
                    link_download: this.link_download,
                    link_demo: this.link_demo,
                    author_code: this.author_code,
                    image_name: this.image['name']

                }

                let formData = new FormData();
                for (var key in data) {
                    formData.append(key, data[key]);
                }
                axios.post('/admin/code/update/{{ $code->id }}', formData)
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Success',
                            text: 'Edit Source Code Success.',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/admin/code';
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