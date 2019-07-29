<template>
    <div class="row">
        <div class="col-md-5" :style="styling">
            <slot></slot>          
        </div>
        <div class="col-md-7 yellowLineSection" v-if="!hideYellowLine">
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
</style>
