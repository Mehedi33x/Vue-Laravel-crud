<template>
    <h1>Hello</h1>
    <router-link :to="{ name: 'home' }">Home</router-link><br />
    <router-link :to="{ name: 'student_form' }">Form</router-link><br />
    <router-link :to="{ name: 'text' }">Text</router-link> <br />
    <router-link :to="{name:'student_list'}">Student List</router-link>
    <router-view></router-view>
</template>
<script>
export default {
    name: "App", //component name
    data() {
        return {
            name: "Js",
            work: "Dev",
        };
    },

    provide() {
        return {
            name: this.name,
            activity: this.work,
        };
    },
};
</script>
