@extends('layouts-admin.app')
@section('title')
Detail Blog
@endsection


@section('head')
<style>
    .scroll {
        max-height: 700px;
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
                    <h1 class="m-0">Detail Blog</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">

                <div class="card card-info">
                    <div class="card-body scroll">

                        <div class="col-md-12">

                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title"></h3>
                                </div>

                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="exampleInputTitle">Title</label>
                                        <p>@{{ blog.title }}</p>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputTitle">Category</label>
                                        <h4><b><span class="badge badge-primary">@{{ blog.categories?.name }}</span></b></h4>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputTitle">Thumbnail</label>
                                        <p><img :src="'/files/blog/' + blog.image" width="250px"></p>
                                    </div>



                                </div>

                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="card card-outline card-info">


                                <div class="card-body">
                                    <p v-html="blog.content"></p>
                                </div>

                            </div>

                            <br>
                            <div style="text-align: right;">
                                <a href="/admin/blog" class="btn btn-info">Back To List</a>
                            </div>
                        </div>


                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection

@section('pagescript')

@section('pagescript')
<script>
    const blog = <?php echo Illuminate\Support\Js::from($blog) ?>;
    let app = new Vue({
        el: '#app',
        data: {
            blog,
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