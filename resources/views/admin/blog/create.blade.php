@extends('layouts-admin.app')
@section('title')
Blog Create
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
        <div class="card">
            <div class="card-header">
                <h5>Create Blog</h5>
            </div>
            <div class="card-body add-post">
                <form @submit.prevent="sendData" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-12">
                        <div class="mb-2">
                            <label for="validationCustom01">Title:</label>
                            <input v-model="title" class="form-control" id="validationCustom01" type="text" placeholder="Post Title" required="">
                            <div class="valid-feedback">Looks good!</div>
                        </div>

                        <div class="col-sm-12">
                            <label class="form-label" for="validationCustom04">Category</label>
                            <select class="form-select" id="validationCustom04" required="" v-model="category_id">
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
                                        <textarea class="form-control" v-model="content" id="exampleFormControlTextarea4" rows="5" placeholder="Content" required></textarea>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-primary">
                                    <div class="d-flex flex-column">
                                        <small> File Gambar (.jpeg/png/jpg)</small>
                                        <br>
                                        <input type="file" ref="image" class="custom-file-input" accept=".jpeg, .png, .jpg" v-on:change="handleFotoUpload">
                                    </div>
                                    @error('image')
                                    <div class="alert alert-danger mb-4">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br><br>

                        <div class="btn-showcase text-end">
                            <button class="btn btn-primary" type="submit">Post</button>

                        </div>
                    </div>
                </form>

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
            title: '',
            user_id: '1',
            category_id: '',
            content: '',
            image: '',
            status_id: '3',
            loading: false,
            category: JSON.parse(String.raw `{!! json_encode($category) !!}`),
        },
        methods: {
            handleFotoUpload: function() {
                this.image = this.$refs.image.files[0];
                console.log(this.image['name']);
            },
            sendData: function() {
                let vm = this;

                let data = {
                    image: vm.image,
                    title: this.title,
                    content: this.content,
                    user_id: this.user_id,
                    category_id: this.category_id,
                    status_id: this.status_id,
                    image_name: this.image['name']

                }

                let formData = new FormData();
                for (var key in data) {
                    formData.append(key, data[key]);
                }
                axios.post('/admin/blog/', formData)
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Blog  berhasil disimpan.',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/admin/blog';
                            }
                        })
                        // console.log(response);
                    })
                    .catch(err => {
                        console.log('error', err.response.data)
                        Swal.fire({
                            title: 'Error',
                            text: `${err.response.data.errors['image']}`,
                            icon: 'error',
                        })
                    })
            },

        }
    })
</script>
@endsection