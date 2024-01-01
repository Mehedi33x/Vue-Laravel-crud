<template>
    <div>
        <div class="container mt-3">
            <h2 style="text-align: center">User Form</h2>
            <hr>
            <form action="" method="" id="user_create" @submit.prevent="userCreate">

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    <small v-if="errors.name" class="text-danger">{{ errors.name[0] }}</small>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                        <small v-if="errors.email" class="text-danger">{{ errors.email[0] }}</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" id="" placeholder="Password">
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gender">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="male" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
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


            // image_file: null,
            // info: {
            //     name: '',
            //     email: '',
            //     password: '',
            //     gender: '',
            //     image: null,
            //     skill: [],
            // },

            errors: {},

        }
    },


    methods: {

        userCreate() {
            var user_create = document.getElementById('user_create');
            const user_data = new FormData(user_create);
            //////////////////
            user_data.append('skills', JSON.stringify(this.skills));
            // this.info.skill = JSON.stringify(this.info.skill)
            try {
                axios
                    .post("VueLaravelTest/public/user-create", user_data)
                    .then((res) => {

                    });
                this.$router.push({ name: 'user_list' });
            } catch (error) {
                this.errors = error?.response?.data?.errors;
            }
        }
    },
}
</script>



