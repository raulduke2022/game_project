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
        isLoading(newVal) {
            if (newVal) {
                this.isFirstLoad = false;
            }
        },
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
                window.scrollTo({
                    left: 0,
                    top: document.body.scrollHeight,
                    behavior: "smooth"
                });
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
        "header"
        "main"
        "footer";
    grid-template-rows: auto 1fr auto;
    height: 100vh
}


body {
    z-index: -1;
    margin: 0;
    font-family: 'Roboto', sans-serif;
    font-weight: 700;
    padding: 0;
    box-sizing: border-box;
}

header {
    background-image: url("back.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-size: 100%;
    grid-area: header;
    background-color: black;
    color: #fff;
    text-align: center;
    height: 30rem;
    border-bottom: green 2px solid;
}

main {
    background-color: black;
    grid-area: main;
    padding: 20px;
}

footer {
    border-top: green 2px solid;
    grid-area: footer;
    color: #fff;
    padding: 20px;
    text-align: center;
    background-color: #ffa300;
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

a { text-decoration: none; }


</style>
