<template>
    <div class="container">
        <header>Интернет-магазин! Ключи для игр</header>
        <div class="menu">
            <div>
                Подробнее
            </div>
        </div>
        <div class="sidebar">
            <router-link :to="{name: 'Game'}" class="link">Главное</router-link>
            <router-link :to="{name: 'Game'}" class="link">Поддержка</router-link>
            <router-link :to="{name: 'Game'}" class="link">Как купить</router-link>
            <router-link :to="{name: 'Game'}" class="link">Отзывы</router-link>
            <router-link :to="{name: 'Game'}" class="link">Гарантии</router-link>
            <router-link :to="{name: 'Game'}" class="link">О нас</router-link>
        </div>
        <main>
            <router-view></router-view>
        </main>
        <footer class="footer-container">
            <router-link :to="{name: 'Game'}" class="footer-link">О нас</router-link>
            <router-link :to="{name: 'Game'}" class="footer-link">Политика конфиденциальности</router-link>
        </footer>
    </div>
</template>

<script>
</script>

<style>

@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');

.container {
    display: grid;
    grid-template-areas:
        "menu header header"
        "sidebar main main"
        "footer footer footer";
    grid-template-columns: 200px 1fr 1fr;
    grid-template-rows: auto 1fr auto;
    min-height: 100vh;
}

body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    font-weight: 700;
}

header {
    grid-area: header;
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
}

.sidebar {
    grid-area: sidebar;
    background-color: #f0f0f0;
    padding: 20px;
//display: none
}

.link {
    margin-bottom: 30px;
    display: block;
    text-decoration: none;
}

main {
    grid-area: main;
    padding: 20px;
}

footer {
    grid-area: footer;
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
}

.menu {
    background-color: #cbd5e0;
    grid-area: menu;
    margin: 0;
    padding-inline-start: 0;
}

.menu div {
    display: flex;
    color: green;
    justify-content: center;
    padding-top: 20px;
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
