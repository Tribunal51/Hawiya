<template>
    <div class="Cover">
        <!-- <BlackBox>
            <h2>Social Media</h2>
        </BlackBox> -->
        <Header 
            title="Social Media" 
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
    methods: {
        getHeaderInfo() {
            let packageName = this.$store.state.socialmedia.package;
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
