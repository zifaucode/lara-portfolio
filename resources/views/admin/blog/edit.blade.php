@extends('layouts-admin.app')
@section('title')
Edit Blog
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
                    <h1 class="m-0">Edit Blog</h1>
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

                @if(session('status'))
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Success!</h4>
                    <p> {{ session('status') }}</p>
                    <hr>
                    <p class="mb-0">Check in List Blog for review <a href="/admin/blog" class="btn btn-primary"> Check List Blog</a></p>
                </div>
                @endif


                @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Success!</h4>
                    <p> {{ session('error') }}</p>
                    <hr>
                </div>
                @endif

                <div class="card card-info">
                    <div class="card-body scroll">
                        <form action="{{ route('admin-blog.update', ['id' => $blog->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">

                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title"></h3>
                                    </div>

                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="exampleInputTitle">Title</label>
                                            <input type="text" class="form-control" id="exampleInputTitle" placeholder="Enter Title" name="title" value="{{ old('title') ?? $blog->title }}">
                                        </div>



                                        <div class="form-group">
                                            <label for="exampleInputTitle">Category</label>
                                            <select class="form-control" name="category_id">
                                                <option value="">- Select Category -</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $blog->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="exampleInputFile">Thumbnail</label>
                                            <div class="input-group">

                                                <div class="custom-file">
                                                    <input type="file" class="form-control" id="formFile" name="image">

                                                </div>

                                            </div>
                                            @if ($blog->image)
                                            <div class="mt-2">
                                                <img src="{{ asset('files/blog/' . $blog->image) }}" alt="Blog Image" style="max-width: 200px;">
                                            </div>
                                            @endif
                                        </div>

                                    </div>

                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="card card-outline card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Body Blog
                                        </h3>
                                    </div>

                                    <div class="card-body">
                                        <textarea id="summernote" name="content">{{ old('content') ?? $blog->content }}</textarea>
                                    </div>
                                    <div class="card-footer">

                                    </div>
                                </div>
                            </div>

                            <div style="text-align: right;">
                                <a href="/admin/blog" class="btn btn-info">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save</button>
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

@section('pagescript')
<script>
    let app = new Vue({
        el: '#app',
        data: {

        },
        methods: {

        }
    })
</script>

<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>
@endsection