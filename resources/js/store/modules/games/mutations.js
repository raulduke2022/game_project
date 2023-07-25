export default {
    addGames(state, payload){
        state.games = [...state.games, ...payload];
    },
    setNextPage(state,payload) {
        state.nextPage = payload
    }
};
