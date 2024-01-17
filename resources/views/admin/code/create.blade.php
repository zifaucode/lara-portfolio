@extends('layouts-admin.app')
@section('title')
Code Create
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
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Create SourceCode</h5>
                </div>
                <div class="card-body add-post">
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
                                            <input type="file" ref="image" class="custom-file-input" accept=".jpeg, .png, .jpg" v-on:change="handleFotoUpload">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>

                            <div class="btn-showcase text-end">
                                <button class="btn btn-primary" type="submit">Post</button>

                            </div>
                        </div>
                    </form>

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
            name: '',
            link_download: '',
            link_demo: '',
            image: '',
            author_code: '',
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
                axios.post('/admin/code', formData)
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'SourceCode  berhasil disimpan.',
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