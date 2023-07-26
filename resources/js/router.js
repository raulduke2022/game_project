import { createRouter, createWebHistory } from 'vue-router'

const routes = [
    {
        path: '/market',
        name: 'Game',
        component: () => import('./components/games/GamesList.vue'),
        children: [
            {
                path: '/games/:id',
                component: () => import('./pages/GamePage.vue'),
                name: 'GamePage'
            }
        ]
    },
    { path: '/:notFound(.*)', component: () => import('./components/NotFound.vue') }
]

const router = createRouter({
    routes,
    history: createWebHistory()
})

export default router
