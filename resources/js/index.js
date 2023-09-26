import {createWebHistory, createRouter} from "vue-router";

import Home from './components/Home.vue';
import RecipeCreateForm from './components/RecipeCreateForm.vue'
import ResipeFullDescription from './components/ResipeFullDescription.vue';
import Register from './components/Register.vue';
import Login from './components/Login.vue';
import RecipeSlider from './components/RecipeSlider.vue';

import ResipeCard from './components/ResipeCard';
import Addresipe from './components/Addresipe';
import Editresipe from './components/Editresipe';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'about',
        path: '/about',
        component: About
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'recipeslider',
        path: '/recipeslider',
        component: RecipeSlider
    },
    {
        name: 'resipecard',
        path: '/resipecard',
        component: ResipeCard
    },
    {
        name: 'addresipe',
        path: '/resipes/add',
        component: Addresipe
    },
    {
        name: 'editresipe',
        path: '/resipes/edit/:id',
        component: Editresipe
    },
    {
        name: 'resipefulldescription',
        path: '/resipefulldescription',
        component: ResipeFullDescription
    },
    {
        name: 'recipecreateform',
        path: '/recipecreateform',
        component: RecipeCreateForm
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
