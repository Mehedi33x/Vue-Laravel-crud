import { createWebHistory, createRouter } from "vue-router";
// import //compoName// from //path//
import Home from "./components/Home.vue";
import text from "./components/text.vue";
import Student_Data from "./components/student_form.vue";
import Student_List from "./components/student_list.vue";

const routes = [
    {
        name: "home", //rndm name
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
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;