import Index from './Pages/Index.vue';
import Create from './Pages/Create.vue';
import Edit from './Pages/Show.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Index
    },
    {
        name: 'create',
        path: '/create',
        component: Create
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: Edit
    }
];
