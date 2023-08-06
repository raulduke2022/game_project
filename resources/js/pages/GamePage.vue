<template>
    <div class="container">
        <div class="header">
            <base-header :title="game.title" :description="game.description"></base-header>
        </div>
        <div class="main">
            <div v-if="slides" class="slider">
                <vueper-slides lazy lazy-load-on-drag fixed-height="25rem">
                    <vueper-slide fixed-height="50rem" class="slide" v-for="(slide, i) in slides" :key="i"
                                  :image="`/${slide.path}`">
                        <template #loader>
                            <i class="icon icon-loader spinning"></i>
                            <span>Идет загрузка...</span>
                        </template>
                    </vueper-slide>
                </vueper-slides>
            </div>
            <div class="buy-form">
                <base-form @makePayment="makePayment" :price="game.price">
                </base-form>
            </div>
        </div>
    </div>
</template>

<script>
import {VueperSlide, VueperSlides} from 'vueperslides'
import 'vueperslides/dist/vueperslides.css'
import GameButton from "@/components/ui/GameButton.vue";
import BaseForm from "@/components/ui/BaseForm.vue";
import BaseHeader from "@/components/ui/BaseHeader.vue";

export default {
    components: {GameButton, VueperSlides, VueperSlide, BaseForm, BaseHeader},
    props: ['id'],
    computed: {
        game() {
            return this.$store.getters['games/game'];
        },
        slides() {
            const game = this.$store.getters['games/game'];
            if (game && game.images.length) {
                return game.images
            }
        }
    },
    data() {
        return {
            email: ''
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
        async makePayment(email) {
            const response = await fetch('/api/orders',
                {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        "user_email": email,
                        "game_id": this.id,
                    })
                });

            if (!response.ok) {
                throw new Error(responseData.message || 'Failed to fetch games.');
            }
            const responseData = await response.json();
            window.location.href = `/payment/${this.id}/${responseData.id}`
        }
    },
    created() {
        this.loadGameInfo()
    }
}
</script>
<style scoped>

.container {
    margin-top: 1rem;
    margin-bottom: 1rem;
    overflow-y: auto;
}

.buy-form {

}

.main {
    //margin-top: 2rem;
    display: flex;
    justify-content: space-around;
}

.vueperslide--loading .vueperslide__content-wrapper {
    display: none !important;
}

.header {
    border-bottom: 2px solid yellow;
    border-top: 2px solid yellow;
    margin: 2rem 2rem 0.5rem 2rem;
}

.slider {
    width: 48rem;
    margin: 0 0 0.5rem 0rem;
}

.slide {
    background: no-repeat;
    background-size: cover;
}

</style>
