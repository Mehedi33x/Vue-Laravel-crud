<template>
    <div class="mt-2">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <router-link :to="{ name: 'home' }" class="nav-link">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'student_form' }" class="nav-link">Form</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'student_list' }" class="nav-link">Student List</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'product_list' }" class="nav-link">Product List</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name: 'user_list' }" class="nav-link">User List</router-link>
                    </li>
                </ul>

            </div>
        </nav>
    </div>
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
