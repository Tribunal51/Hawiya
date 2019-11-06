<template>
    <div class="Cover">
        <!-- <div class="row mt-3">
            <h2>Packaging</h2>
            <slot name="packagingText"></slot>
        </div> -->
        
        <!-- <BlackBox>
            <h2>Packaging</h2>
        </BlackBox> -->

        <Header title="Packaging" />
        <RingLoader v-if="!loaded" />
        <router-view v-else />
    </div>
</template>

<script>
import BlackBox from '../../../UI/BlackBox';
import Header from '../../../UI/Header';
import { getProducts } from '../../../../data/packaging';
import RingLoader from 'vue-spinner/src/RingLoader';

export default {
    components: {
        BlackBox,
        Header,
        RingLoader
    },
    data() {
        return {
            loaded: false
        }
    },
    methods: {

    },
    watch: {
        
    },
    mounted() {
        console.log(this.$i18n);
        getProducts().then( res => {
            this.loaded = true;
        });
    }

}
</script>

<style scoped>
    .Cover {
        font-family: 'LatoRegular', sans-serif;
        /* font-size: 1.2rem; */
    }

</style>
