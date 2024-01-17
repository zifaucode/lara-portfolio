@extends('layouts-admin.app')
@section('title')
About Website
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
                    <h5>Detail Pribadi</h5>
                    <br>
                    <a href="#"><button class="btn btn-sm btn-primary pull-right">Edit</button></a>
                    <a href="/admin/about"> <button class="btn btn-sm btn-dark pull-right me-2">
                            < Kembali</button></a>
                </div>
                <div class="card-body">

                    <table>
                        <tr>
                            <th>Nama</th>
                            <td>:&nbsp;@{{about.name}}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>:&nbsp;@{{about.email}}</td>
                        </tr>


                        <tr>
                            <th>Bidang</th>
                            <td>:&nbsp;@{{about.role}}</td>
                        </tr>


                        <tr>
                            <th>Deskripsi anda</th>
                            <td>:&nbsp;@{{about.description}}</td>
                        </tr>


                        <tr>
                            <th>Hobi </th>
                            <td>:&nbsp;@{{about.hobby}}</td>
                        </tr>


                        <tr>
                            <th>Foto</th>
                            <td>-</td>
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
            about: JSON.parse(String.raw `{!! json_encode($about) !!}`),
        },
        methods: {


        }
    })
</script>
@endsection
