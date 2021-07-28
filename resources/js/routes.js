
let Home=require('./components/Home.vue').default;
let Login=require('./components/auth/Login.vue').default;
let Register=require('./components/auth/Register.vue').default;
let Forget=require('./components/auth/Forget.vue').default;
let Logout=require('./components/auth/Logout.vue').default;

let AddEmployee=require('./components/employee/Create.vue').default;
let Employee=require('./components/employee/Index.vue').default;
let EditEmployee=require('./components/employee/Edit.vue').default;

let AddSupplier=require('./components/supplier/Create.vue').default;
let Supplier=require('./components/supplier/Index.vue').default;
let EditSupplier=require('./components/supplier/Edit.vue').default;

let AddCategory=require('./components/category/Create.vue').default;
let Category=require('./components/category/Index.vue').default;
let EditCategory=require('./components/category/Edit.vue').default;

let AddProduct=require('./components/product/Create.vue').default;
let Product=require('./components/product/Index.vue').default;
let EditProduct=require('./components/product/Edit.vue').default;

export const routes = [
    { path: '/', component: Login, name:'login' },
    { path: '/register', component: Register, name:'register' },
    { path: '/forget', component: Forget, name:'forget' },
    { path: '/logout', component: Logout, name:'logout' },
    { path: '/home', component: Home, name:'home' },

    { path: '/add-employee', component: AddEmployee, name:'add-employee' },
    { path: '/employee', component: Employee, name:'employee' },
    { path: '/edit-employee/:id', component: EditEmployee, name:'edit-employee' },

    { path: '/add-supplier', component: AddSupplier, name:'add-supplier' },
    { path: '/supplier', component: Supplier, name:'supplier' },
    { path: '/edit-supplier/:id', component: EditSupplier, name:'edit-supplier' },

    { path: '/add-category', component: AddCategory, name:'add-category' },
    { path: '/category', component: Category, name:'category' },
    { path: '/edit-category/:id', component: EditCategory, name:'edit-category' },

    { path: '/add-product', component: AddProduct, name:'add-product' },
    { path: '/product', component: Product, name:'product' },
    { path: '/edit-product/:id', component: EditProduct, name:'edit-product' },

];