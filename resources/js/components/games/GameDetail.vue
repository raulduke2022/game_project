<template>
    <section>
        <router-link :to="{ name: 'GamePage', params: {id: id}}">
            <game-card :title="title" :price="price" :description="description"><a href="#" class="button">Посмотреть</a>
            </game-card>
        </router-link>
    </section>
</template>

<script>
import GameCard from "@/components/ui/GameCard.vue";

export default {
    components: {GameCard},
    props: ['id', 'title', 'price', 'description'],
}

</script>

<style scoped>

</style>
