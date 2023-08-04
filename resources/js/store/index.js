import {createStore} from 'vuex';

import gamesModule from "./modules/games/index.js"

const store = createStore({
    modules: {
        games: gamesModule,
    },
    state() {
        return {
            isLoading: false,
            scrollHeight: null,
        };
    },
    getters: {
        isLoading(state) {
            return state.isLoading;
        },
        scrollHeight(state) {
            return state.scrollHeight
        }
    },
    mutations: {
        setLoading(state) {
            state.isLoading = !state.isLoading;
        },
        setScrollHeight(state, payload) {
            state.scrollHeight = payload
        }
    },
    actions: {
        toggleLoading(context) {
            context.commit('setLoading')
        },
        updateScrollHeight(context, payload) {
            context.commit('setScrollHeight', payload)
        }
    }
});

export default store;
