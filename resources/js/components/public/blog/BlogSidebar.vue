<template>
    <span>
        <!-- <div class="col-lg-4"> -->

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text" v-model="keyword">
                  <button type="submit" @click.prevent="searchPost"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li v-for="category in allcategories" :key="category.id">
                    <router-link :to="`/category/${category.id}`">{{ category.name }} <span v-if="category.posts">( {{ category.posts.length }} )</span></router-link>
                  </li>
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div v-for="post in latestposts" :key="post.id" class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img :src="postImage(post.image)" alt="">
                  <h4><router-link :to="`/blog-single/${post.id}`">{{ post.title }}</router-link></h4>
                  <time datetime="2020-01-01">{{ post.created_at | dateformat }}</time>
                </div>

              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->
        <!-- </div> -->
    </span>
</template>

<script>
export default {
    name: "BlogSidebar",
    data() {
      return {
        keyword: ''
      }
    },
    mounted() {
      this.$store.dispatch('allCategories');
      this.$store.dispatch('latestPosts');
    },
    computed: {
      allcategories(){
        return this.$store.getters.getAllCategories;
      },
      latestposts(){
        return this.$store.getters.getLatestPosts;
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
      searchPost(){
        this.$store.dispatch('searchPost', this.keyword);
      }
    }
}
</script>

<style>

</style>