<template>
    <div class="container">
        <header class="header"></header>
        <main class="main">
            <div>{{ id }}</div>
        </main>
        <div class="carousel">
        </div>
    </div>
</template>

<script>
export default {
    props: ['id'],
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
    display: grid;
    grid-template-areas:
        "header"
        "main-page";
    grid-template-rows: 10rem 1fr;
}

.header {
    grid-area: header;
    background-color: red;
}

.main {
    grid-area: main-page;
    color: white;
    height: 5rem;
    background-color: white;
}

div {
    height: 5rem;
    color: white
}

.slide {
    height: 15rem;
    background-image: url("../back.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    width: 20rem;
}

.carousel {
    width: 80%;
}

</style>
