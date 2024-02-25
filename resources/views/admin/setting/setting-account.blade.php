@extends('layouts-admin.app')
@section('title')
Edit Account
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
                    <h1 class="m-0">Edit Account</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Account</li>
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
                                    <label for="validationCustom01">Username:</label>
                                    <input v-model="username" class="form-control" type="text" placeholder="username">

                                </div>

                                <div class="mb-4">
                                    <label for="validationCustom01">Email:</label>
                                    <input v-model="email" class="form-control" type="email" placeholder="Email">

                                </div>


                                <div class="mb-4">
                                    <label for="validationCustom01">Full Name:</label>
                                    <input v-model="full_name" class="form-control" type="text" placeholder="ex : Full Name">

                                </div>

                                <div class="mb-4">
                                    <label for="validationCustom01">Password:</label>
                                    <input v-model="password" class="form-control" type="password" placeholder="ex : Password">

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
            username: `{{ $user->username ?? '' }}`,
            full_name: `{{ $user->full_name ?? '' }}`,
            email: `{{ $user->email  ?? '' }}`,
            password: `{{ $user->password  ?? '' }}`,
            loading: false,
        },
        methods: {
            sendData: function() {
                let vm = this;

                let data = {
                    username: this.username,
                    full_name: this.full_name,
                    email: this.email,
                    password: this.password,
                }

                let formData = new FormData();
                for (var key in data) {
                    formData.append(key, data[key]);
                }
                axios.post('/admin/setting/update-account', formData)
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
                            text: `${err.response.data.errors['password']}`,
                            icon: 'error',
                        })
                    })
            },

        }
    })
</script>
@endsection