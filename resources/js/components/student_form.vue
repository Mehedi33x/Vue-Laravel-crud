<template>
    <h1 style="text-align: center">Student Info</h1>
    <hr />
    <div id="student_data" class="mx- my-3">
        <form
            id="form"
            @submit.prevent="studentData"
            enctype="multipart/form-data"
        >
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Name</label>
                    <input
                        v-model="student_info.name"
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        placeholder="Name"
                    />
                </div>
                <div class="form-group col-md-6">
                    <label for="">Email</label>
                    <input
                        name="email"
                        v-model="student_info.email"
                        type="email"
                        class="form-control"
                        id="email"
                        placeholder="Email"
                    />
                </div>
                <div class="form-group col-md-6">
                    <label for="">Contact</label>
                    <input
                        v-model="student_info.contact"
                        type="tel"
                        class="form-control"
                        id="contact"
                        name="contact"
                        placeholder="Contact"
                    />
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label><br />
                <textarea
                    v-model="student_info.address"
                    name=""
                    id="address"
                    class="form-control"
                    cols="30"
                    rows="10"
                ></textarea>
            </div>
            <div class="form-group">
                <label for="">Birthday</label><br />
                <input
                    v-model="student_info.dob"
                    type="date"
                    id="dob"
                    class="form-control"
                    name="dob"
                />
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="dept">Department</label>
                    <select
                        v-model="student_info.dept"
                        id="dept"
                        class="form-control"
                    >
                        <option value="cse">CSE</option>
                        <option value="ce">CE</option>
                        <option value="ag">AG</option>
                    </select>
                </div>
            </div>
            <label for="">Gender:</label>

            <div class="form-group">
                <div class="form-check">
                    <input
                        v-model="student_info.gender"
                        class="form-check-input"
                        type="radio"
                        name="gender"
                        id="gender"
                        value="male"
                        checked
                    />
                    <label class="form-check-label" for=""> Male </label>
                </div>
                <div class="form-check">
                    <input
                        v-model="student_info.gender"
                        class="form-check-input"
                        type="radio"
                        name="gender"
                        id="gender"
                        value="female"
                    />
                    <label class="form-check-label" for="gridRadios2">
                        Female
                    </label>
                </div>
            </div>
            <div>
                <label for="">Image</label>
                <input
                    @change="onFileSelected"
                    name="image"
                    type="file"
                    class="form-control"
                    accept="image/*"
                />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
console.log("helo");
import axios from "axios";
export default {
    name: "Student_Data",
    data() {
        return {
            student_info: {
                name: "",
                email: "",
                contact: "",
                address: "",
                gender: "",
                dob: "",
                dept: "",
                image: "",
            },
        };
    },

    methods: {
        // onFileSelected(event) {
        //     this.image = event.target.files[0];
        //     console.log(this.image);
        // },
        studentData() {
            // console.log("heki");
            var form = document.getElementById("form");
            var formData = new FormData(form);
            axios
                .post("VueLaravelTest/public/student-save", formData)
                .then((res) => {

                });
        },
    },
};
</script>
