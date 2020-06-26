import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios';

Vue.use(Vuex);

const store = new Vuex.Store({
    actions: {
        drawerOpen:true,
        isAuthenticate: JSON.parse(localStorage.getItem('auth')) || false,
        user: {},
        token: localStorage.getItem('refresh_token') || undefined
    },
    actions: {
        async login ({dispatch}, credentials){
            const data = {
                gran_type: 'password',
                Client_id: '90e65371-6f14-49dd-8e9a-5802328def84',
                Client_secret: 'E3S8iTEIz2gyXEe96NMXSFwA20UiUQ2lblTRk2E0',
                username: credentials.email,
                password: credentials.password,
                scopes: ''
            };
            
            const response = await axios.post('/oauth/token', data);

            console.log(respose.data);
            localStorage.setItem('access_token', response.data.access_token);
            localStorage.setItem('refresh_token', response.data.refresh_token);

            axios.defaults.headers.common['Authorization'] = "Bearer" + response.data.access_token;
            
            return dispatch('getUser');
        },

        getUser({commit}){
            axios.get('/api/user')
            .then(response =>{
                commit('setUser', response.data);
            })
            .catch(error =>{
                commit('setUser', {});
            });
        }
    },
    mutations: {
        setUser (state, user){
            state.user = user;
            state.isAuthenticate = Boolean(user);
            localStorage.setItem('auth', state.isAuthenticated);
        }
    },
    getters: {}
});