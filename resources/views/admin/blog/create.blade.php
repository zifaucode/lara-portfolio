@extends('layouts-admin.app')
@section('title')
Create Blog
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
                    <h1 class="m-0">Create Blog</h1>
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
                                        <input type="text" class="form-control" id="exampleInputTitle" placeholder="Enter Title">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputTitle">Category</label>
                                        <input type="text" class="form-control" id="exampleInputTitle" placeholder="Enter Title">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Thumbnail</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>

                                        </div>
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
                                    <textarea id="summernote"> Place <em>some</em> <u>text</u> <strong>here</strong></textarea>
                                </div>
                                <div class="card-footer">

                                </div>
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