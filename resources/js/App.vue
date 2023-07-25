<template>
    <base-spinner v-if="isLoading" class="spinner"></base-spinner>
    <div class="container" v-show="!isLoading">
        <header v-if="!isFirstLoad">
        </header>
        <main>
            <router-view @scrollMe="scrollToBottom"></router-view>
        </main>
        <footer class="footer-container" v-if="!isFirstLoad">
            <router-link :to="{name: 'Game'}" class="footer-link">О нас</router-link>
            <router-link :to="{name: 'Game'}" class="footer-link">Политика конфиденциальности</router-link>
        </footer>
    </div>
</template>

<script>
export default {
    watch: {
        isLoading(newVal){
            if (newVal){
                this.isFirstLoad = false;
            }
        }
    },
    data() {
        return {
            isFirstLoad: true,
        }
    },
    computed: {
        isLoading() {
            return this.$store.getters.isLoading;
        },
    },
    methods: {
        scrollToBottom() {
            this.$nextTick(() => {
                window.scrollTo({left: 0, top: document.body.scrollHeight, behavior: "smooth"});
            })
        },
    }
}
</script>

<style>

@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;1,900&display=swap');


.spinner {
    height: 100vh;
}

.container {
    display: grid;
    grid-template-areas:
        "header header header"
        "main main main"
        "footer footer footer";
    grid-template-columns: 300px 1fr 1fr;
    grid-template-rows: auto;
    min-height: 100vh;
    row-gap: 4px;
}

html {
    height: 100%;
}

body {
    height: 100%;
    margin: 0;
    font-family: 'Roboto', sans-serif;
    font-weight: 700;
}

header {
    height: 30rem;
    grid-area: header;
    background-color: black;
    color: #fff;
    text-align: center;
    box-shadow: 4px 4px 4px 4px greenyellow;
    box-sizing: border-box;
}

main {
    background-color: snow;
    grid-area: main;
    padding: 20px;
}

footer {
    grid-area: footer;
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
    max-height: 3rem;
}

.footer-container {
    display: flex;
    align-items: center;
    justify-content: center;
}

.footer-link {
    padding-right: 20px;
    text-decoration: none;
    color: white
}

</style>
