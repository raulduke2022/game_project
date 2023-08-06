<template>
    <section>
        <router-link :to="{ name: 'GamePage', params: {id: id}}">
            <game-card
                :image="images ? images.filter(image => image.is_main) : null"
                :title="title"
                :price="price"
                :introduction="introduction">
            </game-card>
        </router-link>
    </section>
</template>

<script>
import GameCard from "@/components/ui/GameCard.vue";

export default {
    components: {GameCard},
    props: ['id', 'title', 'price', 'introduction', 'images'],
}

</script>

<style scoped>

</style>
