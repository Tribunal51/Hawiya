<template>
    <div class="Cover">

        <div class="row">
            <div class="col-md">
                <div class="Size mt-4">
                    <h4>Size</h4>
                    <select class="graybox-select" v-model="selectedSize">
                        <option v-for="size in sizes" :key="size" :value="size" >{{ size }}</option>
                    </select>
                </div>

                <div class="Amount mt-4">
                    <h4>Amount</h4>
                    <div class="graybox-amount">
                        <input class="graybox-amount" type="number" v-model="selectedAmount" />
                        
                        <!-- {{ this.selectedAmount }} -->
                    </div>
                    <VSlider 
                        v-model="selectedAmount"
                        thumbSize="30"
                        height="10"
                        color=#FBC02D 
                        thumbColor=#FBC02D 
                        :max="maxAmount"
                        :min="0"
                        
                    ></VSlider>
                    <!-- :step="tickSize"
                        ticks="always"
                        :tick-labels="tickLabels" -->
                </div>

                <div class="Color mt-4">
                    <h4>Material Color</h4>
                    <div class="flex-container">
                        <div class="itemColor" v-for="color in colors" :key="color.name"> 
                            <input type="radio" :value="color.name" :id="color.name" v-model="selectedColor" hidden  />  
                            <label class="colorSection" :for="color.name">                                  
                                <div class="colorCircle" :style="{'backgroundColor': color.color}"></div>
                                {{ color.name }}
                            </label>
                        </div>
                        
                        <!-- <div class="itemColor" v-for="color in colors" :key="color">

                            <input type="radio" v-model="selectedColor" :value="color" :id="color" /><br />
                            <label :for="color">{{ color }}</label>
                        </div> -->
                    </div>
                    
                </div>
            </div>
            <div class="col-md imageSection">
                <img :src="product.image" :alt="product.name" class="productImage" />
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-1"></div>
            <div class="col-md-5 errorSection">{{ error }}</div>
            <div class="col-md-6">
                <center><v-btn @click="confirmChanges" :disabled="selectedAmount < 100">Confirm</v-btn></center>
            </div>
        </div>
        
        

        
    </div>
</template>

<script>
import BlackBox from '../../../../UI/BlackBox';

export default {
    props: [
        "product"
    ],
    components: {
        BlackBox
    },
    data() {
        return {
            colors: [
                {
                    name: "Red",
                    color: "red"
                }, 
                {
                    name: "Green",
                    color: "green"
                },
                {
                    name: "Blue",
                    color: "blue"
                },
                {
                    name: "Yellow",
                    color: "yellow"
                },
                {
                    name: "Black",
                    color: "black"
                },
                {
                    name: "White",
                    color: "white"
                },
                {
                    name: "Natural",
                    color: "brown"
                }
            ],
            sizes: [
                "Small",
                "Medium",
                "Large"
            ],
            selectedColor: this.product.color,
            selectedSize: this.product.size,
            selectedAmount: this.product.amount,
            minAmount: 100,
            maxAmount: 3500,
            tickSize: 500
        }
    },
    computed: {
        amount() {
            return this.product.amount
        },
        tickLabels() {
            //let ticks = [100, 150, 200, 300, 500, 750, 1000, 1500, 2000, 2500, 3000, 3500];
            let ticks = [];
            for(var i = this.minAmount; i <= this.maxAmount; i += this.tickSize) {
                ticks.push(i);
            }
            return ticks;
        },
        error() {
            return this.selectedAmount < 100 ? 'Please select an amount greater than 100' : null;
        }
    },
    methods: {
        confirmChanges() {
            
            console.log('Selected options', this.selectedSize, this.selectedAmount, this.selectedColor);
            let updatedProduct = {
                ...this.product,
                size: this.selectedSize,
                color: this.selectedColor,
                amount: this.selectedAmount,
                modified: true
            };
            this.$emit('product', updatedProduct);
            this.$emit('close');
        }
    }
}
</script>

<style scoped>
    .Cover {
        /* padding: 10px; */
        width: 100%;
        /* border: 1px solid gray; */
        /* font-size: 1rem; */
        
    }

    .graybox-select {
        border: 1px solid gray;
        background-color: lightgray;
        width: 100%;
    } 

    .graybox-amount {
        border: 1px solid gray;
        background-color: lightgray;
        width: 80px;
        height: auto;
    } 

    .flex-container {
        display: flex;
        flex-wrap: wrap;
        
    }

    

    .productImage {
        width: 100%;
        height: auto;
        max-width: 100%;
        max-height: 100%;
    }


    

    .colorSection {
        width: 70px;
        height: 70px;
        border: 1px solid black;
        margin: 5px;
        padding: 5px;
        display: flex;
        flex-direction: column;
        align-items: center;
        cursor: pointer;
        background-color: white;
    }

    .colorCircle {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 1px solid black;
    }

    .itemColor input:checked + .colorSection {
        background-color: #FFDB00 ;
    }

    .errorSection {
        color: red;
        text-align: right;
    }
</style>
