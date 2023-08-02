<template>
    <div>
        <header v-if="!isLoading">
        </header>
        <ul class="main-container">
            <li v-for="game in games" :key="game.id">
                <game-detail :title="game.title" :price="game.price" :description="game.description" :id="game.id"></game-detail>
            </li>
        </ul>
    </div>
    <div class="button">
        <game-button @click="loadMore" v-if="nextPage"><h3>Показать еще</h3></game-button>
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
                await this.$store.dispatch('games/fetchGamesData');
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
                await this.$store.dispatch('games/fetchGamesData', this.nextPage)
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

header {
    background-image: url("../../back.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-size: 100%;
    grid-area: header;
    color: #fff;
    text-align: center;
    height: 30rem;
    border-bottom: green 2px solid;
}


.main-container {
    display: grid;
    margin: 0 1rem;
    grid-template-columns: repeat(auto-fit, minmax(10rem, 30rem));
    grid-gap: 0;
    list-style: none;
}

.button {
    display: flex;
    justify-content: center;
    align-content: center;
    margin: 0.8rem 0;
}

ul {
    display: flex;
    justify-content: space-around;
}

</style>
