<template>
    <div>
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-around">
                    <div class="col-md-10">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add New Post</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" enctype="multipart/form-data" @submit.prevent="addNewPost()">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Post Title</label>
                                        <input type="text" v-model="form.title" name="title" 
                                        class="form-control" id="title" 
                                        :class="{ 'is-invalid': form.errors.has('title') }" placeholder="Post Title">
                                        <has-error :form="form" field="title"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <!-- <textarea v-model="form.description" name="description" 
                                        class="form-control" id="description" rows="5"
                                        :class="{ 'is-invalid': form.errors.has('description') }" placeholder="Description">
                                        </textarea> -->
                                        <markdown-editor v-model="form.description" :class="{ 'is-invalid': form.errors.has('description') }" name="description"></markdown-editor>
                                        <has-error :form="form" field="description"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Select Category</label>
                                        <select id="category_id" v-model="form.category_id" class="form-control" :class="{ 'is-invalid': form.errors.has('category_id') }">
                                            <option disabled value="">Select Category</option>
                                            <option :value="category.id" v-for="category in getAllCategory" :key="category.id">{{ category.name }}</option>
                                        </select>
                                        <has-error :form="form" field="category_id"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Post Image</label>
                                        <input @change="changeImage($event)" type="file" name="image"
                                        class="form-control" id="image"
                                        :class="{ 'is-invalid': form.errors.has('image') }">
                                        <img v-if="form.image" :src="form.image" alt="post thumbnail" class="rounded mt-2" width="100" height="100">
                                        <has-error :form="form" field="image"></has-error>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="photo">Upload Post Image</label>

                                        <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="photo">
                                        <label class="custom-file-label" for="photo">Choose file</label>
                                        </div>
                                    </div> -->
                                
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
</template>

<script>
export default {
    name: "New",
    data() {
        return {
            form: new Form({
                title: '',
                description: '',
                category_id: '',
                image: ''
            })
        }
    },
    mounted() {
        this.$store.dispatch('allCategory')
    },
    computed: {
        getAllCategory(){
            return this.$store.getters.getCategory;
        }
    },
    methods: {
        changeImage(event){
             let file = event.target.files[0];
             if(file.size > 1048576 || file.type.includes("image") == false) { // file size > 1024*1024 = 1048576
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'File must be an Image and not more than 1 MB !',
                footer: '<a href>Why do I have this issue?</a>'
                })
            }else {
                let reader = new FileReader();

                reader.onload = (event) => {
                    this.form.image = event.target.result
                    //console.log(e.target.result)
                };
                reader.readAsDataURL(file);
            }
        },
        addNewPost(){
            this.form.post('/post')
                .then((response) => {
                    this.$router.push('/post-list');          
                    Toast.fire({
                        icon: 'success',
                        title: 'Post added successfully'
                        })
                    })
                .catch(() => {

                })
        }
    },
}
</script>

<style>

</style>