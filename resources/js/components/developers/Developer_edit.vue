<template>
    <div>
        <div class="container mt-3">
            <h2 style="text-align: center">Developer Edit</h2>
            <hr />
            <form id="dev_Update" @submit.prevent="devUpdate">
                <div class="form-group col-md-6">
                    <label for=""> <strong>Name</strong> </label>
                    <input type=" text" class="form-control" id="name" name="name" placeholder="Name"
                        v-model="dev_data.name" />
                    <small v-if="errors.name" class="text-danger">{{ errors.name }}</small>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">
                            <strong>Email</strong>
                        </label>
                        <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email"
                            v-model="dev_data.email" />
                        <small v-if="errors.email" class="text-danger">{{ errors.email }}</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for=""> <strong>Contact</strong> </label>
                        <input type="tel" name="contact" class="form-control" id="" placeholder="Contact"
                            v-model="dev_data.contact" />
                        <small v-if="errors.contact" class="text-danger">{{ errors.contact }}</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for=""> <strong>Age</strong> </label>
                        <input type="number" min="1" name="age" class="form-control" id="" placeholder="Age"
                            v-model="dev_data.age" />
                        <small v-if="errors.age" class="text-danger">{{ errors.age }}</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gender"> <strong>Gender</strong> </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="male"
                                v-model="dev_data.gender" checked />
                            <label class="form-check-label" for="gridRadios1">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="female"
                                v-model="dev_data.gender" />
                            <label class="form-check-label" for="gridRadios2">
                                Female
                            </label>
                        </div>
                        <small v-if="errors.gender" class="text-danger">{{ errors.gender }}</small>
                    </div>
                </div>
                <br />

                <strong>Skills:</strong>
                <div v-for="(item, index) in skills" :key="index">
                    <span v-if="dev_skills.includes(item)">
                        <input class="" type="checkbox" name="skills[]" id="inlineCheckbox1" :value="item" :checked="true">
                        <label class="form-check-label" for="inlineCheckbox1">{{ item }}</label>
                    </span>
                    <span v-else>
                        <input class="" type="checkbox" name="skills[]" id="inlineCheckbox1" :value="item" :checked="false">
                        <label class="form-check-label" for="inlineCheckbox1">{{ item }}</label>
                    </span>
                </div>

                <div class="form-group col-md-6 mb-4">
                    <label for=""><strong>Address</strong></label>
                    <textarea class="form-control" name="address" id="" cols="30" rows="10"
                        v-model="dev_data.address"></textarea>
                    <small v-if="errors.address" class="text-danger">{{ errors.address }}</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="image"> <strong>Image : </strong> </label>
                    <img width="100" :src="'http://localhost/VueLaravelTest/public/storage/uploads/' + dev_data.image"
                        srcset=""> <br />
                    <input class="form-control" type="file" name="image" />
                </div>
                <br />

                <div class="form-group col-md-4">
                    <label for="cv"> <strong>Drop Your CV :</strong> </label>
                    <input class="form-control" type="file" name="cv" />
                </div>
                <br />

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "Developer_edit",

    mounted() {
        // console.log(this.$route.params.id);
        this.editDev(this.$route.params.id);
        this.dev_id = this.$route.params.id;
    },

    data() {
        return {
            dev_id: "",
            dev_data: [],
            dev_skills: '',
            skills: ['php', 'js', 'python', 'java', 'c++'],

            info: {
                name: '',
                email: '',
                contact: '',
                age: '',
                address: '',
                gender: '',
                cv: '',
                skills: [],
            },
            errors: {},
        };
    },

    methods: {
        editDev(dev_id) {
            axios
                .get(
                    "http://localhost/VueLaravelTest/public/dev_edit/" + dev_id
                )
                .then((res) => {
                    console.log(res.data);
                    this.dev_data = res.data.data;
                    this.dev_skills = JSON.parse(this.dev_data.skills);
                    console.log(this.dev_skills);
                });
        },


        devUpdate() {
            const dev_update = document.getElementById('dev_Update');
            const update = new FormData(dev_update);
            // update.append('skills', JSON.stringify(this.skills));
            if (this.validate() == false) {
                return false;
            }
            axios.post('http://localhost/VueLaravelTest/public/dev_update/' + this.dev_data.id, update).then((res) => {
                console.log(res.data);

            });
            // this.$router.push({ name: 'user_list' });
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
            if (this.info.contact == '' || null) {
                errcount += 1
                this.errors.contact = 'Contact is required'
            }
            if (this.info.age == '' || null) {
                errcount += 1
                this.errors.age = 'Age is required'
            }
            if (this.info.address == '' || null) {
                errcount += 1
                this.errors.address = 'Address is required'
            }
            if (errcount > 0) {
                return false;
            }
            return true;
        },
    },
};
</script>
