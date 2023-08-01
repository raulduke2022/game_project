<template>
    <div>
        <header>
        </header>
        <ul class="main-container">
            <li v-for="game in games" :key="game.id">
                <game-detail :title="game.title" :price="game.price" :id="game.id"></game-detail>
            </li>
        </ul>
    </div>
    <div class="button">
        <base-button @click="loadMore" v-if="nextPage">Показать еще</base-button>
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
    background-color: black;
    color: #fff;
    text-align: center;
    height: 30rem;
    border-bottom: green 2px solid;
}


.main-container {
    display: grid;
    margin: 0 1rem;
    //grid-template-columns: repeat(auto-fit, max(20rem, 1fr));
    grid-template-columns: repeat(auto-fit, minmax(10rem, 30rem));
    grid-gap: 0;
    list-style: none;
}

.button {
    display: flex;
    justify-content: center;
    align-content: center;
    margin-bottom: 0.5rem;
}

ul {
    display: flex;
    justify-content: space-around;
}

</style>
