<template>
    <div class="Cover">
        <div class="row">
            <h5>Brief</h5>
        </div>
        <BlackBox />
        <div v-show="!productSettings">
            <div class="row grayContainer mt-2 mb-2">
                <div class="col-md flex-container-align-vertical">
                    <div class="product" v-for="product in products" :key="product.id">
                        
                        <label class="yellowCheckBox">
                            <input type="checkbox" :value="product.name" :id="product.name" v-model="selectedNames" disabled hidden   />
                            <span></span>
                        </label>
                        <label :for="product.name">
                            <div class="flex-container-align-horizontal">
                                {{ product.name }}
                                <img v-if="isProductModified(product.name)" src="/storage/question-mark.png" class="modified" alt="modified" />

                            </div>
                        </label>


                        <!-- <input type="checkbox" :value="product.name" :id="product.name" v-model="selectedNames" />
                        <label :for="product.name">{{ product.name }}</label>  -->
                                        
                    </div>
                    
                </div>
                <div class="col-md flex-container-align-center">
                    <div class="checkoutSection">
                        <Cost 
                            :products="selectedProducts" 
                            v-on:cost="updateCost"
                        />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <v-btn round color="primary" @click="backButtonClicked()">Back</v-btn>
                </div>
                <div class="col-md-4">
                    <!-- <v-btn color="#FFDB00" round :disabled="isSubmitDisabled()">Submit</v-btn> -->
                    <SubmitButton :buttonDisabled="isSubmitButtonDisabled()" />
                </div>
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
import ProductSettings from '../ProductSettings/ProductSettings';
import SubmitButton from '../../../../UI/SubmitButton';

export default {
    components: {
        BlackBox,
        Cost,
        ProductSettings,
        SubmitButton
    },
    data() {
        return {
            productSettings: false,
            editProduct: {},
            cost: 0
        }
    },
    computed: {
        selectedProducts() {
            let products = this.$store.state.packaging.products;
            return products ? products : [];
        },
        products() {
            return store.products;
        },
        selectedNames() {
            if(this.selectedProducts.length > 0) {
                return this.selectedProducts.map(product => product.name);
            }
            else return [];
            
        }
    },
    methods: {
        isProductModified(name) {
            let product = this.selectedProducts.find(product => product.name === name);
            return product ? product.modified : false;
            
            
        },
        updateProduct(product) {

        },
        updateCost(cost) {
            this.cost = cost;
        },
        isSubmitButtonDisabled() {
            return this.cost < 1;
        },
        backButtonClicked() {
            this.$store.dispatch('packaging/resetState');
            this.$store.dispatch('packaging/setPrice',this.cost);
            this.$router.push({
                name: 'packagingproducts'
            });
        }
    }

}
</script>

<style scoped>
    

    .checkoutSection {
        
        background-color: #FFDB00;
        width: 100%;
        min-height: 80%;

    }

    .flex-container-align-vertical {
        display: flex;
        flex-flow: column wrap;
        
        align-items: flex-start;
        height: 300px;

    }

    @media(max-width: 240px) {
        .flex-container-align-vertical {
            height: auto;
            min-height: 300px;
        }
    }

    .flex-container-align-center {
        display: flex;
        justify-content: center;
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

    .flex-container-align-horizontal {
        display: flex;
        flex-flow: row wrap;
        justify-content: flex-start;
    }

    .modified {
        /* font-weight: bold;
        color: black;
        font-style: italic; */
        width: 1.3rem;
        height: 1.1rem;
        margin-left: 3px;

    }


    /* .myCheckBox input {
        position: relative;
        z-index: -9999;
    } */

    

    

    
</style>
