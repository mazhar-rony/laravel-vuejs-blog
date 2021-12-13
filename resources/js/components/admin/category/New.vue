<template>
    <div>
      <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-6 mt-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form @submit.prevent="addCategory()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="category">Add New Category</label>
                    <input type="text" class="form-control" id="category" name="name" v-model="form.name"
                      placeholder="Enter Category Name" :class="{ 'is-invalid': form.errors.has('name') }">
                      <!-- <div v-if="form.errors.has('name')" v-html="form.errors.get('name')" /> -->
                      <has-error :form="form" field="name"></has-error>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
  methods: {
    addCategory(){
      this.form.post('/category')
        .then((response) => {
          this.form.name = '';
          this.$router.push('/category-list');          
          Toast.fire({
            icon: 'success',
            title: 'Category added successfully'
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