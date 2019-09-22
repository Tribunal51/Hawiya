<template>
    <div class="Cover">
        <Header title="Packaging" />
        <StickyCost :products="selectedProducts" v-on:cost="updateCost" />
        <ProductsGrid :products="products" v-on:update="updateProducts" />
        <!-- <Cost :products="selectedProducts" v-on:cost="updateCost" /> -->
        <SubmitButton :buttonClicked="buttonClicked" />
    </div>
</template>

<script>
import { store } from '../../../../data/packaging';
import ProductsGrid from '../../../UI/ProductsGrid';
import Header from '../../../UI/Header';
import Cost from '../../../UI/Cost';
import StickyCost from '../../../UI/StickyCost';
import SubmitButton from '../../../UI/SubmitButton';

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
        StickyCost,
        SubmitButton
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
        },
        buttonClicked() {
            let payload = {
                products: [...this.selectedProducts],
                price: this.totalCost
            }
            this.$store.dispatch('packaging/setInfo', payload).then(() => {
                console.log(this.$store.state.packaging);
            });
            //console.log(this.$store.state.packaging);
            document.location = '/payment';
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