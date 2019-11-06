<template>
    <div class="Cover">
        <!-- <BlackBox>
            <h2>Social Media</h2>
        </BlackBox> -->
        <Header 
            title="Social Media" 
            :packageText="getHeaderInfo()"
        />
        <RingLoader v-if="!loaded" />
        <router-view v-else />
    </div>
</template>

<script>
import BlackBox from '../../../UI/BlackBox';
import Header from '../../../UI/Header';
import { getPackages } from '../../../../data/socialmedia';
import RingLoader from 'vue-spinner/src/RingLoader';

export default {
    components: {
        BlackBox,
        Header,
        RingLoader
    },
    methods: {
        getHeaderInfo() {
            let packageName = this.$store.state.socialmedia.package;
            if(!packageName) {
                packageName = '';
            }
            return packageName;
        }
    },
    mounted() {
        getPackages().then(res => {
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
