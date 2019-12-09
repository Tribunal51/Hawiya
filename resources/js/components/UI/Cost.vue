<template>
    <div class="CostSection">
        <div class="Cover">
            <div class="row mt-2">
                <div class="col-sm">
                    <h3>Your Order</h3>
                </div>           
            </div>
            <div class="row" v-for="product in productsCost" :key="product.name">
                <div class="col-sm-8">
                    <h5>{{ product.title }}</h5>
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
            <div class="whiteTriangleLeft" :style="assignTriangleColor(triangleColor)"></div>     
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            
        }
    },
    computed: {
        selectedProducts() {
            return this.products;
        },
        productsCost() {
            if(this.selectedProducts.length < 1) {
                return [];
            } 
            else {
                return this.selectedProducts.map(currentProduct => {
                    let price = this.calculateCost(currentProduct);
                    return {
                        title: currentProduct.title,
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
        "products",
        "isSticky",
        "triangleColor"
    ],
    methods: {
        calculateCost(product) {
            let price = 0;
            if(product.size && product.amount && product.priceRange) {

            
                let size = product.size;
                let amount = product.amount;
                let priceRange = product.multipliers.find(range => range.size === size);
                
                price = priceRange.pricePerItem * amount;
            }
            else {
                price = product.cost;
            }
            return price;
        },
        assignTriangleColor(color) {
            return color ? {
                borderRight: '15px solid '+color
            } : {
                borderRight: '15px solid white'
            }
        }
    },
    watch: {
        totalCost: function(newValue, oldValue) {
            this.$emit('cost', newValue);
            
        }
    }

}

</script>

<style scoped>

    .CostSection {
        background-color: #FFDB00;
        width: 100%;
        min-height: 80%;
    }

    
    

    .Cover {        
        padding: 20px;
        position: relative;
    }

    .whiteTriangleLeft {
        position: absolute;
        right: 0;
        top: 30%;
        
        width: 0;
        height: 0;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-right: 15px solid white;
        position: absolute;
    }
    

</style>
