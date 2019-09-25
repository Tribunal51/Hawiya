<template>       
    
    <div class="Cover">
        <div class="arrowButton text-right" @click="show = !show">{{ show ? '>' : '&lt;' }}</div>
        <!-- <div class="arrowButton text-right" v-else @click="show = !show">&lt;</div> -->
        <transition name="slide-fade">
            <Cost v-on:cost="updateCost" :products="products" v-show="show" />
        </transition>
    </div>
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
        max-width: 70% !important;
    }

    /* Enter and leave animations can use different */
    /* durations and timing functions.              */
    .slide-fade-enter-active {
        transition: all .5s ease;
    }

    .slide-fade-leave-active {
        transition: all .5s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }

    .slide-fade-enter, .slide-fade-leave-to
    /* .slide-fade-leave-active below version 2.1.8 */
    {
        transform: translateX(50px);
        opacity: 0;
    }

</style>