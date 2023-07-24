import { createStore } from 'vuex';

import gamesModule from "./modules/games/index.js"

const store = createStore({
  modules: {
    games: gamesModule,
  },
  state() {
    return {
    };
  },
  getters: {
  }
});

export default store;
