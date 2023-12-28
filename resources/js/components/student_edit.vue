<template>
    <h1 style="text-align: center">Student Info</h1>
    <hr />
    <div id="student_data" class="mx- my-3">
        <form id="form" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Name</label>
                    <input v-model="student_info.name" type="text" class="form-control" id="name" name="name"
                        placeholder="Name" />
                </div>
                <div class="form-group col-md-6">
                    <label for="">Email</label>
                    <input name="email" v-model="student_info.email" type="email" class="form-control" id="email"
                        placeholder="Email" />
                </div>
                <div class="form-group col-md-6">
                    <label for="">Contact</label>
                    <input v-model="student_info.contact" type="tel" class="form-control" id="contact" name="contact"
                        placeholder="Contact" />
                </div>
            </div>

            <div class="form-group">
                <label for="">Birthday</label><br />
                <input v-model="student_info.dob" type="date" id="dob" class="form-control" name="dob" />
            </div>

            <label for="">Gender:</label>

            <div class="form-group">
                <div class="form-check">
                    <input v-model="student_info.gender" class="form-check-input" type="radio" name="gender" id="gender"
                        value="male" checked />
                    <label class="form-check-label" for=""> Male </label>
                </div>
                <div class="form-check">
                    <input v-model="student_info.gender" class="form-check-input" type="radio" name="gender" id="gender"
                        value="female" />
                    <label class="form-check-label" for="gridRadios2">
                        Female
                    </label>
                </div>
            </div>

            <button type="submit" @click.prevent="studentUpdate" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>
<script>
import axios from "axios";

export default {
    name: "Student_Edit",

    data() {
        return {
            student_info: [],
            // student_show: [],

        };
    },

    mounted() {
        this.studentData(this.$route.params.id);
        // console.log(this.$route.params.id);
        // this.studentUpdate(this.$route.params.id)
    },

    methods: {
        studentData(studentId) {
            axios
                .get(
                    "http://localhost/VueLaravelTest/public/student-edit/" + studentId
                )
                .then((res) => {
                    this.student_info = res.data;
                    // console.log(this.student_info);
                });
        },

        studentUpdate() {
            // console.log('ok');
            var form = document.getElementById('form');
            console.log(form);
            var update = new FormData(form);
            axios.post('http://localhost/VueLaravelTest/public/student-update/' + this.student_info.id, update).then((res) => {
                console.log(res);
            })
        },
    },
};
</script>
