<template>
    <section>
        <router-link :to="{ name: 'GamePage', params: {id: id}}">
            <game-card></game-card>
        </router-link>
    </section>
</template>

<script>
import GameCard from "@/components/ui/GameCard.vue";

export default {
    components: {GameCard},
    props: ['id', 'title', 'price'],
}

</script>

<style scoped>

</style>
