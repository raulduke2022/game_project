<template>
    <base-spinner v-if="isLoading" class="spinner"></base-spinner>
    <div class="container" v-show="!isLoading">
        <nav-bar></nav-bar>
        <main>
            <router-view @scrollMe="scrollToBottom"></router-view>
        </main>
        <footer class="footer-container">
            <router-link :to="{name: 'Game'}" class="footer-link">О нас</router-link>
            <router-link :to="{name: 'Game'}" class="footer-link">Правила</router-link>
        </footer>
    </div>
</template>

<script>
import Navbar from "@/components/ui/Navbar.vue";

export default {
    components: {Navbar},
    computed: {
        isLoading() {
            return this.$store.getters.isLoading;
        },
    },
    methods: {
        scrollToBottom() {
            const height = this.$store.getters.scrollHeight;
            this.$nextTick(() => {
                window.scrollTo({
                    left: 0,
                    top: height,
                });
            })
        },
        async getCurr() {
            const response = await fetch('/api/curr');
            const responseData = await response.json();

            if (!response.ok) {
                throw new Error(responseData.message || 'Failed to fetch curr data.');
            }
            console.log(responseData);
            this.$store.dispatch('updateCurr', responseData || 'RUB')
        },
    },
    created() {
        this.getCurr()
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
    margin: 0;
    font-family: 'Roboto', sans-serif;
    font-weight: 700;
    padding: 0;
    box-sizing: border-box;
    line-height: 1.5;
}


main {
//background: linear-gradient(to right, #434343 0%, black 100%); background-color: black;
}


footer {
    border-top: green 2px solid;
    grid-area: footer;
    color: #fff;
    padding: 0.9rem;
    text-align: center;
    background-color: orange;
}

.footer-container {
    display: flex;
    align-items: center;
    justify-content: center;
}

.footer-link {
    padding-right: 20px;
    text-decoration: none;
    color: black
}

a {
    text-decoration: none;
}

/* Works on Firefox */
* {
    scrollbar-width: thin;
    scrollbar-color: blue orange;
}

/* Works on Chrome, Edge, and Safari */
*::-webkit-scrollbar {
    width: 10px;
}

*::-webkit-scrollbar-track {
    background: black;
}

*::-webkit-scrollbar-thumb {
    background-color: #5186ff;
    border: 3px solid black;
}

</style>
