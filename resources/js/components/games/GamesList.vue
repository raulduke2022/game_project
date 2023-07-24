<template>
    <div>
        <ul v-for="game in games" :key="game.id">
            <game-detail></game-detail>
        </ul>
    </div>
</template>

<script>
import GameDetail from "./GameDetail.vue"

export default {
    components: {
        GameDetail,
    },
    computed: {
        games() {
            return this.$store.getters['games/games'];
        }
    },
    data() {
        return {
            data: null,
            isLoading: false,
            error: null
        }
    },
    methods: {
        async loadGames() {
            this.isLoading = true;
            try {
                await this.$store.dispatch('games/fetchData');
            } catch (error) {
                this.error = error.message || 'Something went wrong!';
            }
            this.isLoading = false;
        },
        handleError() {
            this.error = null;
        },
    },
    created() {
        this.loadGames()
    }
}

</script>
