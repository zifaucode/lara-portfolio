@extends('layouts-admin.app')
@section('title')
Detail Code
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
                    <h1 class="m-0">Detail Source Code</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Source Code</li>
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

                    <div class="card-body">
                        <form @submit.prevent="sendData" enctype="multipart/form-data">
                            <div class="col-sm-12">
                                <div class="mb-2">
                                    <label for="validationCustom01">Code Name:</label>
                                    <p>@{{ code.name }}</p>
                                </div>

                                <div class="mb-2">
                                    <label for="validationCustom01">Author Code:</label>
                                    <p>@{{ code.author_code }}</p>
                                </div>

                                <div class="mb-2">
                                    <label for="validationCustom01">Link Download:</label>
                                    <p> https://@{{ code.link_download }}</p>
                                </div>

                                <div class="mb-2">
                                    <label for="validationCustom01">Link Demo:</label>
                                    <p> https://@{{ code.link_demo }}</p>
                                </div>

                                <div class="mb-2">
                                    <label for="validationCustom01">Total Download:</label>
                                    <p> @{{ code.total_download ?? 0 }}</p>
                                </div>

                                <div class="mb-2">
                                    <label for="validationCustom01">Image</label>
                                    <br>
                                    <img :src="'/files/code/' + code.image" width="300px">
                                </div>

                                <div style="text-align: right;">
                                    <a href="/admin/code" class="btn btn-primary" type="submit">Back</a>
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
    const code = <?php echo Illuminate\Support\Js::from($code) ?>;
    let app = new Vue({
        el: '#app',
        data: {
            code,
        },
        methods: {
            //    
        }
    })
</script>
@endsection