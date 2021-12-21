<template>
    <span>
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
            <li><a href="#">Home</a></li>
            <li>Blog</li>
            </ol>
            <h2>Blog</h2>

        </div>
        </section>
        <!-- End Breadcrumbs -->
        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-8 entries">
                        <article v-for="post in blogpost" :key="post.id" class="entry">

                            <div class="entry-img">
                            <!-- <img :src="`uploadimage/${post.image}`" alt="" width="100%" class="img-fluid"> -->
                            <img :src="postImage(post.image)" alt="" width="100%" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                            <a href="#">{{ post.title }}</a>
                            </h2>

                            <div class="entry-meta">
                            <ul>
                                <li v-if="post.title" class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">{{ post.user.name }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01">{{ post.created_at | dateformat }}</time></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">{{Math.floor((Math.random() * 15) + 1)}} Comments</a></li>
                            </ul>
                            </div>

                            <div class="entry-content">
                                <p>{{ post.description | shortlength(500, '...') }}</p>
                            <div class="read-more">
                                <router-link :to="`/blog-single/${post.id}`">Read More</router-link>
                            </div>
                            </div>

                        </article>

                        <div class="blog-pagination">
                            <ul class="justify-content-center">
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <BlogSidebar/>
                    </div>    
                </div>
            </div> 
        </section> 
        <!-- End Blog Section -->   
    </span>
</template>

<script>
import BlogSidebar from './BlogSidebar.vue'
export default {
    name: "BlogPost",
    components: {
        BlogSidebar
    },
    data() {
        return {

        }
    },
    mounted() {
        this.$store.dispatch('allBlogPost');
    },
    computed: {
        blogpost(){
            return this.$store.getters.getBlogPost;
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
    }

}
</script>

<style>

</style>