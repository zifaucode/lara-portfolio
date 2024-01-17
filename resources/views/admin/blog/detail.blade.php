@extends('layouts-admin.app')
@section('title')
Blog Detail
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

<div class="row" id="app">
    <div class="col-sm-12">
        <!-- ====================================== MODAL ======================================= -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form @submit.prevent="sendData">
                        <div class="modal-body">

                            <div class="col-sm-12">
                                <label class="form-label" for="validationCustom04">Ubah Status</label>
                                <select class="form-select" id="validationCustom04" required="" v-model="active">
                                    <option value="0">--- PILIH STATUS ---</option>
                                    <option value="1">POST</option>
                                    <option value="2">TOLAK</option>

                                </select>
                            </div>
                            <br>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ======================================================================= -->

        <div class="card">
            <div class="card-header">
                <h5>Detail Blog</h5>
                <button class="btn btn-sm btn-primary pull-right" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Ubah Status</button>
            </div>
            <div class="card-body add-post">

                <div class="col-sm-12">
                    <div class="mb-2">
                        <label for="validationCustom01">Title:</label>
                        <input v-model="title" class="form-control" id="validationCustom01" type="text" placeholder="Post Title" disabled="">
                        <div class="valid-feedback">Looks good!</div>
                    </div>

                    <div class="col-sm-12">
                        <label class="form-label" for="validationCustom04">Category</label>
                        <select class="form-select" id="validationCustom04" required="" v-model="category_id" disabled>
                            <option selected="" disabled="" value="">Choose Category</option>
                            <option v-for="cat in category" :value="cat.id">@{{ cat.name }}</option>
                        </select>
                        <div class="invalid-feedback">Please select a valid state.</div>
                    </div>


                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Content</h5>
                                </div>
                                <div class="card-body">
                                    <p>@{{ blog.content }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-primary">
                                <img :src="'/files/blog/' + blog.image" width="300px">
                            </div>
                        </div>
                    </div>
                    <br><br>

                    <div class="btn-showcase text-end">
                        <a :href="'/admin/edit/detail/' + blog.id"><button class="btn btn-primary" type="submit">Edit</button></a>

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
            title: '{!! $blog->title !!}',
            user_id: '1',
            category_id: '{!! $blog->category_id !!}',
            content: JSON.parse(String.raw `{!! json_encode($blog->content) !!}`),
            image: '',
            active: '0',
            loading: false,
            category: JSON.parse(String.raw `{!! json_encode($category) !!}`),
        },
        methods: {
            sendData() {
                let self = this;
                axios.patch('/admin/blog/status/{{$blog->id}}', {

                    active: self.active,
                    message: self.message,

                }).then((res) => {
                    Swal.fire({
                        title: 'Success',
                        text: 'Status Berahsil di Update',
                        icon: 'success',
                    })
                    window.location.href = "/admin/blog"
                }).catch(err => {
                    Swal.fire({
                        title: 'Error',
                        text: 'Status Tidak Terupdate',
                        icon: 'error',
                    })
                })
            },

        }
    })
</script>
@endsection