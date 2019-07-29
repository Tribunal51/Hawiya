<template>
    <div class="Cover">
        <div class="row mt-2">
            <div class="col-sm">
                <h3>Your Order</h3>
            </div>           
        </div>
        <div class="row" v-for="product in productsCost" :key="product.name">
            <div class="col-sm-8">
                <h5>{{ product.name }}</h5>
            </div>
            <div class="col-sm-4">
                <h5>${{ product.price }}</h5>
            </div>
        </div> 
        <div class="row topBottomBorder">
            <div class="col-sm-8">
                <h5>Total:</h5>
            </div>
            <div class="col-sm-4">
                <h5><strong>${{ totalCost }}</strong></h5>
            </div>
        </div>      
    </div>
</template>

<script>
import { store } from '../store.js';

export default {
    data() {
        return {
            
        }
    },
    computed: {
        selectedProducts() {
            return this.products;
        },
        productList() {
            return store.products;
        },
        productsCost() {
            if(this.selectedProducts.length < 1) {
                return [];
            } 
            else {
                return this.selectedProducts.map(currentProduct => {
                    let price = this.calculateCost(currentProduct);
                    return {
                        name: currentProduct.name,
                        price: price
                    }
                });
            }
            
        },       
        totalCost() {
            let sum = 0;
            if(this.productsCost.length > 0) {
                sum = this.productsCost.reduce((sum, product) => {
                    return ({price: sum.price+product.price})
                }, { price: 0}).price;               
            } 
            if(sum > 0) {
                this.$emit('cost', sum);
            }
            return sum;
            
        }
    },
    props: [
        "products"
    ],
    methods: {
        calculateCost(product) {
            let price = 0;
            let size = product.size;
            let amount = product.amount;
            let priceRange = product.multipliers.find(range => range.size === size);
            price = priceRange.pricePerItem * amount;
            return price;
        },
    },
    watch: {
        totalCost: function(newValue, oldValue) {
            if(newValue > 0) {
                this.$emit('cost', newValue);
            }
        }
    }

}
</script>

<style scoped>
    .Cover {        
        padding: 20px;
    }

    

</style>
