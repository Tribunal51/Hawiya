<template>
    <div id="cover">
        {{ item.title }}
        {{ item.category }}
        <img v-for="image in item.uploads" :key="image" :src="image" />
            
        
    </div>
</template>

<script>
export default {
    props: [
        "item"
    ],
    mounted() {
        console.log('Props',this.props);
        if(!this.props) {
            this.$router.push('/');
        }
    }
}
</script>

<style scoped>

</style>
