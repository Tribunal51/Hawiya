<template>
    <div class="Cover">         
        <div :style="imageStyle">
            <slot name="edit"></slot>            
        </div>
        <div class="label">
            <slot></slot>  
            <slot name="label"></slot>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        "product"
    ],
    computed: {
        imageStyle() {
            return {
                'height': '80%',
                'background':'url('+this.product.image+') no-repeat center'
            };
        }
    },
    methods: {

    }

}
</script>

<style scoped>
    .Cover {
        width: 200px;
        height: 200px;
        /* min-height: 200px; */
        margin: 10px;
        border: 1px solid #FFDB00;
    }

    .image {
        height: 80%;

    }

    .label {
        height: 20%;
        background-color: lightgray;
        text-align: center;
    }

</style>
