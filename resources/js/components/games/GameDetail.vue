<template>
    <section>
        <base-card>
            <div> {{ title }} </div>
            <div> {{ price }} </div>
            <div></div>
        </base-card>
    </section>
</template>

<script>
export default {
    props: ['title', 'price'],
}

</script>

<style scoped>
section {
    display: grid;
}
</style>
