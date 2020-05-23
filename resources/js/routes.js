import CategoryList from './components/category/Category';
import ProductList from './components/product/Product';
import UserList from './components/user/User';
import CreateCategory from './components/category/CreateCategory';
import EditCategory from './components/category/EditCategory';
import UpdateCategory from './components/category/EditCategory';
import ShowCategory from './components/category/ShowCategory';

const routes = [
    {path:'/product', name: 'productList', component: ProductList},
    {path: '/', name: 'categoryList', component: CategoryList},
    {path: '/user', name: 'userList', component: UserList},
    {path: '/category/show/:id', name: 'showCategory', component: ShowCategory},
    {path: '/category/create', name: 'createCategory', component: CreateCategory},
    {path: '/category/:id/edit', name: 'editCategory', component: EditCategory, meta: {mode: 'edit'}},
    {path: '/category/:id/update', name: 'updateCategory', component: UpdateCategory}
];

export default routes;
