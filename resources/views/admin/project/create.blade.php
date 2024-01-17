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
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Create Project</h5>
                </div>
                <div class="card-body add-post">
                    <form @submit.prevent="sendData" enctype="multipart/form-data">
                        <div class="col-sm-12">
                            <div class="mb-2">
                                <label for="validationCustom01">Project Name:</label>
                                <input v-model="name" class="form-control" id="validationCustom01" type="text" placeholder="Project Name" required="">
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <br>

                            <div class="col-sm-12">
                                <label class="form-label" for="validationCustom04">Category</label>
                                <select class="form-select" id="validationCustom04" required="" v-model="category_id">
                                    <option value="1">FREE</option>
                                    <option value="2">BERBAYAR</option>
                                </select>
                                <div class="invalid-feedback">Please select a valid Category.</div>
                            </div>
                            <br>
                            <div class="mb-2" v-if="category_id == 2">
                                <label for="validationCustom01">Budged Project:</label>
                                <input v-model="budged" class="form-control" id="validationCustom01" type="text" placeholder="Budget Project" required="">

                            </div>

                            <br>
                            <div class="col-sm-12" v-if="category_id == 2">
                                <label class="form-label" for="validationCustom04">Request Pengerjaan</label>
                                <select class="form-select" id="validationCustom04" required="" v-model="req_time">
                                    <option value="7 hari">7 hari</option>
                                    <option value="14 hari">14 hari</option>
                                    <option value="1 Bulan">1 Bulan</option>
                                    <option value="> 1 Bulan"> > 1 Bulan</option>
                                </select>

                            </div>
                            <br>
                            <div class="mb-2">
                                <label for="validationCustom01">No.Hp / Whatsapp:</label>
                                <input v-model="phone" class="form-control" id="validationCustom01" type="text" placeholder="" required="">

                            </div>
                            <br>
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
            user_id: '',
            status_id: '3',
            category_id: '',
            deskripsi: '',
            image: '',
            budged: '',
            req_time: '',
            phone: '',
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