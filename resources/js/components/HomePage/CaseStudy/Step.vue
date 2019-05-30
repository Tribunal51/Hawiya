<template>
    <div class="card flex">
        <center><img :src="image" class="card-img-top" :alt="alt"></center>
        <!-- <div class="card-body"></div> -->
        <div class="card-footer">
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

    .card {
        border: none;
        margin-top: 5px;
        margin-left: 5px;
        margin-right: 5px;
        padding: none;
        font-family: 'LatoRegular', sans-serif;
        text-align: center;
        vertical-align: middle !important;
        /* background-color: red; */
    }

    img {
        width: 100px;
        height: 100px;
        object-fit: contain;
        
    }

    .card-footer {
        border: none;
        background-color: white;
       
    }

    .card-body {
        height: 1px !important;
    }
    
</style>
