export default {
    async fetchGamesData(context, url='api/games/') {
        const response = await fetch(url);
        const responseData = await response.json();

        if (!response.ok) {
            throw new Error(responseData.message || 'Failed to fetch games.');
        }


        const nextPageUrl =  responseData['next_page_url'];
        context.commit('setNextPage', nextPageUrl);

        const games = responseData.data;
        context.commit('addGames', games);
    },
    async fetchGameData(context, url) {
        const response = await fetch(url);
        const responseData = await response.json();
        console.log(responseData);

        if (!response.ok) {
            throw new Error(responseData.message || 'Failed to fetch games.');
        }
    },

}
