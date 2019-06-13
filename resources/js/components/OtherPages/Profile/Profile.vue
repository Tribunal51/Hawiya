<template>
    <div id="cover">
        {{ item.title }}
        {{ item.category }}
        <img v-for="row in item.uploads" :key="row" :src="'/storage/uploads/'+row.filename" />
            
        
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
