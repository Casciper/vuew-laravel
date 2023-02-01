import {createRouter, createWebHistory}  from 'vue-router'

const routes = [
    {
        path: '/',
        component: () => import('./components/Home.vue'),
        name: 'home.index',
        meta: {
            enterClass: 'animate__animated animate__fadeInRight',
            leaveClass: 'animate__animated animate__fadeOutLeft'
        }
    },
    {
        path: '/people',
        component: () => import('./components/Person/Index.vue'),
        name: 'person.index',
        meta: {
            enterClass: 'animate__animated animate__fadeInRight',
            leaveClass: 'animate__animated animate__fadeOutLeft'
        }
    },
    {
        path: '/people/create',
        component: () => import('./components/Person/Create.vue'),
        name: 'person.create',
        meta: {
            enterClass: 'animate__animated animate__fadeInRight',
            leaveClass: 'animate__animated animate__fadeOutLeft'
        }

    },
    {
        path: '/people/:id/edit',
        component: () => import('./components/Person/Edit.vue'),
        name: 'person.edit',
        meta: {
            enterClass: 'animate__animated animate__fadeInRight',
            leaveClass: 'animate__animated animate__fadeOutLeft'
        }
    },
    {
        path: '/people/:id',
        component: () => import('./components/Person/Show.vue'),
        name: 'person.show',
        meta: {
            enterClass: 'animate__animated animate__fadeInRight',
            leaveClass: 'animate__animated animate__fadeOutLeft'
        }
    },
]

const router = createRouter({
    history:createWebHistory(),
    routes,
})

export default router
