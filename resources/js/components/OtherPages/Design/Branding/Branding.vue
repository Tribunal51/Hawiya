<template>
    <div class="Cover">
        <BlackBox>
            <h2>Branding</h2>
        </BlackBox>
        <router-view />
    </div>
</template>

<script>
import BlackBox from '../../../UI/BlackBox';
export default {
    components: {
        BlackBox
    },
    mounted() {
        if(this.$route.fullPath === '/design/branding') {
            this.$router.push({
                name: 'brandingpackage'
            });
        }
    }
}
</script>

<style scoped>

    .Cover {
        font-family: 'LatoRegular', sans-serif;
    }

</style>
