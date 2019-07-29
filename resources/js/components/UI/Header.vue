<template>
    <div class="Cover">
        <BlackBox />
        
        <div class="row">
            <div class="col headerSection">
                <h2> {{ this.title }} </h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <strong> {{ this.text }} </strong>
            </div>
        </div>
        
        <BlackBox />
    </div> 
</template>

<script>
import BlackBox from './BlackBox';

export default {
    components: {
        BlackBox
    },
    props: [
        "title",
        "text",
        "bottomblackbox"
    ],
    mounted() {
        console.log('Header Component', this.title, this.text);
    }
}
</script>

<style scoped>
    .headerSection {
        font-family: 'LatoBold', sans-serif;
    }
</style>
