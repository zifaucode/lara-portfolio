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
                    <h5>List Blog</h5>
                    <br>
                    <a href="/admin/blog/create"> <button class="btn btn-sm btn-primary pull-right">Create Blog</button></a>
                </div>
                <div class="card-body">
                    <div class="dt-ext table-responsive">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Author</th>
                                    <th>category</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="font-size: 14px;" v-for="bl in blog">
                                    <td>@{{bl.title}}</td>
                                    <td>@{{ bl.content | liveSubstr}}</td>
                                    <td>@{{bl.users.username}}</td>
                                    <td>@{{bl.categories.name}}</td>
                                    <td><img :src="'/files/blog/' + bl.image" width="100px"></td>
                                    <td v-if="bl.active == 1"> <span class="badge badge-success">POST</span></td>
                                    <td v-if="bl.active == 0"> <span class="badge badge-warning">Menunggu Persetujuan Admin</span></td>


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
                                                        <a class="btn btn-sm btn-success mb-2 me-2" :href="'/admin/blog/detail/' + bl.id">Detail</a>
                                                        <a class="btn btn-sm btn-danger mb-2 me-2" @click.prevent="deleteRecord(bl.id)" href="">Delete</a>
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
            blog: JSON.parse(String.raw `{!! json_encode($blog) !!}`),
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
                        return axios.delete('/admin/blog/' + id)
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
