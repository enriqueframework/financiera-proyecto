import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state:{
        drawerOpen: false,
        isAuthenticate: false,
        user:{}
    },
    actions: {
        login({commit}, credentials) {
            console.log(credentials);
            axios.get('/sanctum/crsf-cookie')
            .then(response => {
                axios.post('login', credentials)
                .then(response =>{
                    console.log(response.data);
                    commit('setUser', response.data);
                });
            });
        }
    },
    mutations: {
        setUser (state, user){
            state.user = user;
            state.isAuthenticate = true;
        }
    },
    getters: {}
});

export default store;
