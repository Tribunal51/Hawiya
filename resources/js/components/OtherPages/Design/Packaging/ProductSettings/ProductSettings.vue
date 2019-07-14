<template>
    <div class="Cover">

        <div>{{ product.name }}</div>
        <BlackBox />

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
                    <div class="graybox-amount">{{ this.selectedAmount }}</div>
                    <VSlider 
                        v-model="selectedAmount"
                        thumbLabel
                        thumbSize="20"
                        height="10"
                        color=#FBC02D 
                        thumbColor=#FBC02D 
                    ></VSlider>
                </div>

                <div class="Color mt-4">
                    <h4>Material Color</h4>
                    <div class="flex-container">
                        <div class="itemColor" v-for="color in colors" :key="color">
                            <input type="radio" v-model="selectedColor" :value="color" :id="color" /><br />
                            <label :for="color">{{ color }}</label>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-md">

            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <v-btn @click="confirmChanges">Confirm</v-btn>
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
                "Red",
                "Green",
                "Blue",
                "Yellow",
                "Black"
            ],
            sizes: [
                "Small",
                "Medium",
                "Large"
            ],
            selectedColor: this.product.color,
            selectedSize: this.product.size,
            selectedAmount: this.product.amount
        }
    },
    computed: {
        amount() {
            return this.product.amount
        }
    },
    methods: {
        confirmChanges() {
            console.log('Selected options', this.selectedSize, this.selectedAmount, this.selectedColor);
            let updatedProduct = {
                ...this.product,
                size: this.selectedSize,
                color: this.selectedColor,
                amount: this.selectedAmount
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
        font-size: 1rem;
        
    }

    .graybox-select {
        border: 1px solid gray;
        background-color: lightgray;
        width: 100%;
    } 

    .graybox-amount {
        border: 1px solid gray;
        background-color: lightgray;
        width: 50px;
        height: auto;
    } 

    .flex-container {
        display: flex;
        flex-wrap: wrap;
    }

    .itemColor {
        width: 60px;
        height: 70px;
        border: 1px solid black;
        margin: 5px;
        padding: 5px;
    }

</style>
