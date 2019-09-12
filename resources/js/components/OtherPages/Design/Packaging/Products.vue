<template>
    <div class="Cover">
        <Header title="Packaging" />
        <StickyCost :products="selectedProducts" v-on:cost="updateCost" />
        <ProductsGrid :products="products" v-on:update="updateProducts" />
        <!-- <Cost :products="selectedProducts" v-on:cost="updateCost" /> -->
        
    </div>
</template>

<script>
import { store } from '../../../../data/packaging';
import ProductsGrid from '../../../UI/ProductsGrid';
import Header from '../../../UI/Header';
import Cost from '../../../UI/Cost';
import StickyCost from '../../../UI/StickyCost';

export default {
    data() {
        return {
            selectedProducts: [],
            totalCost: 0
        }
    },
    components: {
        ProductsGrid,
        Header,
        Cost,
        StickyCost
    },
    computed: {
        products() {
            return store.products;
        }
    },
    methods: {
        updateProducts(selectedNames) {
            this.selectedProducts = selectedNames.map(name => store.products.find(product => product.name === name));
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
        position: relative;
    }

</style>