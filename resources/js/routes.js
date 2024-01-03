import { createWebHistory, createRouter } from "vue-router";
// import //compoName// from //path//
import Home from "./components/Home.vue";
import text from "./components/text.vue";
import Student_Data from "./components/student_form.vue";
import Student_List from "./components/student_list.vue";
import Student_Edit from "./components/student_edit.vue";
// for products
import Product_List from "./components/products/Product_List.vue";
import Product_Create from "./components/products/Product_create.vue";
// user
import User_List from "./components/user/User_list.vue";
import User_Create from "./components/user/User_create.vue";
import User_Edit from "./components/user/User_edit.vue";

// developers list
import Developers_list from "./components/developers/Developers_list.vue";
import Developer_edit from "./components/developers/Developer_edit.vue";

// Book
// import Book_list from "./components/book/Book_list.vue";

const routes = [
    {
        name: "home", //route name
        path: "/home",
        component: Home,
    },
    {
        name: "text",
        path: "/text",
        component: text,
    },
    {
        name: "student_form",
        path: "/student_form",
        component: Student_Data,
    },
    {
        name: "student_list",
        path: "/student_list",
        component: Student_List,
    },
    {
        name: "student_edit",
        path: "/student_edit/:id",
        component: Student_Edit,
    },
    // for products
    {
        name: "product_list",
        path: "/product_list",
        component: Product_List,
    },
    {
        name: "product_create",
        path: "/product_create",
        component: Product_Create,
    },
    {
        name: "product_delete",
        path: "/product_delete/:id",
        component: Product_List,
    },
    //user
    {
        name: "user_list",
        path: "/user_list",
        component: User_List,
    },
    {
        name: "user_create",
        path: "/user_create",
        component: User_Create,
    },
    {
        name: "user_edit",
        path: "/user_edit/:id",
        component: User_Edit,
    },

    {
        name: "developers_list",
        path: "/developers_list",
        component: Developers_list,
    },
    {
        name: "developers_list",
        path: "/developers_list",
        component: Developers_list,
    },
    {
        name: "developer_edit",
        path: "/developer_edit/:id",
        component: Developer_edit,
    },

    // Book
    // {
    //     name: "book_list",
    //     path: "book_list",
    //     component: Book_list,
    // },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;
