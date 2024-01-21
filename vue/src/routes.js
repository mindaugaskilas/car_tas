const CarList = () => import('./components/cars/List.vue')
const CarCreate = () => import('./components/cars/Create.vue')
const CarEdit = () => import('./components/cars/Edit.vue')
const CarBrands = () => import('./components/brands/List.vue')
const BrandCreate = () => import('./components/brands/Create.vue')
const BrandEdit = () => import('./components/brands/Edit.vue')
const CarModels = () => import('./components/models/List.vue')
const ModelEdit = () => import('./components/models/Edit.vue')
const ModelCreate = () => import('./components/models/Create.vue')

export const routes = [
    { name: 'index', path: '/' },
    { name: 'cars', path: '/cars', component: CarList },
    { name: 'carCreate', path: '/cars', component: CarCreate },
    { name: 'carEdit', path: '/cars/:id', component: CarEdit },
    { name: 'carBrands', path: '/brands', component: CarBrands },
    { name: 'brandCreate', path: '/brands', component: BrandCreate },
    { name: 'brandEdit', path: '/brand/:id', component: BrandEdit },
    { name: 'carModels', path: '/models', component: CarModels },
    { name: 'modelEdit', path: '/model/:id', component: ModelEdit },
    { name: 'modelCreate', path: '/model', component: ModelCreate },
]
