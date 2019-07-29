<template>
    <div class="Cover">
        <!-- <div class="row mt-3">
            <h2>Packaging</h2>
            <slot name="packagingText"></slot>
        </div> -->
        
        <!-- <BlackBox>
            <h2>Packaging</h2>
        </BlackBox> -->
        
        <router-view/>
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
