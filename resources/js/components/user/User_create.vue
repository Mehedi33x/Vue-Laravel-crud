<template>
    <div>
        <div class="container mt-3">
            <h2 style="text-align: center">User Form</h2>
            <hr>
            <form action="" method="" id="user_create" @submit.prevent="userCreate">

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" v-bind="name" id="name" name="name" placeholder="Name">

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" name="email" v-bind="email" class="form-control" id="inputEmail4"
                            placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" name="password" v-bind="password" class="form-control" id="inputPassword4"
                            placeholder="Password">
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gender">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" v-bind="gender" name="gender" id="gender"
                                value="male" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" v-bind="gender" name="gender" id="gender"
                                value="female">
                            <label class="form-check-label" for="gridRadios2">
                                Female
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-check form-check-inline">
                    <p>Skills</p>

                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                    <label class="form-check-label" for="inlineCheckbox1">JS</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">PHP</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">Python</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">PHP</label>
                </div>

                <!-- <div class="form-group col-md-4">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="" name="image">
                </div> <br> -->
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
            errors: {},
            name: '',
            email: '',
            password: '',

        }
    },


    methods: {
        userCreate() {

            // console.log("k");
            var user_create = document.getElementById('user_create');
            // var products_data = new ProductData(product_create);

            axios
                .post("VueLaravelTest/public/user-create", user_create)
                .then((res) => {

                });
            this.$router.push({ name: 'user_list' });

        }
    },
}
</script>
