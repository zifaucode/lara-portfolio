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
                    <h5>List Category</h5>
                    <br>

                    <button class="btn btn-sm btn-primary pull-right" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Create Category</button>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create New</h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form @submit.prevent="sendData">
                                <div class="modal-body">

                                    <div class="mb-2">
                                        <label for="validationCustom01">Category Name</label>
                                        <input v-model="name" class="form-control" id="validationCustom01" type="text" placeholder="Category" required="">

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create New</h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form @submit.prevent="sendDataEdit">
                                <div class="modal-body">

                                    <div class="mb-2">
                                        <label for="validationCustom01">Category Name</label>
                                        <input v-model="categories.name" class="form-control" id="validationCustom01" type="text" placeholder="Category" required="">
                                        <input type="hidden" v-model="categories.id">

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dt-ext table-responsive">

                        <table class="display" id="table_id">
                            <thead>
                                <tr>
                                    <th>Id Category</th>
                                    <th>Category Name</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr style="font-size: 14px;" v-for="cat in category">
                                    <td>@{{cat.id}}</td>
                                    <td>@{{cat.name}}</td>


                                    <td>


                                        <button class="btn btn-sm btn-danger-gradien" @click.prevent="deleteRecord(cat.id)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                            </svg>
                                        </button>


                                        <a @click="onSelcected(cat.id)" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModalEdit">
                                            <button class="btn btn-sm btn-primary-gradien">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>
                                            </button>
                                        </a>



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
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>
<script>
    let app = new Vue({
        el: '#app',
        data: {
            name: '',
            category: JSON.parse(String.raw `{!! json_encode($category) !!}`),
            categories: [],
            category_id: '',
            category_name: ''
        },
        methods: {
            onSelcected: function(id) {
                this.categories = this.category.filter((item) => {
                    return item.id == id;
                })[0]



            },
            sendDataEdit() {
                let self = this;

                axios.patch(`/admin/blog/category/` + this.categories['id'], {
                    name: self.categories.name,

                }).then((res) => {
                    Swal.fire({
                        title: 'Success',
                        text: 'Category Not Saved',
                        icon: 'success',
                    })
                    window.location.href = "/admin/blog/category"
                }).catch(err => {
                    Swal.fire({
                        title: 'Error',
                        text: 'Category Not Saved',
                        icon: 'error',
                    })
                })
            },
            sendData() {
                let self = this;

                axios.post('/admin/blog/category', {
                    name: self.name,

                }).then((res) => {
                    Swal.fire({
                        title: 'Success',
                        text: 'Category Not Saved',
                        icon: 'success',
                    })
                    window.location.href = "/admin/blog/category"
                }).catch(err => {
                    Swal.fire({
                        title: 'Error',
                        text: 'Category Not Saved',
                        icon: 'error',
                    })
                })
            },
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
                        return axios.delete('/admin/blog/category/' + id)
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
        }
    })
</script>
@endsection