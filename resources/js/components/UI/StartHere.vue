<template>
    <button class=" btn btn-outline-dark startButton" @click="buttonClicked()">{{ buttonText }}</button>
</template>

<script>
export default {
    props: [
        "link",
        "text",
        "styling"
    ],
    computed: {
        buttonText() {
            return this.text ? this.text : 'START HERE';
        },
        buttonLink() {
            return this.link ? this.link : '/design/branding/package';
        },
        buttonStyle() {
            return this.styling ? this.styling : null;
        }
    },
    methods: {
        buttonClicked() {
            this.$router.push(this.buttonLink);
        }
    }
}
</script>

<style scoped>
    .startButton {
        border-radius: 0% ;
        border: 3px solid black ;
        font-family: 'LatoBold', sans-serif;
        font-size: 1.1rem;
        padding-top: 2px;
        padding-bottom: 2px;
        padding-left: 10px;
        padding-right: 10px;
    }
</style>
