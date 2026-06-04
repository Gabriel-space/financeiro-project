import { createRouter, createWebHistory } from 'vue-router';

import Login from '../pages/Login.vue';
import Dashboard from '../pages/Dashboard.vue';
import Receitas from '../pages/Receitas.vue';
import Despesas from '../pages/Despesas.vue';
import Categorias from '../pages/Categorias.vue';

const routes = [
    {
        path: '/',
        name: 'login',
        component: Login,
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
    },
    {
        path: '/receitas',
        name: 'receitas',
        component: Receitas,
    },
    {
        path: '/despesas',
        name: 'despesas',
        component: Despesas,
    },
    {
        path: '/categorias',
        name: 'categorias',
        component: Categorias,
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
