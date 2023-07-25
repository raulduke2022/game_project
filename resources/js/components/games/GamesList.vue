<template>
    <div>
        <ul class="container">
            <li v-for="game in games" :key="game.id">
                <game-detail :title="game.title" :price="game.price"></game-detail>
            </li>
        </ul>
    </div>
    <div class="button">
        <base-button @click="loadMore" v-if="nextPage">Загрузить еще</base-button>
    </div>
</template>

<script>
import GameDetail from "./GameDetail.vue"

export default {
    emits: ['scrollMe'],
    components: {
        GameDetail,
    },
    computed: {
        games() {
            return this.$store.getters['games/games'];
        },
        nextPage() {
            return this.$store.getters['games/nextPage'];
        },
        isLoading() {
            return this.$store.isLoading;
        }
    },
    data() {
        return {
            error: null,
        }
    },
    methods: {
        async loadGames() {
            this.$store.dispatch('toggleLoading')
            try {
                await this.$store.dispatch('games/fetchData');
            } catch (error) {
                this.error = error.message || 'Something went wrong!';
            }
            this.$store.dispatch('toggleLoading')
        },
        handleError() {
            this.error = null;
        },
        async loadMore() {
            this.$store.dispatch('toggleLoading')
            try {
                await this.$store.dispatch('games/fetchData', this.nextPage)
            } catch (error) {
                this.error = error.message || 'Something went wrong!';
            }
            this.$store.dispatch('toggleLoading');
            this.$emit('scrollMe')
        }
    },
    created() {
        this.loadGames()
    }
}

</script>

<style scoped>

.container {
    display: grid;
    margin: 0rem 15rem;
    grid-template-columns: repeat(3, 1fr);
    list-style: none;
}

.button {
    display: flex;
    justify-content: center;
    align-content: center;
}

</style>
