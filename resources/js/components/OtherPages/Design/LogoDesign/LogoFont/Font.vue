<template>
    <div class="Cover" :style="coverStyling">
        <img :src="font.file" :alt="font.name" class="fontImage" :styling="imageStyling" />
        <div class="fontBox" :style="displayYellowLine()">
            <p>{{ font.description }}</p>
        </div>
    </div>
    
</template>

<script>
export default {
    props: [
        "font",
        "coverStyling",
        "imageStyling",
        "yellowBottomBorder"
    ],
    methods: {
        displayYellowLine() {
            if(this.yellowBottomBorder) {
                return {
                    borderBottom: 'solid #FFDB00 2px'
                }
            }
        }
    }

}
</script>

<style scoped>

    .Cover {
        /* max-width: 200px; */
    }

    .fontImage {
        width: 100%;
        height: 75px;
    }

    .fontBox {
        display: inline-block;
        color: gray;
        /* border-bottom: solid #FFDB00 2px; */
    }

    .checkBox img:hover {
        transform: scaleX(1);
        transform: scaleY(1);
    }

    :checked + .checkBoxLabel img {
        transform: scale(1);
        box-shadow: 0 0 0 0;
        z-index: 0;
    }
</style>