<template>
    <!-- <div class="row">
        <div class="col-sm-4" :style="styling">
            <slot></slot>          
        </div>
        <div class="col-sm-8 yellowLineSection" v-if="!hideYellowLine">
        </div>
    </div> -->

    <div class="flex-container-textLeft-yellowLineRight">
        <div class="textSection">
            <slot></slot>
        </div>
        <div class="yellowLineSection" v-if="!hideYellowLine">
            
        </div>
    </div>


</template>

<script>
import BlackBox from './BlackBox';

export default {
    props: [
        "hideYellowLine",
        "styling"
    ],
    components: {
        BlackBox
    }

}
</script>

<style scoped>
    .yellowLineSection {
        border-bottom: 2px solid #FFDB00;
    }


    .flex-container-textLeft-yellowLineRight {
        display: flex;
    }

    .textSection {
        padding-right: 25px;
        flex-grow: 0;
        flex-shrink: 0;
        flex-basis: auto;
    }

    .yellowLineSection {
        flex-grow: 1;
        flex-shrink: 1;
        flex-basis: auto;
        
    }



</style>
