import axios from "axios"

export default {
    state: {
        category: [],
        post: [],
        blogpost: [],
        singlepost: [],
        allCategories: [],
        latestposts: []
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
        },
        // for blog sidebar
        getAllCategories(state){
            return state.allCategories
        },
        getLatestPosts(state){
            return state.latestposts
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
        },
        // for blog sidebar
        allCategories(context){
            axios.get('/categories')
                .then((response) => {
                    context.commit('allcategories', response.data.categories);
                })
        },
        latestPosts(context){
            axios.get('/latestposts')
                .then((response) => {
                    context.commit('latestposts', response.data.latestposts);
                })
        },
        getPostByCategory(context, payload){
            axios.get('/categorypost/' + payload)
                .then((response) => {
                    context.commit('blogposts', response.data.categoryposts);
                })
        },
        searchPost(context, payload){
            axios.get('/search?q=' + payload)
                .then((response) => {
                    context.commit('searchpost', response.data.searchpost);
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
        },
        allcategories(state, payload){
            return state.allCategories = payload;
        },
        latestposts(state, payload){
            return state.latestposts = payload;
        },
        searchpost(state, payload){
            return state.blogpost = payload;
        }
    }
}