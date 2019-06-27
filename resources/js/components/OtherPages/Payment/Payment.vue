<template>
    <div class="Cover">
        Payment Component
        Test
        <button @click="buttonClicked">Click</button>
        <router-link to="/">Click</router-link>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('State',this.$store.state);
    },
    methods: {
        buttonClicked() {
            window.location.href = "/design/logo-design/info";
        }
    }
}
</script>

<style scoped>

</style>
