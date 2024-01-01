<template>
    <div class="mx-5 my-4">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title" style="text-align: center">Book List</h2>
                <router-link to="" class="btn btn-success">+ Book</router-link>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"></th>

                            <td></td>

                            <td>
                                <div>
                                    <router-link to="" class="btn btn-success">View</router-link>
                                </div>
                                <div>
                                    <router-link to="" class="btn btn-primary">Edit</router-link>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>


<script>
import axios from 'axios';
export default {
    name: "Book_list",

    data() {
        return {

        }
    },


    methods: {

    },
}
</script>
