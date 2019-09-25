<template>
    <div class="Cover">
        <Header 
            title="Branding" 
            :packageText="getHeaderInfo()"
        />
        <router-view />
    </div>
</template>

<script>
import BlackBox from '../../../UI/BlackBox';
import Header from '../../../UI/Header';

export default {
    components: {
        BlackBox,
        Header
    },
    mounted() {
        if(this.$route.fullPath === '/design/branding') {
            this.$router.push({
                name: 'brandingpackage'
            });
        }
    },
    methods: {
        getHeaderInfo() {
            let packageName = this.$store.state.branding.package;
            if(!packageName) {
                packageName = '';
            }
            return packageName;
        }
    }
}
</script>

<style scoped>

    .Cover {
        font-family: 'LatoRegular', sans-serif;
    }

</style>
