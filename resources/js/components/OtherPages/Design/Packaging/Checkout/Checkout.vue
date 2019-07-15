<template>
    <div class="Cover">
        <div class="row">
            <h5>Brief</h5>
        </div>
        <BlackBox />
        <div v-show="!productSettings">
            <div class="row grayBox mt-2 mb-2">
                <div class="col-md">
                    <div class="product" v-for="product in products" :key="product.id">
                        <label :for="product.name">{{ product.name }}</label>
                        <label class="myCheckBox">
                            <input type="checkbox" :value="product.name" :id="product.name" v-model="selectedNames" readonly  />
                            <span></span>
                        </label>


                        <!-- <input type="checkbox" :value="product.name" :id="product.name" v-model="selectedNames" />
                        <label :for="product.name">{{ product.name }}</label>  -->
                        {{ isProductModified(product.name)}}                 
                    </div>
                    
                </div>
                <div class="col-md flex-container">
                    <div class="checkoutSection">
                        <Cost :products="selectedProducts" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8"><v-btn round>Customize</v-btn></div>
                <div class="col-md-4"><v-btn color="#FFDB00" round>Submit</v-btn></div>
            </div>
        </div>
        <div v-show="productSettings">
            <ProductSettings 
                :product="editProduct"
                v-on:close="productSettings=false"
                v-on:product="updateProduct"
                
            />
        </div>
         
    </div>
</template>

<script>
import { store } from '../store.js';
import BlackBox from '../../../../UI/BlackBox';
import Cost from './Cost';

export default {
    components: {
        BlackBox,
        Cost
    },
    data() {
        return {
            productSettings: false,
            editProduct: {}
        }
    },
    computed: {
        selectedProducts() {
            return this.$store.state.packaging.products;
        },
        products() {
            return store.products;
        },
        selectedNames() {
            return this.selectedProducts.map(product => product.name);
        }
    },
    methods: {
        isProductModified(name) {
            let product = this.selectedProducts.find(product => product.name === name);
            return product ? product.modified : false;
            
            
        }
    }

}
</script>

<style scoped>
    .grayBox {
        width: 100%;
        height: auto;
        min-height: 400px;
        background-color: lightgray;
    }

    .checkoutSection {
        
        background-color: #FFDB00;
        width: 80%;
        height: 80%;

    }

    .flex-container {
        display: flex;
        align-items: center;

    }

    .transparentBox {
        width: 20px;
        height: 20px;
        border: 1px solid gray;
        background-color: transparent;
    }

    .yellowBox {
        width: 20px;
        height: 20px;
        border: 1px solid gray;
        background-color: #FFDB00;
    }


    .myCheckBox input {
        position: relative;
        z-index: -9999;
    }

    .myCheckBox span {
        width: 20px;
        height: 20px;
        border: 1px solid gray;
        background-color: transparent;
        display: block;
        cursor: pointer;

    }

    .myCheckBox input:checked + span {
        background-color: #FFDB00;
    }

    

    
</style>
