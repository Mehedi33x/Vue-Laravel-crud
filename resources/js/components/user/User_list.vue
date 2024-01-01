<template>
    <div>
        <div class="mx-5 my-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title" style="text-align: center">User List</h2>
                    <router-link :to="{ name: 'user_create' }" class="btn btn-success">+ User</router-link>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Skill</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, index) in users" :key="index">
                                <th scope="row">{{ user.id }}</th>
                                <td><img width="100"
                                        :src="'http://localhost/VueLaravelTest/public/storage/uploads/' + user.image"
                                        srcset="">
                                </td>
                                <td>{{ user.name }}</td>
                                <td>{{ user.email }}</td>
                                <td class="text-capitalize">{{ user.gender }}</td>
                                <td v-for="(item, index) in JSON.parse(user.skill) " :key="index">
                                    <p>{{ item.name }}</p>
                                </td>
                                <!-- <td>{{ user.skill }}</td> -->
                                <td>
                                    <router-link :to="{
                                        name: 'user_edit',
                                        params: { id: user.id },
                                    }" class="btn btn-success">Edit</router-link>

                                    <button @click="deleteUser(user.id)" class="btn btn-danger">Delete</button>
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

export default {
    name: 'User_List',

    data() {
        return {
            users: [],
            skills: '',
            user_id: '',
        }
    },
    mounted() {
        this.allUsers();
        // this.skills();
    },
    methods: {


        allUsers() {
            axios
                .get("VueLaravelTest/public/user-show")
                .then((response) => {
                    // console.log(response.data);
                    this.users = response.data;

                })
                .catch((error) => {
                    console.error(error);
                });
        },
        skills() {
            this.skills = this.users.skill.toString();
            console.log(this.skills);
        }
        ,
        deleteUser(id) {
            console.log(id);

            if (confirm('Do you want to delete?')) {
                axios
                    .get("VueLaravelTest/public/user-delete/" + id)
                    .then((res) => {
                        this.allUsers();
                    })
            }

        }
    }
}
</script>


