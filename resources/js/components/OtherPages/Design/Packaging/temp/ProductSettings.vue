<template>
    <div class="Cover">
        Product Settings
        {{ product.name }} 
        {{ product.size }} 
        {{ product.color }}

        
        <div class="Size">
            <div class="itemSize" v-for="size in sizes" :key="size">               
                <input type="radio" v-model="selectedSize" :value="size" :id="size"/>
                <label :for="size">{{ size }}</label>
            </div>
        </div>

        <div class="Amount">
            <VSlider 
                v-model="selectedAmount"
                thumbLabel
                thumbSize="20"
                height="10"
                color=#FBC02D 
                thumbColor=#FBC02D 
            ></VSlider>
        </div>

        <div class="Color">
            <div class="itemColor" v-for="color in colors" :key="color">
                <input type="radio" v-model="selectedColor" :value="color" :id="color" />
                <label :for="color">{{ color }}</label>
            </div>
        </div>

        <button class="btn btn-success" @click="confirmChanges">Confirm</button>
    </div>
</template>

<script>
export default {
    props: [
        "product"
    ],
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
        margin: 10px;
        padding: 10px;
        width: 100%;
        border: 1px solid gray;
    }

</style>
