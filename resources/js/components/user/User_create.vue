<template>
    <div>
        <div class="container mt-3">
            <h2 style="text-align: center">User Form</h2>
            <hr>
            <form action="" method="" id="user_create" @submit.prevent="userCreate">

                    <div class="form-group col-md-6">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" v-model="info.name">
                    <small v-if="errors.name" class="text-danger">{{ errors.name }}</small>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email"
                            v-model="info.email">
                        <small v-if="errors.email" class="text-danger">{{ errors.email }}</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" id="" placeholder="Password"
                            v-model="info.password">
                        <small v-if="errors.email" class="text-danger">{{ errors.password }}</small>

                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gender">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="male" checked
                                v-model="info.gender">
                            <label class="form-check-label" for="gridRadios1">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="female"
                                v-model="info.gender">
                            <label class="form-check-label" for="gridRadios2">
                                Female
                            </label>
                        </div>
                    </div>
                </div>
                <br>

                <strong>Skills:</strong>
                <div v-for="(item, index) in skills" :key="index">

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="skills[]" id="inlineCheckbox1"
                            v-model="item.check" :value="item.check" :checked="item.check">
                        <label class="form-check-label" for="inlineCheckbox1">{{ item.name }}</label>
                        <small v-if="errors.skills" class="text-danger">{{ errors.skills }}</small>

                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="image">Image</label>
                    <input class="form-control-file" type="file" name="image" />
                </div> <br>
                <button type="submit" class="btn btn-success">Submit</button>

            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: 'User_Create',

    data() {
        return {
            skills: [
                { name: 'php', check: false },
                { name: 'js', check: false },
                { name: 'vue', check: false },
                { name: 'react', check: false },
                { name: 'python', check: false },
            ],


            info: {
                name: '',
                email: '',
                password: '',
                gender: '',
                // skill: [],
            },

            errors: {},

        }
    },

    // validators: {
    //     "errors.name": function (value = '' || null) {
    //         return this.Validator.value(value).required("Name is required");
    //     },
    //     "errors.email": function (value = '' || null) {
    //         return this.Validator.value(value).required("Email is required").email();
    //     },
    //     "errors.password": function (value = '' || null) {
    //         return this.Validator.value(value).required("Password is required");
    //     },
    //     "errors.gender": function (value = '' || null) {
    //         return this.Validator.value(value).required("Gender is required").email();
    //     }
    // },

    methods: {
        userCreate() {
            var user_create = document.getElementById('user_create');
            const user_data = new FormData(user_create);
            //////////////////


            if (this.validate() == false) {
                return false;
            }

            user_data.append('skills', JSON.stringify(this.skills));
            try {
                axios
                    .post("VueLaravelTest/public/user-create", user_data)
                    .then((res) => {

                    });
                this.$router.push({ name: 'user_list' });
            } catch (error) {
                this.errors = error?.response?.data?.errors;
            }

        },

        validate() {
            var errcount = 0;
            if (this.info.name == '' || null) {
                errcount += 1
                this.errors.name = 'Name is required'
            }
            if (this.info.email == '') {
                errcount += 1
                this.errors.email = 'Email is required'
            }
            if (this.info.password == '' || null) {
                errcount += 1
                this.errors.password = 'Password is required'
            }
            if (this.skills.name == false) {
                errcount += 1
                this.errors.skills = 'Skill is required'
            }

            if (errcount > 0) {
                return false;
            }

            return true;
        },
    },


    // simple Vue Validator
    // this.$validate().then((res) => {
    //     const error = this.validation.countErrors();
    //     if (error > 0) {
    //         console.log(this.validation.allErrors);
    //     }
    // });


}
</script>



