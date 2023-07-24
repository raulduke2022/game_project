export default {
    async fetchData(context) {
        const response = await fetch('/api/games/');
        const responseData = await response.json();

        if (!response.ok) {
            throw new Error(responseData.message || 'Failed to fetch games.');
        }

        const games = responseData.data;
        context.commit('setGames', games);
    }
}
