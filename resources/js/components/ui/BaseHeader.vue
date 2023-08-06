<template>
    <div class="container">
        <div class="title">
            {{ title }}
        </div>
        <div class="about">
            {{ description }}
        </div>
    </div>
</template>

<script>
export default {
    props: ['title', 'description']
}
</script>

<style scoped>

.container {
    color:#edf2f7;
    display: grid;
    grid-template-columns: 0.5fr 1fr;
    grid-template-rows: 1fr;
    max-height: 8rem;
}

.title {
    font-size: 2rem;
    color: tomato;
}

.about {
    color: #ffa300;
    justify-content: center;
    overflow-y: auto;
}

</style>
