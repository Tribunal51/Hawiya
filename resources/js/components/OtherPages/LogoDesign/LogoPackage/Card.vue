<template>
    
    <div class="card text-white bg-dark mb-3" id="cover">
        <div class="card-header custom-background img-fit">
            <img class="img img-responsive" src="/storage/shortlogo.png" alt="hawiyaBrandLogo" />
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ card.title }}</h5>
            <div id="PriceSection">
                <h3>${{ card.new_price }}</h3>
                <span class="strikeout">
                    ${{ card.old_price }}
                </span>

                
            </div>
            <hr>
            <div id="Offers">                   
                <div v-for="(value,key) in card.offers" v-bind:key="key">
                    {{ value }} {{ key }}
                </div>
                <hr>
                Packages begin at ${{ card.new_price }}
            </div>
            <br />
            <center>
                <router-link 
                tag="button" 
                class="btn btn-secondary" 
                :to="{
                        name: 'logotype',
                    }"
                @click.native="orderButtonClicked">ORDER</router-link>
            </center>
                <!-- <button class="btn btn-secondary" @click="orderButtonClicked">ORDER</button> -->
        </div>
    </div>
    
</template>

<script>
import { mapActions } from 'vuex';

export default {
    mounted() {
        // console.log(this.card);
    },
    props: [
        "card"
    ],
    methods: {
        orderButtonClicked() {
            this.$store.dispatch('logodesign/setPackage', this.card.title);

        }
    }
}
</script>

<style scoped>
    #cover {
        border: none;
        
    }

    .card {
        width: 100%;
        margin: 5px;
        padding: 1px;
        border: none;
        font-size: 0.8rem;
        max-width: 18rem;
        background-color: black !important;
    }

    #PriceSection {
        text-align: right;
        /* font-weight: bold;   */
    }

    .card-title {
        font-size: 1.5rem;
    }

    #PriceSection > .strikeout > .cancel {
        text-decoration: line-through;
        
    }

    hr {
        background-color: #FFDB00;
        
    }

    .custom-background {
        background-color: #FFDB00 !important;
    }

    .card-header {
        padding: 0 !important;
        /* margin: 0 !important; */
        height: 50px !important;
    }

    button {
        background-color: white;
        color: black;
        width: 60%;
        
    }

    .img {
        height: 100%;
        width: auto;
    }


    .strikeout {
        font-size: 1.3rem;
        /* line-height: 1rem; */
        position: relative;
        
    }

    .strikeout::after {
        border-bottom: 3px solid #FFDB00;
        content: "";
        left: 0;
        /* margin-top: calc(0.125em / 2 * -1); */
        
        position: absolute;
        right: 0;
        top: 50%;
        
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
    
    
</style>
