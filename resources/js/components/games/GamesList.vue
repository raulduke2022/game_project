<template>
    <section class="headline">
        <h1 style="font-size: 2rem">Магазин цифровых товаров</h1>
        <h2 style="color: yellow; font-size: 2rem">Выгодные предложения!</h2>
    </section>
    <div>
        <!--        <header v-if="!isLoading">-->
        <!--        </header>-->
        <ul class="main-container" id="main-container">
            <li v-for="game in games" :key="game.id">
                <game-detail :images="game.images" :title="game.title" :price="game.price"
                             :introduction="game.introduction" :id="game.id"></game-detail>
            </li>
        </ul>
    </div>
    <div class="button">
        <game-button @click="loadMore" v-if="nextPage"><h3 id="button">Показать еще</h3></game-button>
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
        },
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
            const element = document.getElementById('button');
            const container = document.getElementById('main-container')
            const yPosition = container.scrollHeight + element.scrollHeight;
            this.$store.dispatch('updateScrollHeight', yPosition)

            const scrollHeight = Math.max(document.body.scrollHeight, document.body.clientHeight);
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
        if (!this.$store.getters['games/games'].length) {
            this.loadGames()
        }
    },
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
    grid-template-columns: repeat(auto-fit, minmax(10rem, 25rem));
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

.headline {
    position: relative;
    width: 100%;
    height: 50vh;
    min-height: 350px;
    background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1435224668334-0f82ec57b605?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDd8fHxlbnwwfHx8fA%3D%3D&w=1000&q=80');
    background-size: cover;
    display: flex;
    flex-direction: column;
    justify-content: center;
    box-shadow: 2px 2px 2px 2px green;
}

h1, p, h2 {
    color: #fff;
    text-align: center;
    line-height: 1.4;
}


</style>
