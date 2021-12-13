<template>
    <div>
        <!-- <h1>This is category no {{ this.$route.params.id }}</h1> -->
        <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
            <!-- left column -->
            <div class="col-md-6 mt-4">
                <!-- general form elements -->
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form @submit.prevent="updateCategory()">
                    <div class="card-body">
                    <div class="form-group">
                        <label for="category">Edit Category</label>
                        <input type="text" class="form-control" id="category" name="name" v-model="form.name"
                        placeholder="Enter Category Name" :class="{ 'is-invalid': form.errors.has('name') }">
                        <!-- <div v-if="form.errors.has('name')" v-html="form.errors.get('name')" /> -->
                        <has-error :form="form" field="name"></has-error>
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                </div>
                <!-- /.card -->

            </div>
            
            </div>
            <!-- /.row -->
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
            name: ''
        })
        }
    },
    mounted() {
        axios.get(`/category/${this.$route.params.id}/edit`)
            .then((response) => {
                this.form.fill(response.data.category);
            })
    },
    methods: {
        updateCategory(){
            this.form.put(`/category/${this.$route.params.id}`)
                .then((response) => {
                    this.$router.push('/category-list');          
                    Toast.fire({
                        icon: 'success',
                        title: 'Category updated successfully'
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