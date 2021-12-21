<template>
    <span>
         <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                <li><a href="index.html">Home</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li>Blog Single</li>
                </ol>
                <h2>Blog Single</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div v-for="post in singlepost" :key="post.id" class="row">

                    <div class="col-lg-8 entries">

                        <article class="entry entry-single">

                            <div class="entry-img">
                                <img :src="postImage(post.image)" alt="" width="100%" class="img-fluid">
                            </div>

                            <h2 class="entry-title">
                                <a href="blog-single.html">{{ post.title }}</a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                <li v-if="post.user" class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">{{ post.user.name }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{ post.created_at | dateformat }}</time></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">{{Math.floor((Math.random() * 15) + 1)}} Comments</a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>
                                    {{ post.description }}
                                </p>

                                <p>
                                Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.
                                </p>

                                <blockquote>
                                <p>
                                    Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.
                                </p>
                                </blockquote>

                                <p>
                                Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat.
                                Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque.
                                Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.
                                </p>

                                <h3>Et quae iure vel ut odit alias.</h3>
                                <p>
                                Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui.
                                Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea.
                                Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.
                                </p>
                                <img :src="`assets/public/assets/img/blog/blog-inside-post.jpg`" class="img-fluid" alt="">

                                <h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3>
                                <p>
                                Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel.
                                Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.
                                </p>
                                <p>
                                Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.
                                </p>

                            </div>

                            <div class="entry-footer">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                <li v-if="post.category"><a href="#">{{ post.category.name }}</a></li>
                                </ul>

                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
                                </ul>
                            </div>

                        </article><!-- End blog entry -->

                        <div class="blog-author d-flex align-items-center">
                        <img :src="`assets/public/assets/img/blog/comments-1.jpg`" class="rounded-circle float-left" alt="">
                        <div>
                            <h4 v-if="post.user">{{ post.user.name }}</h4>
                            <div class="social-links">
                            <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                            <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                            <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                            </div>
                            <p>
                            Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
                            </p>
                        </div>
                        </div><!-- End blog author bio -->
                    </div>
                    <div class="col-lg-4">
                        <BlogSidebar/>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Single Section -->
    </span>
</template>

<script>
import BlogSidebar from './BlogSidebar.vue'
export default {
    name: "SingleBlog",
    components: {
        BlogSidebar
    },
    data() {
        return {

        }
    },
    mounted() {
        this.$store.dispatch('singlePostById', this.$route.params.id);
    },
    computed: {
        singlepost(){
            return this.$store.getters.getSinglePost;
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