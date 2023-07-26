<template>
    <section>
        <router-link to="/market/games/1">
            <base-card :title="title" :price="price">
            </base-card>
        </router-link>
    </section>
</template>

<script>
import BaseButton from "@/components/ui/BaseButton.vue";

export default {
    components: {BaseButton},
    props: ['id', 'title', 'price'],
}

</script>

<style scoped>

</style>
