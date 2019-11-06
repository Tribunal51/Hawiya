<template>
    <div class="Cover">
        <Header 
            title="Stationery" 
        />

        <!-- <Header 
            title="Stationery" 
            :text="getHeaderInfo()"
        /> -->
        <RingLoader v-if="!loaded" />
        <router-view v-else />
    </div>
</template>

<script>
import BlackBox from '../../../UI/BlackBox';
import Header from '../../../UI/Header';
import { getProducts } from '../../../../data/stationery';
import RingLoader from 'vue-spinner/src/RingLoader';

export default {
    components: {
        BlackBox,
        Header,
        RingLoader
    },
    methods: {
        getHeaderInfo() {
            let packageName = this.$store.state.stationery.package;
            if(!packageName) {
                packageName = '';
            }
            return packageName + ' / Package';
        }
    },
    mounted() {
        getProducts().then(res => {
            this.loaded = true;
        });
    },
    data() {
        return {
            loaded: false
        }
    }
}
</script>

<style scoped>
    .Cover {
        font-family: 'LatoRegular', sans-serif;
    }
</style>