@extends('layouts-admin.app')
@section('title')
Dashboard
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
<br>
<div id="app" v-cloak>
    <div class="row">
        <div class="card-body">
            <div class="alert alert-primary outline-2x" role="alert">
                <h4>Task</h4>

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
@endsection
