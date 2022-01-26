<template>
    <div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category List</h1>
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
                        <h3 class="card-title">Category List</h3>
                        <div class="card-tools">
                            <router-link to="/add-category">
                                <button class="btn btn-primary">
                                    Add Category
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
                            <th>Category Name</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(category, index) in getAllCategory" v-bind:key="category.id">
                            <td>{{ index+1 }}</td>
                            <td>{{ category.name }}</td>
                            <td>{{ category.created_at | dateformat }}</td>
                            <td style="white-space: nowrap;" class="text-center">
                                <router-link :to="`/edit-category/${category.id}`"><button class="btn btn-warning"><i class="fas fa-edit"></i></button></router-link> | 
                                <a href="#" @click.prevent="deleteCategory(category.id)"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Category Name</th>
                            <th>Created At</th>
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
        this.$store.dispatch('allCategory');
    },
    computed: {
        getAllCategory(){
            return this.$store.getters.getCategory;
        }
    },
    methods: {
        deleteCategory(id) {
            // axios.delete('/category/' + id) // web route
            axios.delete('/api/category/' + id) // api route
                .then( () => {
                    this.$store.dispatch('allCategory');
                    Toast.fire({
                        icon: 'success',
                        title: 'Category deleted successfully'
                    })
                })
        }
    }
}
</script>

<style>

</style>