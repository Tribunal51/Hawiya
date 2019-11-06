<template>
    <div class="Cover">
        <StickyCost :products="selectedProducts" v-on:cost="updateCost" />
        <ProductsGrid :products="products" v-on:update="updateProducts" />
    </div>
</template>

<script>
import { store } from '../../../../../data/stationery.js';
import Header from '../../../../UI/Header';
import StickyCost from '../../../../UI/StickyCost';
import ProductsGrid from '../../../../UI/ProductsGrid';
import Cost from '../../../../UI/Cost';

export default {
    components: {
        Header,
        StickyCost,
        ProductsGrid,
        Cost
    },
    data() {
        return {
            totalCost: 0,
            selectedProducts: []
        }
    },
    computed: {
        products() {
            return store.products;
        }
    },
    methods: {
        updateProducts(selectedNames) {
            this.selectedProducts = selectedNames.map(name => store.products.find(product => product.title === name));
        },
        updateCost(totalCost) {
            this.totalCost = totalCost;
        }
    }
}
</script>

<style scoped>
    .Cover {
        font-family: 'LatoRegular', sans-serif;
        font-size: 1.1rem;
        width: 100%;
    }
</style>