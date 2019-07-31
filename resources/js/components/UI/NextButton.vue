<template>
    <button 
        :class="'btn btn-light nextButton '+buttonClass"
        @click="buttonClicked" 
        :disabled="buttonDisabled"
        v-show="!buttonDisabled">
            {{ this.text ? this.text : 'NEXT' }}
            <img src="/storage/icons/right-arrow.png" class="rightArrow" />
    </button>
</template>


<script>
export default {
    props: [
        "buttonClass",
        "buttonClicked",
        "buttonDisabled",
        "text"
    ]

}
</script>

<style scoped>
    .nextButton {
        font-weight: 400;
        background-color: inherit;
        font-size: 1.1rem;
    }



    .rightArrow {
        margin-left: 10px;
        width: 1.1rem;
        height: 1.1rem;
    }


</style>
