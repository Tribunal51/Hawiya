<template>
    <div class="Cover">
        <Header 
            title="Stationery" 
        />

        <!-- <Header 
            title="Stationery" 
            :text="getHeaderInfo()"
        /> -->
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
    methods: {
        getHeaderInfo() {
            let packageName = this.$store.state.stationery.package;
            if(!packageName) {
                packageName = '';
            }
            return packageName + ' / Package';
        }
    }
}
</script>

<style scoped>
    .Cover {
        font-family: 'LatoRegular', sans-serif;
    }
</style>