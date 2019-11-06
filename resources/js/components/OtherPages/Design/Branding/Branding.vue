<template>
    <div class="Cover">
        <Header 
            title='Branding' 
            :packageText="getHeaderInfo()"
        />
        <RingLoader v-if="!loaded" />
        <router-view v-else />
    </div>
</template>

<script>
import BlackBox from '../../../UI/BlackBox';
import Header from '../../../UI/Header';
import { getPackages } from '../../../../data/branding';
import RingLoader from 'vue-spinner/src/RingLoader';
export default {
    components: {
        BlackBox,
        Header,
        RingLoader
    },
    mounted() {
        if(this.$route.fullPath === '/design/branding') {
            this.$router.push({
                name: 'brandingpackage'
            });
        }
        getPackages().then(res => {
            this.loaded = true;
        })
    },
    methods: {
        getHeaderInfo(option) {
            let packageName = this.$store.state.branding.package;
            if(!packageName) {
                packageName = '';
            }
            return packageName;
        }
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
