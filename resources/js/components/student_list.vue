<template>
    <div>
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
                    <th scope="row">1</th>
                    <td>{{ student.name }}</td>
                    <td>{{ student.email }}</td>
                    <td>{{ student.contact }}</td>
                    <td>{{ student.gender }}</td>
                    <td>{{ student.dob }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "Student_List",

    data() {
        return {
            list: [],
        };
    },
    created() {
        this.studentList();
    },
    methods: {
        studentList() {
            axios
                .get("VueLaravelTest/public/student-show")
                .then((response) => {
                    this.list = response.data;
                    console.log(this.list);
                })
                .catch((error) => {
                    console.error(error);
                });
        },
    },
};
</script>
