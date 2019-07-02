<template>
    <div id="cover">
        <div class="card bg-dark text-white">
            <router-link :to="{
                name: 'logoinfo',
            }" 
            @click.native="logoTypeSubmitted"
            ><img :src="'/storage/logotype/'+type.file" class="card-img" alt="..."></router-link>
            <!-- <div class="card-img-overlay">
                <p class="card-header">{{ type.title }}</p>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text">Last updated 3 mins ago</p> 
            </div>  -->
        </div>
    </div>
</template>

<script>
export default {
    props: [
        "type"
    ],
    mounted() {
    },
    methods: {
        logoTypeSubmitted() {            
            this.$store.dispatch('logodesign/setType', this.type.title);
        }
    }

}
</script>



<style scoped>
    #cover { 
        margin: 10px;
        /* display: inline-block; */
        width: 100%;
        height: 100%;
        border: none;

    }

    .card {
        border: none;
    }

    img {
        max-width: 100%;
        max-height: 100%;
        cursor: pointer;
        /* object-fit: contain; */
        
    }

    img:hover {
        transform: scale(1.1,1.1);
        transition-duration: 2s;
    }
    
    

</style>
