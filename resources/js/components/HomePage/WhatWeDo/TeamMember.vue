<template>
    <div class="Cover">
        
        <div class="card memberCard">
            <img class="img-responsive" :src="image" alt="Card image cap" />
            
            <h5>{{ name }}</h5>
            <p class="card-text">{{ title }}</p>
                       
        </div>
        
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
    .Cover {
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
        /* padding: 1px; */
        width: 70%;
        height: auto;
        border-radius: 50% !important;
    }

    .memberCard {
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        /* justify-content: center; */
        align-items: center;
    }

    @media (max-width: 575px) {
        .card {
            max-width: 300px;
            height: 100%;
        }

        
    }
</style>
