<i18n>
    {
        "en": {
            "buttonText": "START HERE"
        },
        "ar": {
            "buttonText": "أبدأ هنا"
        }
    }
</i18n>

<template>
    <button class=" btn btn-outline-dark startButton" @click="buttonClicked()">{{ buttonText }}</button>
</template>

<script>
export default {
    props: [
        "link",
        "text",
        "styling",
        "differentPage"
    ],
    computed: {
        buttonText() {
            //console.log('START HERE', this.$root.$i18n);
            return this.text ? this.text : this.$i18n.messages[this.$root.$i18n.locale].buttonText;
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
            if(this.differentPage) {
                location.href = this.buttonLink;
            }
            else {
                this.$router.push(this.buttonLink);
            }
            //this.$router.push(this.buttonLink);
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
