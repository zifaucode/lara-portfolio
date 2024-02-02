@extends('layouts-admin.app')
@section('title')
Project Create
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
                    <h1 class="m-0">Create Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Project</li>
                    </ol>
                </div>
            </div>
        </div>
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
                                    <label for="validationCustom01">Project Name:</label>
                                    <input v-model="name" class="form-control" id="validationCustom01" type="text" placeholder="Project Name" required="">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>



                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Deskripsi</h5>
                                            </div>
                                            <div class="card-body">
                                                <textarea class="form-control" v-model="deskripsi" id="exampleFormControlTextarea4" rows="5" placeholder="Deskripsi" required></textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>

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

                                <div style="text-align: right;">
                                    <button class="btn btn-primary" type="submit">Post</button>

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
            name: '',
            user_id: '',
            status_id: '3',
            category_id: '',
            deskripsi: '',
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
                    deskripsi: this.deskripsi,
                    user_id: this.user_id,
                    status_id: this.status_id,
                    category_id: this.category_id,
                    budged: this.budged,
                    req_time: this.req_time,
                    phone: this.phone,
                    image_name: this.image['name']

                }

                let formData = new FormData();
                for (var key in data) {
                    formData.append(key, data[key]);
                }
                axios.post('/admin/project/', formData)
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Project  berhasil disimpan.',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/admin/project';
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