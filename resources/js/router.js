import {createRouter, createWebHistory} from 'vue-router'

const routes = [
    {
        path: '/',
        name: 'Game',
        component: () => import('./components/games/GamesList.vue')
    },
    {path: '/:notFound(.*)', component: () => import('./components/NotFound.vue')}
]

const router = createRouter({
    routes,
    history: createWebHistory()
})

export default router
