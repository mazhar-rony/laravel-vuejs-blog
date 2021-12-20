import axios from "axios"

export default {
    state: {
        category: [],
        post: []
    },
    getters: {
        getCategory(state){
            return state.category
        },
        getPost(state){
            return state.post
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
        }
    },
    mutations: {
        categories(state, payload){
            return state.category = payload;
        },
        posts(state, payload){
            return state.post = payload;
        }
    }
}