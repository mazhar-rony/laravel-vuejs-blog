<template>
    <div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Post List</h1>
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Post List</h3>
                        <div class="card-tools">
                            <router-link to="/add-post">
                                <button class="btn btn-primary">
                                    Add Post
                                </button>
                            </router-link>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>User</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(post, index) in getAllPost" v-bind:key="post.id">
                            <td>{{ index+1 }}</td>
                            <td>{{ post.user.name }}</td>
                            <td>{{ post.category.name }}</td>
                            <td>{{ post.title | shortlength(20, "...") }}</td>
                            <td>{{ post.description | shortlength(50, "...") }}</td>
                            <!-- <td><img :src="post.image" :alt="post.image" width="50px" height="50px"></td> -->
                            <!-- <td><img :src="'/uploadimage/'+post.image" alt="" width="50" height="50"></td> -->
                            <td><img :src="postImage(post.image)" alt="" width="50" height="50"></td>
                            <td>
                                <router-link :to="`/edit-post/${post.id}`">Edit</router-link> | 
                                <a href="#" @click.prevent="deletePost(post.id)">Delete</a>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>User</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
</template>

<script>
export default {
    name: "List",
    mounted() {
        this.$store.dispatch('allPost');
    },
    computed: {
        getAllPost(){
            return this.$store.getters.getPost;
        }
    },
    methods: {
        postImage(img) {
            if (img.includes('https')) { // fake images
                return img;
            }
            else{
                return "uploadimage/" + img; // uploded images
            }
        },
        deletePost(id) {
            axios.delete('/post/'+id)
                .then(() => {                    
                    this.$store.dispatch('allPost');
                    Toast.fire({
                    icon: 'success',
                    title: 'Post Deleted Successfully'
            })
                })
                .catch(() => {

                })
        }
    }
}
</script>

<style>

</style>