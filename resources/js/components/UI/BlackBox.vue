<template>
    <span class="Cover">
        <div class="row">
            <div class="col">
                <slot name="topText"></slot>
            </div> 
        </div> 
        <div class="row">
            <div class="col">
                <div class="box" :style="blue ? {'backgroundColor': '#00AEEF', 'border': '1px solid cyan'} : null">

                </div>
            </div>
            
        </div>
        <div v-if="hasSlotData" class="row" :style="customStyles">
            <div class="col">
                <slot></slot>
            </div>
            
        </div>
        <div class="row">
            <div class="col">
                <slot name="packageName"></slot>
            </div>
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
        "customStyles",
        "blue"
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
        /* float: left; */
        background-color: black;
        display: block;        
    }

    .Cover {
        margin-bottom: 20px;
    }


    
</style>
