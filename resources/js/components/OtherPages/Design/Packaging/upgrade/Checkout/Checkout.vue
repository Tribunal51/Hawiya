<template>
    <div class="Cover">
        <Header 
            title="Packaging" 
            text="Brief"
            :bottomblackbox="true"
        />
        
        <div v-show="!productSettings">
            <div class="row mt-2 mb-2">
                <div class="col grayContainer">
                    <div class="row">
                        <div class="col-md flex-container-align-vertical">
                            <div class="product" v-for="product in products" :key="product.id">
                                
                                <label class="yellowCheckBox">
                                    <input type="checkbox" :value="product.name" :id="product.name" v-model="selectedNames" disabled hidden   />
                                    <span></span>
                                </label>
                                <label :for="product.name">
                                    <div class="flex-container-align-horizontal">
                                        {{ product.name }}
                                        <img v-if="isProductModified(product.name)" src="/storage/icons/question-mark.png" class="modified" alt="modified" />

                                    </div>
                                </label>


                                <!-- <input type="checkbox" :value="product.name" :id="product.name" v-model="selectedNames" />
                                <label :for="product.name">{{ product.name }}</label>  -->
                                                
                            </div>
                            
                        </div>
                        <div class="col-md flex-container-align-center">
                            <Cost 
                                :products="selectedProducts" 
                                v-on:cost="updateCost"
                            />
                        </div>
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
import { store } from '../../../../../../data/packaging';
import BlackBox from '../../../../../UI/BlackBox';
import Cost from '../../../../../UI/Cost';
import ProductSettings from '../ProductSettings/ProductSettings';
import SubmitButton from '../../../../../UI/SubmitButton';
import Header from '../../../../../UI/Header';

export default {
    components: {
        BlackBox,
        Cost,
        ProductSettings,
        SubmitButton,
        Header
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
