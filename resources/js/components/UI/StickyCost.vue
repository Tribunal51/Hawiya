<template>       
    
    <div class="Cover">
        <div class="arrowButton"><span style="cursor: pointer" @click="show = !show">{{ show ? '>' : '&lt;' }}</span></div>
        <!-- <div class="arrowButton text-right" v-else @click="show = !show">&lt;</div> -->
       
        <transition :name="$root.$i18n.locale === 'en' ? 'slide-fade-right' : 'slide-fade-left'">
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
        top: 30% !important;
        width: 300px !important;
        max-width:70% !important;
    }

        html[dir="ltr"] .Cover {
            right: 0 !important;
        }

        html[dir="rtl"] .Cover {
            left: 0 !important;
        }

    /* Enter and leave animations can use different */
    /* durations and timing functions.              */
    .slide-fade-right-enter-active {
        transition: all .5s ease;
    }

    .slide-fade-right-leave-active {
        transition: all .5s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }

    .slide-fade-right-enter, .slide-fade-right-leave-to
    /* .slide-fade-leave-active below version 2.1.8 */
    {
        transform: translateX(50px);
        opacity: 0;
    }



    .slide-fade-left-enter-active {
        transition: all .5s ease;
    }

    .slide-fade-left-leave-active {
        transition: all .5s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }

    .slide-fade-left-enter, .slide-fade-left-leave-to
    /* .slide-fade-leave-active below version 2.1.8 */
    {
        transform: translateX(-50px);
        opacity: 0;
    }





</style>