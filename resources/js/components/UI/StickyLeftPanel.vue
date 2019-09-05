<template>
    <div class="Cover" :style="{ top: top, width: width }">
        <slot></slot>        
    </div>
</template>

<script>
import IntroSection from './IntroSection';

export default {
    components: {
        IntroSection
    },
    props: [
        "top",
        "width"
    ]
}
</script>

<style scoped>
    .Cover {
        height: 100px;
        
        position: absolute;
        z-index: 500;
        /* background-color: green; */
    }

</style>