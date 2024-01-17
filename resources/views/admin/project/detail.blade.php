@extends('layouts-admin.app')
@section('title')
Project Create
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
                    <h5>Detail Project</h5>
                    <br>
                    <button class="btn btn-sm btn-primary pull-right" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">Respon</button>
                    <a href="/admin/project"> <button class="btn btn-sm btn-dark pull-right me-2">
                            < Kembali</button></a>
                </div>
                <div class="card-body">

                    <table>
                        <tr>
                            <th>Project Name</th>
                            <td>:&nbsp;@{{project.name}}</td>
                        </tr>


                        <tr>
                            <th>Category</th>
                            <td v-if="project.category_id == 1">:&nbsp;<span class="badge badge-warning"> FREE</span></td>
                            <td v-if="project.category_id == 2">:&nbsp;<span class="badge badge-success"> BERBAYAR</span></td>
                        </tr>



                        <tr v-if="project.category_id == 2">
                            <th>Budged Project</th>
                            <td>:&nbsp;@{{project.budged}}</td>
                        </tr>


                        <tr v-if="project.category_id == 2">
                            <th>Request Pengerjaan</th>
                            <td>:&nbsp;@{{project.req_time}}</td>
                        </tr>


                        <tr>
                            <th>No.Hp / Whatsapp</th>
                            <td>:&nbsp;@{{project.phone}}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td v-if="project.status_id == 1">:&nbsp;<span class="badge badge-success">@{{project.status?.name}}</span></td>
                            <td v-if="project.status_id == 2">:&nbsp;<span class="badge badge-primary">@{{project.status?.name}}</span></td>
                            <td v-if="project.status_id == 3">:&nbsp;<span class="badge badge-warning">@{{project.status?.name}}</span></td>
                            <td v-if="project.status_id == 4">:&nbsp;<span class="badge badge-danger">@{{project.status?.name}}</span></td>
                        </tr>

                        <tr>
                            <th>Gambar</th>
                            <td>: &nbsp;<img :src="'/files/project/' + project.image" width="200px"></td>
                        </tr>


                    </table>
                    <br>
                    <br>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Deskripsi</h5>
                                </div>
                                <div class="card-body">
                                    <textarea class="form-control" v-model="deskripsi" id="exampleFormControlTextarea4" rows="5" placeholder="Deskripsi" disabled></textarea>

                                </div>
                            </div>
                        </div>
                    </div>


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
                                            <select class="form-select" id="validationCustom04" required="" v-model="status_id">
                                                <option value="1">Selesai</option>
                                                <option value="2">Pembuatan</option>
                                                <option value="3">Antrian</option>
                                                <option value="4">Ditolak</option>
                                            </select>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="col-sm-12">
                                            <label class="form-label" for="validationCustom04">Alasan / Pesan</label>
                                            <textarea class="form-control" v-model="message" id="exampleFormControlTextarea4" rows="5" placeholder="Deskripsi"></textarea>
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
            deskripsi: '{!! $project->deskripsi !!}',
            project: JSON.parse(String.raw `{!! json_encode($project) !!}`),
            message: '',
            status_id: '',
            loading: false,
        },
        methods: {
            sendData() {
                let self = this;
                axios.patch('/admin/project/{{$project->id}}', {

                    status_id: self.status_id,
                    message: self.message,

                }).then((res) => {
                    Swal.fire({
                        title: 'Success',
                        text: 'Status Berahsil di Update',
                        icon: 'success',
                    })
                    window.location.href = "/admin/project"
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