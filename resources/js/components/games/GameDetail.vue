<template>
    <section>
        <base-card>
            <h2> {{ title }}</h2>
            <p>
                {{ price }}
            </p>
        </base-card>
    </section>
</template>

<script>
export default {
    props: ['title', 'price'],
    data() {
        return {}
    }
}

</script>

<style scoped>
section {
    display: grid;
    //grid-template-columns: auto;
}
</style>
