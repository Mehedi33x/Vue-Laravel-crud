<template>
    <div>
        <div class="container mt-3">
            <h2 style="text-align: center">Developers Form</h2>
            <hr>
            <form id="dev_create" @submit.prevent="developer_create">

                <div class="form-group col-md-6">
                    <label for=""> <strong>Name</strong>
                    </label>
                    <input type=" text" class="form-control" id="name" name="name" placeholder="Name" v-model="info.name">
                    <small v-if="errors.name" class="text-danger">{{ errors.name }}</small>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4"> <strong>Email</strong>
                        </label>
                        <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email"
                            v-model="info.email">
                        <small v-if="errors.email" class="text-danger">{{ errors.email }}</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for=""> <strong>Contact</strong>
                        </label>
                        <input type="tel" name="contact" class="form-control" id="" placeholder="Contact"
                            v-model="info.contact">
                        <small v-if="errors.contact" class="text-danger">{{ errors.contact }}</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for=""> <strong>Age</strong>
                        </label>
                        <input type="number" min="1" name="age" class="form-control" id="" placeholder="Age"
                            v-model="info.age">
                        <small v-if="errors.age" class="text-danger">{{ errors.age }}</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gender"> <strong>Gender</strong>
                        </label>
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
                        <small v-if="errors.gender" class="text-danger">{{ errors.gender }}</small>
                    </div>
                </div>
                <br>

                <strong>Skills:</strong>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="" type="checkbox" name="skills[]" id="inlineCheckbox1" v-model="info.skills"
                            value="php">
                        <label class="form-check-label" for="inlineCheckbox1">PHP</label>

                        <input class="" type="checkbox" name="skills[]" id="inlineCheckbox1" v-model="info.skills"
                            value="js">
                        <label class="form-check-label" for="inlineCheckbox1">Js</label>

                        <input class="" type="checkbox" name="skills[]" id="inlineCheckbox1" v-model="info.skills"
                            value="python">
                        <label class="form-check-label" for="inlineCheckbox1">Python</label>

                        <input class="" type="checkbox" name="skills[]" id="inlineCheckbox1" v-model="info.skills"
                            value="c++">
                        <label class="form-check-label" for="inlineCheckbox1">C++</label>

                        <input class="" type="checkbox" name="skills[]" id="inlineCheckbox1" v-model="info.skills"
                            value="java">
                        <label class="form-check-label" for="inlineCheckbox1">Java</label>
                        <!-- <small v-if="errors.skills" class="text-danger">{{ errors.skills }}</small> -->

                    </div>
                </div>
                <div class="form-group col-md-6 mb-4">
                    <label for=""><strong>Address</strong></label>
                    <textarea class="form-control" name="address" id="" cols="30" rows="10"
                        v-model="info.address"></textarea>
                    <small v-if="errors.address" class="text-danger">{{ errors.address }}</small>
                </div>
                <div class="form-group col-md-4">
                    <label for="image"> <strong>Image : </strong>
                    </label>
                    <input class="form-control" type="file" name="image" />
                </div> <br>

                <div class="form-group col-md-4">
                    <label for="cv"> <strong>Drop Your CV :</strong>
                    </label>
                    <input class="form-control" type="file" name="cv" />
                </div> <br>

                <button type="submit" class="btn btn-success">Submit</button>

            </form>
        </div>
    </div>
</template>


<script>
import axios from 'axios';

export default {

    data() {
        return {
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
        }
    },
    methods: {
        developer_create() {
            let create_dev = document.getElementById('dev_create');
            const dev_data = new FormData(create_dev);
            // axios.post("VueLaravelTest/public/dev-create", dev_data).then((res) => {
            // });
            if (this.validate() == false) {
                return false;
            }

            axios
                .post("http://localhost/VueLaravelTest/public/dev-create", dev_data)
                .then((res) => {
                    console.log(res.data);

                });
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

}
</script>
