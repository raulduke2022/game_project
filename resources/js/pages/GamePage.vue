<template>
    <div class="container">
        <div class="game-main">
            <div class="game-card">
                <game-card></game-card>
            </div>
            <div class="buy-form">
                <base-form></base-form>
            </div>
        </div>
        <div v-if="slides" class="slider">
            <vueper-slides lazy lazy-load-on-drag>
                <vueper-slide v-for="(slide, i) in slides" :key="i" :image="`/${slide.path}`">
                    <template #loader>
                        <i class="icon icon-loader spinning"></i>
                        <span>Идет загрузка...</span>
                    </template>
                </vueper-slide>
            </vueper-slides>
        </div>
    </div>
</template>

<script>
import {VueperSlide, VueperSlides} from 'vueperslides'
import 'vueperslides/dist/vueperslides.css'
import GameButton from "@/components/ui/GameButton.vue";
import BaseForm from "@/components/ui/BaseForm.vue";
import GameCard from "@/components/ui/GameCard.vue";

export default {
    components: {GameCard, GameButton, VueperSlides, VueperSlide, BaseForm},
    props: ['id'],
    computed: {
        game() {
            return this.$store.getters['games/game'];
        },
        slides() {
            const game  = this.$store.getters['games/game'];
            if (game) {
                console.log(game.images);
                return game.images
            }
        }
    },
    methods: {
        async loadGameInfo() {
            this.$store.dispatch('toggleLoading')
            try {
                await this.$store.dispatch('games/fetchGameData', `/api/games/${this.id}`);
            } catch (error) {
                this.error = error.message || 'Something went wrong!';
            }
            this.$store.dispatch('toggleLoading')
        },
    },
    created() {
        this.loadGameInfo()
    }
}
</script>
<style scoped>

.container {
    overflow: auto;
    background: linear-gradient(to right, #034378, #2d4e68);
    display: grid;
    grid-template-areas: "main" "slider";
    grid-template-rows: auto;
}

.slider {
    grid-area: slider;
    margin: 2rem 25rem;
}

.buy-form {
    margin-top: 4rem;
    display: block;
}

.game-card {
    display: block;
}

.game-main {
    grid-area: main;
    grid-template-columns: 1fr 1.5fr;
    display: flex;
    justify-content: center;
}

.vueperslide--loading .vueperslide__content-wrapper {
    display: none !important;
}

</style>
