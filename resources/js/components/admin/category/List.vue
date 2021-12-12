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
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Catgory 1</td>
                            <td>
                                <a href="#">Edit</a> | 
                                <a href="#">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Catgory 2</td>
                            <td>
                                <a href="#">Edit</a> | 
                                <a href="#">Delete</a>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Category Name</th>
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

}
</script>

<style>

</style>