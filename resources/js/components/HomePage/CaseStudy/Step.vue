<template>
    <div class="Cover flex">
        <img :src="image" class="step-image" :alt="alt">
        <!-- <div class="card-body"></div> -->
        <div class="step-footer">
            <h5>{{ alt }}</h5>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        "image",
        "alt"
    ]
}
</script>

<style scoped>

    .Cover {
        border: none;
        margin-top: 5px;
        margin-left: 5px;
        margin-right: 5px;
        padding: none;
        font-family: 'LatoRegular', sans-serif;
        text-align: center !important;
        vertical-align: middle !important;
        /* background-color: red; */
    }

    .step-image {
        width: 100px;
        height: 100px;
        object-fit: contain;
        text-align: center !important;
    }

    .step-footer {
        padding: 5px;
        border: none;
        background-color: white;
       
    }

    .flex {
        text-align: center !important;
        /* background-color: red; */
    }
    
</style>
