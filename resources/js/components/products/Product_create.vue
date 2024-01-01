<template>
    <div>
        <div class="container mt-3">
            <h2 style="text-align: center">User Form</h2>
            <hr>
            <form action="" method="" id="product_create" @submit.prevent="productCreate">

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Price</label>
                        <input type="number" min="0" class="form-control" id="price" name="price" placeholder="price">

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Category</label>
                        <select id="category" class="form-control" name="category">
                            <option selected value="">Choose...</option>
                            <option value="biscuits">Biscuits</option>
                            <option value="drinks">Drinks</option>
                            <option value="fruits">Fruits</option>
                            <option value="sweets">Sweets</option>
                        </select>

                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="">

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status" value="active" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status" value="inactive">
                            <label class="form-check-label" for="gridRadios2">
                                Inactive
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="" name="image">
                </div> <br>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: 'Product_Create',
    data() {
        return {

        }
    },
    methods: {
        productCreate() {
            // console.log('ok');
            var product_create = document.getElementById('product_create');
            // var products_data = new ProductData(product_create);

            axios
                .post("VueLaravelTest/public/product-create", product_create)
                .then((res) => {

                });
        }
    },
}
</script>
