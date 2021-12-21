import axios from "axios"

export default {
    state: {
        category: [],
        post: [],
        blogpost: [],
        singlepost: []
    },
    getters: {
        getCategory(state){
            return state.category
        },
        getPost(state){
            return state.post
        },
        getBlogPost(state){
            return state.blogpost
        },
        getSinglePost(state){
            return state.singlepost
        }
    },
    actions: {
        allCategory(context){
            axios.get('/category')
                .then((response) => {
                    context.commit('categories', response.data.categories);
                })
        },
        allPost(context){
            axios.get('/post')
                .then((response) => {
                    context.commit('posts', response.data.posts);
                })
        },
        allBlogPost(context){
            axios.get('/blogpost')
                .then((response) => {
                    context.commit('blogposts', response.data.blogposts);
                })
        },
        singlePostById(context, payload){
            axios.get('/singlepost/' + payload)
                .then((response) => {
                    context.commit('singlepost', response.data.post);
                })
        }
    },
    mutations: {
        categories(state, payload){
            return state.category = payload;
        },
        posts(state, payload){
            return state.post = payload;
        },
        blogposts(state, payload){
            return state.blogpost = payload;
        },
        singlepost(state, payload){
            return state.singlepost = payload;
        }
    }
}