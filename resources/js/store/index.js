import {createStore} from 'vuex';

import gamesModule from "./modules/games/index.js"

const store = createStore({
    modules: {
        games: gamesModule,
    },
    state() {
        return {
            isLoading: false,
        };
    },
    getters: {
        isLoading(state) {
            return state.isLoading;
        }
    },
    mutations: {
        setLoading(state) {
            state.isLoading = !state.isLoading;
        }
    },
    actions: {
        toggleLoading(context) {
            context.commit('setLoading')
        }
    }
});

export default store;
