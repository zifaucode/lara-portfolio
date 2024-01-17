@extends('layouts-admin.app')
@section('title')
Setting Website
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
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Detail Website</h5>
                    <br>
                    <a :href="'/admin/setting/edit/'+ setting.id"><button class="btn btn-sm btn-primary pull-right">Edit</button></a>
                    <a href="/admin/setting"> <button class="btn btn-sm btn-dark pull-right me-2">
                            < Kembali</button></a>
                </div>
                <div class="card-body">

                    <table>
                        <tr>
                            <th>Web Name</th>
                            <td>:&nbsp;@{{setting.web_name}}</td>
                        </tr>

                        <tr>
                            <th>Web Deskription</th>
                            <td>:&nbsp;@{{setting.web_desk}}</td>
                        </tr>


                        <tr>
                            <th>Web Title</th>
                            <td>:&nbsp;@{{setting.web_title}}</td>
                        </tr>


                        <tr>
                            <th>Web Meta</th>
                            <td>:&nbsp;@{{setting.web_meta}}</td>
                        </tr>


                        <tr>
                            <th>Web Footer</th>
                            <td>:&nbsp;@{{setting.web_footer}}</td>
                        </tr>


                        <tr>
                            <th>Logo</th>
                            <td>: &nbsp;<img :src="'/files/logo/' + setting.web_logo" width="200px"></td>
                        </tr>


                        <tr>
                            <th>Icon</th>
                            <td>: &nbsp;<img :src="'/files/icon/' + setting.web_icon" width="200px"></td>
                        </tr>

                        <tr>
                            <th>Front Image</th>
                            <td>: &nbsp;<img :src="'/files/front-image/' + setting.web_front_image" width="200px"></td>
                        </tr>


                    </table>
                    <br>
                    <br>







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
            setting: JSON.parse(String.raw `{!! json_encode($setting) !!}`),
        },
        methods: {


        }
    })
</script>
@endsection
