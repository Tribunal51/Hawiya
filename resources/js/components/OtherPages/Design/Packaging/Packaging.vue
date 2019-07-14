<template>
    <div class="Cover">
        
        <h2 class="mt-3">Packaging</h2>
        
        
        <router-view/>
    </div>
</template>

<script>
import BlackBox from '../../../UI/BlackBox';

export default {
    components: {
        BlackBox
    },
    data() {
        return {
            
        }
    },
    methods: {

    },
    watch: {
        
    }

}
</script>

<style scoped>
    .Cover {
        font-family: 'LatoRegular', sans-serif;
        /* font-size: 1.2rem; */
    }

</style>
