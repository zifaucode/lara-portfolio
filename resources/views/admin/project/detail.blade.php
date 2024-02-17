@extends('layouts-admin.app')
@section('title')
Project Detail
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
                    <h1 class="m-0">Detail Project</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Project</li>
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
                                <div class="mb-4">
                                    <label>Project Name:</label>
                                    <p>@{{ project.name }}</p>

                                </div>

                                <div class="mb-4">
                                    <label>Link Project :</label>
                                    <p>@{{ project.link }}</p>


                                </div>

                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <label>Description:</label>
                                        <p>@{{ project.deskripsi }}</p>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-primary">
                                            <img :src="'/files/project/' + project.image" width="400px">
                                        </div>
                                    </div>
                                </div>


                                <div style="text-align: right;">
                                    <a href="/admin/project" class="btn btn-secondary">Kembali</a>

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
    const project = <?php echo Illuminate\Support\Js::from($project) ?>;
    let app = new Vue({
        el: '#app',
        data: {
            project,
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
                    link: this.link,
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