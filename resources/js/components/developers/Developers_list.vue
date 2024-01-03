<template>
    <div>
        <div class="container">
            <Developer_create />
        </div>

        <hr>
        <div class="mx-5 my-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title" style="text-align: center">Developers List</h2>
                    <router-link to="" class="btn btn-success">+ Developers</router-link>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Age</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Skill</th>
                                <th scope="col">Address</th>
                                <th scope="col">CV</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(dev, index) in devs" :key="index">
                                <th scope="row"></th>
                                <td><img width="100"
                                        :src="'http://localhost/VueLaravelTest/public/storage/uploads/' + dev.image"
                                        srcset=""></td>
                                <td>{{ dev.name }}</td>
                                <td>{{ dev.email }}</td>
                                <td>{{ dev.contact }}</td>
                                <td>{{ dev.age }}</td>
                                <td class="text-capitalize">{{ dev.gender }}</td>
                                <div v-for="(item, index) in JSON.parse(dev.skills)" :key="index">
                                    <td>{{ item }}</td>
                                </div>
                                <td>{{ dev.address }}</td>
                                <td>
                                    <a :href="'http://localhost/VueLaravelTest/public/storage/uploads/' + dev.cv"
                                        class="btn btn-warning"> Download CV</a>
                                </td>
                                <td>
                                    <router-link :to="{
                                        name: 'developer_edit',
                                        params: { id: dev.id },
                                    }" class="btn btn-success">Edit</router-link>

                                    <button @click="deleteDev(dev.id)" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>



<script>

import axios from 'axios';
import Developer_create from "./Developer_create.vue";
import Developer_edit from "./Developer_edit.vue";

export default {
    components: { Developer_create, Developer_edit },
    name: "Developers_List",
    data() {
        return {
            devs: [],

        }
    },


    created() {
        this.allDev();

    },


    methods: {
        allDev() {
            axios
                .get("http://localhost/VueLaravelTest/public/dev-show")
                .then((response) => {
                    console.log("cah");
                    this.devs = response.data.data;

                })
                .catch((error) => {
                    console.error(error);
                });
        },



        deleteDev(id) {
            if (confirm('Do you want to delete?')) {
                axios
                    .get("VueLaravelTest/public/dev-delete/" + id)
                    .then((res) => {
                        this.allDev();
                    })
            }

        }
    }

}
</script>
