<template>       
    <transition name="slide-fade">
        <div class="Cover" v-show="show">
            <div class="arrowButton text-right" v-if="show" @click="show = !show">></div>
            <div class="arrowButton text-right" v-else @click="show = !show">&lt;</div>
                <Cost v-on:cost="updateCost" :products="products" />
        </div>
    </transition>
</template>

<script>
import Cost from './Cost';

export default {
    components: {
        Cost
    },
    data() {
        return {
            totalCost: 0,
            show: false
        }
    },
    props: [
        "products"
    ],
    methods: {
        updateCost(cost) {
            this.totalCost = cost;
        }
    },
    watch: {
        totalCost(cost) {
            this.$emit('cost', cost);
            this.show = cost > 0 ? true : false;
        }
    }
    
}
</script>

<style scoped>
    .Cover {
        position: fixed !important;
        z-index: 1000 !important;
        right: 0 !important;
        top: 30% !important;
        width: 300px !important;
    }

</style>