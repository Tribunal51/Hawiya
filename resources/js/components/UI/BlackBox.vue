<template>
    <span id="cover">
        <div class="row">
            <div class="box">

            </div>
        </div>
        <div v-if="hasSlotData" class="row" :style="customStyles">
            <slot></slot>
        </div>
        <div class="row">
            <slot name="packageName"></slot>
        </div>
        
    </span>  

    <!-- <div class="row">
        <div class="box">

        </div>
    </div> -->
</template>

<script>
export default {
    props: [
        "customStyles"
    ],
    methods: {
        hasSlotData() {
            return this.$slots.default;
        }
    }
}
</script>

<style scoped>
    .box {
        margin-top: 20px;
        margin-bottom: 20px;
        width: 25px !important;
        height: 6px !important;
        border: 1px solid black;
        float: left;
        background-color: black;
        display: block;        
    }

    #cover {
        margin-bottom: 10px;
    }
    
</style>
