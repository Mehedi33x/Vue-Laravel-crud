<template>
    <div class="mx-5 my-4">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title" style="text-align: center">Product List</h2>
                <router-link :to="{ name: 'product_create' }" class="btn btn-success">+Product</router-link>
                <!-- <a href="{{ route('user.create') }}" class="btn btn-success">+ User</a> -->
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in products" :key="index">
                            <th scope="row">{{ item.id }}</th>
                            
                            <td>{{ item.name }}</td>
                            <td>{{ item.price }}</td>
                            <td class="text-capitalize">{{ item.category }}</td>
                            <td>{{ item.description }}</td>
                            <td class="text-capitalize">{{ item.status }}</td>
                            <td>
                                <div>
                                    <router-link to="" class="btn btn-success">View</router-link>
                                </div>
                                <div>
                                    <router-link to="" class="btn btn-primary">Edit</router-link>
                                </div>

                                <!-- <div @click.prevent="delete">
                                    <router-link :to="{ name: 'product_delete', params: { id: item.id } }"
                                        class="btn btn-danger">Delete</router-link>
                                </div> -->
                                <!-- <button @click="delete (item.id)">Delete</button> -->
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>



<script>
import axios from "axios"
export default {
    name: 'Product_List',
    data() {
        return {
            products: [],
        }
    },
    created() {
        this.allProducts();
    },
    methods: {
        allProducts() {
            axios
                .get("VueLaravelTest/public/product-show")
                .then((response) => {
                    this.products = response.data;
                    // console.log(this.list);
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        // delete(product_id) {
        //     // console.log('del');
        //     let product_id = this.$route.params.id;
        //     console.log(this.product_id);
        //     axios
        //         .get(
        //             "http://localhost/VueLaravelTest/public/product-delete/" +
        //             this.product_id
        //         )
        //         .then((res) => { });
        // }
    },
}
</script>
