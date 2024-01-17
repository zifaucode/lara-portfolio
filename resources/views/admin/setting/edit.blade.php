@extends('layouts-admin.app')
@section('title')
Edit Website
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
                    <h5>Edit Website</h5>
                </div>
                <div class="card-body add-post">
                    <form @submit.prevent="sendData" enctype="multipart/form-data">
                        <div class="col-sm-12">
                            <div class="mb-2">
                                <label for="validationCustom01">Web Name:</label>
                                <input v-model="web_name" class="form-control" id="validationCustom01" type="text" placeholder="Code Name" required="">

                            </div>
                            <br>

                            <div class="mb-2">
                                <label for="validationCustom01">Web Deskription:</label>
                                <input v-model="web_desk" class="form-control" id="validationCustom01" type="text" placeholder="ex : JohnDoe" required="">

                            </div>
                            <br>

                            <div class="mb-2">
                                <label for="validationCustom01">Web Tilte:</label>
                                <input v-model="web_title" class="form-control" id="validationCustom01" type="text" placeholder="ex : JohnDoe" required="">

                            </div>
                            <br>

                            <div class="mb-2">
                                <label for="validationCustom01">Web Meta:</label>
                                <input v-model="web_meta" class="form-control" id="validationCustom01" type="text" placeholder="ex : JohnDoe" required="">

                            </div>
                            <br>


                            <div class="mb-2">
                                <label for="validationCustom01">Web Footer:</label>
                                <input v-model="web_footer" class="form-control" id="validationCustom01" type="text" placeholder="ex : JohnDoe" required="">

                            </div>
                            <br>

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
            web_name: '{!! $setting->web_name !!}',
            web_title: '{!! $setting->web_title !!}',
            web_desk: '{!! $setting->web_desk !!}',
            web_meta: '{!! $setting->web_meta !!}',
            web_footer: '{!! $setting->web_footer !!}',
            web_icon: '',
            web_logo: '',
            web_front_image: '',
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