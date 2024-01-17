@extends('layouts.app')
@section('title')
Fauzi Agustian | Project
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
<!--==================================
            inner-header Start Here
    ===================================-->
<div id="app">



    <!--==================================
            inner-header End Here
    ===================================-->

    <!--==================================
                Create Start Here
    ===================================-->

    <div class="create-single-main">
        <div class="container-fluid">
            <div class="multiple-main">
                <div class="wrapper">
                    <h2 class="heading heading-h2">Create Multiple ArtWork</h2>
                </div>
                <div class="row row-custom">
                    <div class="col-lg-9 col-single-otr">
                        <div class="col-single-inr">
                            <h5 class="head heading-h5">Upload Gambar</h5>
                            <div id="uploadArea" class="upload-area">
                                <div class="upload-area__header">
                                    <p class="upload-area__title"></p>
                                    <p class="upload-area__paragraph">
                                        <strong class="upload-area__tooltip">
                                            <span class="upload-area__tooltip-data"></span>
                                        </strong>
                                    </p>
                                </div>
                                <div id="dropZoon" class="upload-area__drop-zoon drop-zoon">
                                    <span class="drop-zoon__icon">
                                        <svg class="upload-icon" width="40" height="40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.438 12.81L20 6.25l6.563 6.56M20 23.75V6.255M33.75 23.75v8.75a1.25 1.25 0 01-1.25 1.25h-25a1.25 1.25 0 01-1.25-1.25v-8.75" stroke="#366CE3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <p class="desc heading-SB">PNG, GIF, WEBP, MP4 or MP3. Max 2 GB.</p>
                                    <p class="drop-zoon__paragraph btn-primary-1 heading-SB">browse</p>
                                    <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span>
                                    <div class="img-main">
                                        <img src="" alt="Preview Image" id="previewImage" class="drop-zoon__preview-image" draggable="false">
                                    </div>
                                    <input type="file" id="fileInput" class="drop-zoon__file-input" accept="image/*">
                                </div>
                                <div id="fileDetails" class="upload-area__file-details file-details">
                                    <h3 class="file-details__title">Uploaded File</h3>
                                    <div id="uploadedFile" class="uploaded-file">
                                        <div class="uploaded-file__icon-container">
                                            <i class='bx bxs-file-blank uploaded-file__icon'></i>
                                            <span class="uploaded-file__icon-text"></span>
                                        </div>
                                        <div id="uploadedFileInfo" class="uploaded-file__info">
                                            <span class="uploaded-file__name">Proejct 1</span>
                                            <span class="uploaded-file__counter">0%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="form-main" method="post">

                                <div class="input-otr">
                                    <input class="input heading-SB" type="text" name="name" placeholder="Project Name" required>
                                </div>



                                <div class="input-otr" v-if="category_id == 2">
                                    <input class="input heading-SB" type="text" name="text" placeholder="Budget" required>
                                </div>
                                <div class="select-main">
                                    <select>
                                        <option class="linkk" value="1">One</option>
                                        <option class="linkk" value="2">Two</option>
                                        <option class="linkk" value="3">Three</option>
                                    </select>
                                </div>


                            </form>

                            <h5 class="heading-choose heading-h5">Kategori Project</h5>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================
                Create End Here
    ===================================-->

@endsection

@section('pagescript')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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