<template>
    <div>
        <!-- <h1>User id: {{ $route.params.id }}</h1> -->
        <h1 style="text-align: center">Student List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Date of Birth</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(student, index) in list" :key="index">
                    <th scope="row">{{ student.id }}</th>
                    <td>{{ student.name }}</td>
                    <td>{{ student.email }}</td>
                    <td>{{ student.contact }}</td>
                    <td>{{ student.gender }}</td>
                    <td>{{ student.dob }}</td>

                    <td>
                        <div @click.prevent="edit">
                            <router-link
                                :to="{
                                    name: 'student_edit',
                                    params: { id: student.id },
                                }"
                                >Edit</router-link
                            >
                        </div>

                        <!-- <router-link :to="">Delete</router-link> -->
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Student_List",

    data() {
        return {
            list: [],
            student_id: "",
        };
    },
    created() {
        this.studentList();
        // this.edit();
    },
    methods: {
        studentList() {
            axios
                .get("VueLaravelTest/public/student-show")
                .then((response) => {
                    this.list = response.data;
                    // console.log(this.list);
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        edit() {
            this.student_id = this.$route.params.id;
            axios
                .get(
                    "http://localhost/VueLaravelTest/public/student-edit/" +
                        this.student_id
                )
                .then((res) => {});
            // console.log(this.student_id);
        },
    },
};
</script>
