// resources/js/router.js (CONTOH)

import { createRouter, createWebHistory } from 'vue-router';
import LandingPage from './Pages/LandingPage.vue';
import AdminDashboard from './Pages/Admin/Dashboard.vue';
import AdminUsers from './Pages/Admin/Users/Index.vue';
import AdminStudents from './Pages/Admin/Students/Index.vue';
import AdminBerita from './Pages/Admin/Berita/Index.vue';
// import LoginPage from './Pages/LoginPage.vue'; (Nanti)

const routes = [
    {
        path: '/',
        name: 'landing',
        component: LandingPage 
    },
    {
        path: '/admin',
        name: 'admin.dashboard',
        component: AdminDashboard,
    },
    {
        path: '/admin/users',
        name: 'admin.users',
        component: AdminUsers,
    },
    {
        path: '/admin/students',
        name: 'admin.students',
        component: AdminStudents,
    },
    {
        path: '/admin/berita',
        name: 'admin.berita',
        component: AdminBerita,
    },
    // { path: '/login', component: LoginPage },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;