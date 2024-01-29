@extends('layouts-admin.app')
@section('title')
Blog
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
<div class="container-fluid" id="app" v-cloak>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>List Source Code</h5>
                    <br>
                    <a href="/admin/project/create"> <button class="btn btn-sm btn-primary pull-right">Create Project</button></a>
                </div>
                <div class="card-body">

                    <div class="dt-ext table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Link Download</th>
                                    <th>Link Demo</th>
                                    <th>Author Code</th>
                                    <th>Jumlah Download</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="font-size: 14px;" v-for="sc in code">
                                    <td>@{{sc.name}}</td>
                                    <td>@{{ sc.link_download}}</td>
                                    <td>@{{ sc.link_demo}}</td>
                                    <td>@{{sc.author_code}}</td>
                                    <td>@{{sc.total_download}}</span></td>
                                    <td><img :src="'/files/code/' + sc.image" width="100px"></td>
                                    <td>
                                        <ul class="nav-menus">
                                            <li class="profile-nav onhover-dropdown p-4 me-0">
                                                <div class="media profile-media">
                                                    <div class="media-body">
                                                        <button class="btn btn-sm btn-primary-gradien"><i data-feather="menu"></i></button>
                                                    </div>
                                                </div>
                                                <ul class="profile-dropdown onhover-show-div">
                                                    <div class="text-center">

                                                        <a class="btn btn-sm btn-danger mb-2 me-2" @click.prevent="deleteRecord(sc.id)" href="">Delete</a>
                                                    </div>

                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
            code: JSON.parse(String.raw `{!! json_encode($code) !!}`),
        },
        methods: {
            deleteRecord: function(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "The data will be deleted",
                    icon: 'warning',
                    reverseButtons: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return axios.delete('/admin/code/' + id)
                            .then(function(response) {
                                console.log(response.data);
                            })
                            .catch(function(error) {
                                console.log(error.data);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops',
                                    text: 'Something wrong',
                                })
                            });
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Data has been deleted',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        })
                    }
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
