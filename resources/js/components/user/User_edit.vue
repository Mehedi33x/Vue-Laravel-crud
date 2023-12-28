<template>
    <div>
        <div class="container mt-3">
            <!-- {{ user_data }} -->
            <h2 style="text-align: center">User Form</h2>
            <hr>
            <form id="userUpdate">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" v-model="user_data.name" class="form-control" id="name" name="name"
                        placeholder="Name">

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" v-model="user_data.email" name="email" class="form-control" id="inputEmail4"
                            placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword4"
                            placeholder="Password">
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="">

                </div> -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gender">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" v-model="user_data.gender" type="radio" name="gender"
                                id="gender" value="male" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" v-model="user_data.gender" type="radio" name="gender"
                                id="gender" value="female">
                            <label class="form-check-label" for="gridRadios2">
                                Female
                            </label>
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group col-md-4">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="" name="image">
                </div> <br> -->
                <button type="submit" @click.prevent="userUpdate" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
</template>


<script>
import axios from 'axios';

export default {
    name: 'User_Edit',
    data() {
        return {
            user_data: [],
            user_id: '',
        }
    },
    mounted() {
        // console.log(this.$route.params.id);
        this.user_id = this.$route.params.id;
        this.userData(this.$route.params.id);
    },
    methods: {
        // to get user data
        userData(user_Id) {
            axios
                .get(
                    "http://localhost/VueLaravelTest/public/user-edit/" + user_Id
                )
                .then((res) => {
                    this.user_data = res.data;
                });
        },

        
        userUpdate() {
            console.log('usrupdt');
            const user_update = document.getElementById('userUpdate');
            // console.log(user_update);
            let update = new FormData(userUpdate);
            console.log(update);
            axios.post('http://localhost/VueLaravelTest/public/user-update/' + this.user_data.id, update).then((res) => {
                // console.log(res);
            });
            this.$router.push({ name: 'user_list' });
        }
    },
}
</script>
