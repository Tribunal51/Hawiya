<template>
    <div class="Cover">
        <BlackBox>
            <h2>Packaging</h2>
        </BlackBox>
        <div class="flex-container" v-show="!productSettings">
            <Product v-for="product in products" :key="product.id">  
                <button 
                class="btn btn-success" 
                @click="changeProduct(product)" 
                :disabled="isEditButtonDisabled(product.id)">Edit</button>

                <label :for="product.name">{{ product.name }}</label>

                <input type="checkbox" :id="product.name" :value="product" v-model="selectedProducts" />
                <hr>
                <br />Name: {{ product.name }}
                <br />Size: {{ product.size }} 
                <br />Amount: {{ product.amount }} 
                <br />Color: {{ product.color }}
            </Product>           
        </div>

        <div v-if="productSettings">
            <ProductSettings 
                :product="editProduct" 
                v-on:close="productSettings=false"
                v-on:product="updateProduct"
            />
            
        </div>
        

        <button class="btn btn-primary" @click="buttonClicked" :disabled="selectedProducts.length < 1">Click</button>
    </div>
</template>

<script>
import Product from './Product';
import ProductSettings from './ProductSettings';
import BlackBox from '../../../UI/BlackBox';

export default {
    components: {
        Product,
        ProductSettings,
        BlackBox
    },
    data() {
        return {
            selectedProducts: [],
            updatedProducts: [],
            products: [
                {
                    id: 1,
                    name: "Product 1",
                    size: "Small",
                    amount: 20,
                    color: "Red"
                },
                {
                    id: 2,
                    name: "Product 2",
                    size: "Medium",
                    amount: 20,
                    color: "Green"
                },
                {
                    id: 3,
                    name: "Product 3",
                    size: "Large",
                    amount: 20,
                    color: "Blue"
                }
            ],
            productSettings: false,
            editProduct: {}
        }
    },
    methods: {
        updateProduct(changedProduct) {
            console.log('New Product', changedProduct);
            this.updatedProducts = [...this.selectedProducts];
            this.updatedProducts = this.updatedProducts.map(currentProduct => {
                if(currentProduct.id === changedProduct.id) {
                    return changedProduct;
                }
                else {
                    return currentProduct;
                }
            });
            console.log('Updated Products', this.updatedProducts);
        },
        changeProduct(product) {
            let updatedProduct = this.updatedProducts.find(currentProduct => product.id === currentProduct.id);
            this.editProduct = updatedProduct == null ? {...updatedProduct } : product;        
            this.productSettings = true;
        },
        isEditButtonDisabled(id) {
            console.log('ID', id);
            let product = this.selectedProducts.find(product => product.id === id);
            
            return !product;           
        },
        removeKeyFromObjectsArray(products, key) {
            console.log('Key', key);
            
            const newProducts = products.map(
                ({
                    [key]: _,
                    ...otherAttributes
                }) => otherAttributes
            );
            return newProducts;

                // let new_products = [...products];
                // new_products = products.map(currentProduct => {
                //     delete currentProduct['id'];
                //     return currentProduct;
                // });
                // return new_products;
        },
        buttonClicked() {
            if(this.updatedProducts.length < 1) {
                this.updatedProducts = [...this.selectedProducts];
            }
            console.log(this.updatedProducts);

            
            console.log(this.removeKeyFromObjectsArray(this.updatedProducts, 'id'));
        
            this.updatedProducts = this.removeKeyFromObjectsArray(this.updatedProducts, 'id');

            let data = {
                user_id: 1,
                products: this.updatedProducts
            };

            this.$store.dispatch('packaging/setProducts', this.updatedProducts);

            console.log(this.$store.state);
            console.log('Data', data);
            axios.post('http://hawiya.net/api/orders/packaging', data)
            .then(response => console.log(response.data))
            .catch(error => console.log(error.response));
        }
    },
    watch: {
        selectedProducts: function(newValue, oldValue) {
            if(newValue.length !== oldValue) {
                this.productSettings = false;
                this.updatedProducts = [...this.selectedProducts];
            }
        },
        
    }

}
</script>

<style scoped>
    .Cover {
        font-family: 'LatoRegular', sans-serif;
        font-size: 1.2rem;
    }

    .flex-container {
        display: flex;
        flex-wrap: wrap;
    }
</style>
