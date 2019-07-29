<template>
    <div class="Cover">
        
        <Header 
            title="Packaging" 
            :text="getHeaderInfo()"
        />
        <!-- <div class="row">
            <h5>{{ this.productSettings ? this.editProduct.name : 'Select your Packaging' }}</h5>
        </div>           
        <BlackBox /> -->
            
        <div v-show="!productSettings">
            <div class="flex-container">
                <Product v-for="product in products" :key="product.id" :product="product">  
                    <template v-slot:edit>
                        <v-btn fab small
                            :color="isProductEdited(product.id) ? 'primary' : ''" 
                            @click="changeProduct(product)" 
                            :disabled="isEditButtonDisabled(product.id)"><v-icon dark>edit</v-icon></v-btn>
                            
                    </template>

                    <template v-slot:label>
                        <label class="checkBoxLabel" :for="product.name">{{ product.name }}</label>
                    </template>

                    <input type="checkbox" class="inputCheckBox" :id="product.name" :value="product.name" v-model="selectedNames" />
                </Product>    
            </div> 
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <v-btn color="success" @click="buttonClicked" :disabled="selectedProducts.length < 1">Click</v-btn>  

                </div>
            </div>    
        </div>

        <div class="row" v-if="productSettings">
            <div class="col">
                <ProductSettings 
                    :product="editProduct" 
                    v-on:close="productSettings=false"
                    v-on:product="updateProduct"
                />
            </div>
        </div>
        
       
        
    </div>
</template>

<script>
import Product from './Product';
import ProductSettings from '../ProductSettings/ProductSettings';
import BlackBox from '../../../../UI/BlackBox';
import { store, removeKeyFromObjectsArray } from '../store.js';
import Header from '../../../../UI/Header';

export default {
    components: {
        Product,
        ProductSettings,
        BlackBox,
        Header
    },
    mounted() {
        
    },
    data() {
        return {
            selectedNames: [],
            selectedProducts: [],
            selectedNames: [],
            updatedProducts: [],
            productSettings: false,
            editProduct: {}
        }
    },
    computed: {
        products() {
            return store.products;
        }
    },
    methods: {
        getHeaderInfo() {
            if(this.productSettings) {
                return this.editProduct.name;
            }
            else {
                return "Select your Packaging";
            }
        },
        updateProduct(changedProduct) {
            this.selectedProducts = this.selectedProducts.map(currentProduct => {
                if(currentProduct.name === changedProduct.name) {
                    return changedProduct;
                }
                else {
                    return currentProduct;
                }
                
            });
            console.log('Update Product', this.selectedProducts);
        },
        changeProduct(product) {
            let editedProduct = this.selectedProducts.find(currentProduct => currentProduct.id === product.id);
            this.editProduct = editedProduct ? editedProduct : product;        
            this.productSettings = true;
        },
        isEditButtonDisabled(id) {
            //console.log('ID', id);
            let product = this.selectedProducts.find(product => product.id === id);
            
            return !product;           
        },
        isProductEdited(id) {
            let product = this.selectedProducts.find(product => product.id === id);
            return product ? product.modified : false;
        },
        findProduct(name) {
            return this.products.find(product => product.name === name);
        },
        buttonClicked() {

            //this.selectedProducts = removeKeyFromObjectsArray(this.selectedProducts, 'id')

            this.$store.dispatch('packaging/setProducts', this.selectedProducts);

            console.log(this.$store.state);
            // console.log('Data', data);
            this.$router.push({ 
                name: 'packagingcheckout'
            });           
        }
    },
    watch: {
        selectedNames: function(newValue, oldValue) {
            if(newValue.length > oldValue.length) {

                this.selectedProducts.push({
                    ...this.findProduct(newValue[newValue.length -1]),
                    modified: false
                });
                console.log('Add', this.selectedProducts);
            }
            else if(newValue.length < oldValue.length) {
            
                oldValue.forEach(oldname => {
                    if(newValue.indexOf(oldname) < 0) {
                        this.selectedProducts = this.selectedProducts.filter(product => product.name !== oldname);
                    }
                });
                console.log('Subtract', this.selectedProducts);
            } 
            //this.selectedProducts = newValue.map(name => this.findProduct(name));
        },
    }

}
</script>

<style scoped>
    .Cover {
        font-family: 'LatoRegular', sans-serif;
        font-size: 1.1rem;
    }

    .flex-container {
        display: flex;
        flex-wrap: wrap;
    }
</style>
