<template>
    <div id="cover">
        <center>
        <div class="card">
            <center><img class="img-responsive" :src="image" alt="Card image cap"></center>
            <div class="card-body" id="cardBody">
                <h5>{{ name }}</h5>
                <p class="card-text">{{ title }}</p>
            </div>             
        </div>
        </center>
    </div>
</template>

<script>
export default {
    props: [
        "name",
        "title",
        "image"
    ]
}
</script>

<style scoped>
    #cover {
        max-width: 100%;
        /* height: 250px; */
        font-family: 'LatoRegular', sans-serif;
        /* background-color: red; */
        /* justify-content: space-around; */
        
    }

    

    .card {
        /* margin: 20px 20px 20px 20px !important; */
        height: 100% !important;
        min-height: 280px !important;
        
        width: 100%;
        text-align: center;
        border: 1px black solid;
        margin-bottom: 5px;
        
        /* background-color: red;      */
    }

    img {   
        padding: 1px;
        width: 70%;
        height: auto;
        border-radius: 50% !important;
    }

    @media (max-width: 575px) {
        .card {
            max-width: 300px;
            height: 100%;
        }

        
    }
</style>
