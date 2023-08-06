<template>
    <section class="headline">
        <h2 style="font-size: 3rem; color: #ff4630;">Магазин цифровых товаров</h2>
        <h2 style="color: yellow; font-size: 2rem">Выгодные предложения!</h2>
    </section>
    <div>
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
    background: #0F2027;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #2C5364, #203A43, #0F2027); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: #1f4037;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #99f2c8, #1f4037);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #99f2c8, #1f4037); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    display: flex;
    flex-direction: column;
    justify-content: center;
    box-shadow: 2px 2px 2px 2px green;
}

h1, p, h2 {
    text-align: center;
    line-height: 1.4;
}


</style>
