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
            curr: ''
        };
    },
    getters: {
        isLoading(state) {
            return state.isLoading;
        },
        scrollHeight(state) {
            return state.scrollHeight
        },
        curr(state) {
            return state.curr;
        }
    },
    mutations: {
        setLoading(state) {
            state.isLoading = !state.isLoading;
        },
        setScrollHeight(state, payload) {
            state.scrollHeight = payload
        },
        setCurr(state,payload) {
            state.curr = payload
        }
    },
    actions: {
        toggleLoading(context) {
            context.commit('setLoading')
        },
        updateScrollHeight(context, payload) {
            context.commit('setScrollHeight', payload)
        },
        updateCurr(context, payload) {
            context.commit('setCurr', payload)
        }
    }
});

export default store;
