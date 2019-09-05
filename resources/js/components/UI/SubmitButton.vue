<template>
    <v-btn 
        color="#FFDB00"
        :class="'submitButton '+buttonClass"
        @click="buttonClicked ? buttonClicked() : buttonClickedNative()"
        :disabled="buttonDisabled"
        :type="buttonType"
    >Submit</v-btn>
</template>

<script>
export default {
    props: [
        "buttonClass",
        "buttonClicked",
        "buttonDisabled",
        "buttonType"
    ],
    methods: {
        buttonClickedNative() {
            console.log('Button Clicked Native');
        }
    }
}
</script>

<style scoped>
    .submitButton {
        width: 80px;
        border-radius: 10px 10px 10px 10px;
        cursor: pointer;
    }
</style>
