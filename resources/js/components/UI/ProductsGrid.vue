<template>
    <div class="Cover">
        <Product v-for="product in products" :key="product.name" :product="product">
            <template v-slot:edit>
                <!-- <v-btn fab small
                    :color="isProductEdited(product.id) ? 'primary' : ''" 
                    @click="changeProduct(product)" 
                    :disabled="isEditButtonDisabled(product.id)"><v-icon dark>edit</v-icon></v-btn> -->
                    
            </template>

            <template v-slot:label>
                <!-- <label class="checkBoxLabel" :for="product.name">{{ product.name }}{{ product.cost }}</label> -->
            </template>

            <input type="checkbox" class="inputCheckBox" :id="product.name" :value="product.name" v-model="selectedNames" />
        </Product>
    </div> 
</template>

<script>
import Product from './Product';
export default {
    props: [
        "products"
    ],
    data() {
        return {
            selectedNames: []
        }
    },
    components: {
        Product
    },
    watch: {
        selectedNames: function(newValue, oldValue) {
            this.$emit('update', newValue);
        }
    }
    
}
</script>

<style scoped>
    .Cover {
        display: flex;
        flex-flow: row wrap;
        align-items: flex-start;
        position: relative;
    }

</style>