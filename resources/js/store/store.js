import axios from "axios"

export default {
    state: {
        category: [],
    },
    getters: {
        getCategory(state){
            return state.category
        }
    },
    actions: {
        allCategory(context){
            axios.get('/category')
                .then((response) => {
                    context.commit('categories', response.data.categories);
                })
        }
    },
    mutations: {
        categories(state, payload){
            return state.category = payload;
        }
    }
}