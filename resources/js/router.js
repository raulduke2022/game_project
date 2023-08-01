import {createRouter, createWebHistory} from 'vue-router'

const routes = [
    {
        path: '/market/games/:id',
        component: () => import('./pages/GamePage.vue',),
        props: true,
        name: 'GamePage'
    },
    {
        path: '/market',
        component: () => import('./components/games/GamesList.vue'),
        name: 'Game',
    },
    {path: '/:notFound(.*)', component: () => import('./components/NotFound.vue')}
]

const router = createRouter({
    routes,
    history: createWebHistory()
})

export default router
