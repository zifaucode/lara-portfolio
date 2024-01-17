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

    <div class="inner-header-main">
        <div class="container-fluid">
            <div class="wrapper">
                <h2 class="heading heading-h2">Explore Project</h2>
                <div class="linkk-otr">
                    <a href="/" class="home-link linkk-page heading-S">Home</a>
                    <p class="link-slash heading-S">/</p>
                    <a href="/project" class="inner-page-link linkk-page heading-S">Explore Project</a>
                </div>
            </div>
        </div>
    </div>

    <!--==================================
            inner-header End Here
    ===================================-->

    <!--==================================
        Explore Artwork Start Here
    ===================================-->

    <div class="explore-main">
        <div class="container-fluid">
            <div class="wrapper">
                <div class="teb-main">
                    <div class="tab-otr">
                        <h2 class="heading heading-h2">project by request</h2>
                        <br>


                    </div>
                    <div>
                        @auth
                        <button type="button" class="btn-primary-1 left-btn heading-SB" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                            Request Project
                        </button>
                        @endauth

                        @guest
                        <button type="button" class="btn-primary-1 left-btn heading-SB" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Request Project
                        </button>
                        @endguest


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content bg-dark">

                                    <div class="modal-body text-white">
                                        Anda Harus Login Terlebih Dahulu


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a href="/login"><button type="button" class="btn btn-primary">Login</button></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <form @submit.prevent="sendData" enctype="multipart/form-data">

                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content bg-dark text-white">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Request Projoect</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Upload Image</label>

                                                <input class="form-control" type="file" id="formFile" ref="image" accept=".jpeg, .png, .jpg" v-on:change="handleFotoUpload">
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Project Name</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" v-model="name" placeholder="Project Name">
                                            </div>

                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" v-model="category_id" value="1" id="btnradio1" autocomplete="off" checked>
                                                <label class="btn btn-outline-primary" for="btnradio1"> Free</label>

                                                <input type="radio" class="btn-check" v-model="category_id" value="2" id="btnradio2" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btnradio2">Berbayar</label>
                                            </div>

                                            <div class="mb-4" v-if="category_id == 2">
                                                <label for="exampleFormControlInput1" class="form-label">Budget</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" v-model="budged" placeholder=" Budget Project">
                                            </div>


                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group" v-if="category_id == 2">
                                                <label for="exampleFormControlInput1" class="form-label">Waktu Pengerjaan &nbsp; :</label>&nbsp;&nbsp;
                                                <br>

                                                <input type="radio" class="btn-check" v-model="req_time" value="7 hari" id="btnradio3" autocomplete="off" checked>
                                                <label class="btn btn-outline-primary" for="btnradio3">7 hari</label>

                                                <input type="radio" class="btn-check" v-model="req_time" value="14 hari" id="btnradio4" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btnradio4">14 hari</label>

                                                <input type="radio" class="btn-check" v-model="req_time" value="30 hari" id="btnradio5" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btnradio5">30 hari</label>

                                                <input type="radio" class="btn-check" v-model="req_time" value="60 hari" id="btnradio6" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btnradio6">60 hari</label>
                                            </div>

                                            <div class="mb-4">
                                                <label for="exampleFormControlInput1" class="form-label">No.Hp / Whatsapp:</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" v-model="phone" placeholder=" No.Hp / Whatsapp:">
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                                <textarea class="form-control" v-model="deskripsi" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="row-custom-main">
                <div id="tab-21" class="tab-content active">
                    <div class="row row-custom-inr">
                        <div class="col-lg-3 col-otr" v-for="pj in project" v-if="pj.status.id == 1 || pj.status.id == 2">
                            <div class="col-inr box-1">

                                <div class="cover-img-otr">
                                    <a href="./Single-Artwork.html">
                                        <img class="cover-img" :src="'/files/project/' + pj.image" alt="Artwork" />
                                    </a>
                                    <span class="heart-icon-otr2 heart1">
                                        <i class="ri-heart-line heart-icon2 heart-1"></i>
                                    </span>
                                </div>
                                <a href="./Single-Artwork.html" class="art-name heading-MB-Mon">@{{ pj.name }}</a>
                                <div class="bid-main">
                                    <p class="bid heading-S">Laravel, VueJs</p>
                                    <p v-if="pj.category_id == 1" class="Price heading-SB">FREE</p>
                                    <p v-if="pj.category_id == 2" class="Price heading-SB">BERBAYAR</p>
                                </div>
                            </div>
                        </div>







                    </div>
                </div>



                <div class="col-lg-12 col-btn-otr">
                    <div class="col-btn-inr">
                        <a href="" class="btn-primary-2 btn-more heading-SB">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================
        Explore Artwork End Here
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
            project: JSON.parse(String.raw `{!! json_encode($project) !!}`),
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
                axios.post('/project', formData)
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Project  berhasil disimpan.',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/project';
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

        },
        filters: {

            liveSubstr: function(string) {
                return string.substring(0, 70) + '...';
            }

        }
    })
</script>
@endsection