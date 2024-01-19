const CarList = () => import('./components/cars/List.vue')
const CarCreate = () => import('./components/cars/Create.vue')
const CarBrands = () => import('./components/brands/List.vue')
const CarModels = () => import('./components/models/List.vue')
// const CategoryCreate = () => import('./components/category/Add.vue' /* webpackChunkName: "resource/js/components/category/add" */)
// const CategoryEdit = () => import('./components/category/Edit.vue' /* webpackChunkName: "resource/js/components/category/edit" */)

export const routes = [
    { name: 'index', path: '/' },
    { name: 'cars', path: '/cars', component: CarList },
    { name: 'carCreate', path: '/cars', component: CarCreate },
    { name: 'carBrands', path: '/brands', component: CarBrands },
    { name: 'carModels', path: '/models', component: CarModels },
    // {
    //     name: 'categoryEdit',
    //     path: '/category/:id/edit',
    //     component: CategoryEdit
    // },
    // {
    //     name: 'categoryAdd',
    //     path: '/category/add',
    //     component: CategoryCreate
    // }
]
