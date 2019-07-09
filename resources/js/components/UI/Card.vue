<template>

    <!-- <div class="package">
        <div class="header">

        </div>
        <div class="content">

        </div>
    </div> -->

    <div class="card text-black bg-light mb-3" id="Cover">
        <!-- <div class="card-header custom-background img-fit">
            <img class="img img-responsive" src="/storage/shortlogo.png" alt="hawiyaBrandLogo" />
        </div> -->
        <div class="card-body body">
            <div class="upperHalf">
                <h2> {{ card.title }}</h2>
            </div>
            <div class="lowerHalf">
                <div class="row firstRow">
                    <div class="col-sm-7"> 
                        <div class="offers">
                            <div v-if="card.posts">
                                <div class="posts">
                                    {{ card.posts }}
                                </div>
                                <div class="postsDescription">
                                    <strong>{{ card.posts }} High Quality Post</strong>
                                </div>
                            </div>
                            <div v-if="card.header">
                                <div class="header">
                                    {{ card.header }}
                                </div>
                            </div>
                            <div v-for="offer in card.offers" v-bind:key="offer" class="offer">
                                <strong>{{ offer }}</strong>                           
                            </div>
                            <br />
                            Packages begin at ${{ card.new_price }}
                        </div>                       
                    </div>
                    <div class="col-sm-5" id="PriceSection">
                        <h2>${{ card.new_price }}</h2>
                        <span class="strikeout">
                            ${{ card.old_price }}
                        </span>                                                
                    </div>
                </div>
                <br />                
            </div>
            
            <!-- <h5 class="card-title">{{ card.title }}</h5>
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
                <slot></slot>
                
            </center> -->
        </div>
        <div class="secondRow">
            <div class="alignBottom">
                <slot></slot>
            </div>                   
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
            this.$router.push({
                name:'logotype'
            });

        }
    }
}
</script>

<style scoped>
    #cover {
        font-family: 'LatoRegular', sans-serif;
        
    }

    .card {
        width: 100%;
        margin: 10px;
        /* margin-top: 5px;
        margin-bottom: 5px; */
        font-size: 0.8rem;
        max-width: 18rem;
        border: 1px solid black !important;
        min-height: 100px;
        padding-bottom: 10px;   

        /* background-color: black !important; */
    }

    .card-body {
        padding: 0 0 !important;

    }

    #PriceSection {
        text-align: center;
        /* background-color: black; */
        
        /* font-weight: bold;   */
    }

    .packageTitle {
        font-size: 1.5rem;
        
    }

    #PriceSection > .strikeout > .cancel {
        text-decoration: line-through;
        font-family: 'LatoBold', sans-serif;
        font-weight: 4;
    }

    .blackHR {
        /* background-color: #FFDB00; */
        background-color: black;
        
    }

    .custom-background {
        background-color: #FFDB00 !important;
        
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

    .body {
        
    }

    .upperHalf {
        height: 150px !important;
        background-color: #FFDB00;
        display: flex;
        padding: 10px;
        align-items: center;
    }
    
    .lowerHalf {       
        /* background-color: black; */
        
    }

    .postsDescription {
        font-size: 0.9rem;
        
    }
    

    .firstRow {
        padding-top: 5px !important;
    }

    .offers {
        font-size: 0.8rem;
        padding-left: 5px;
        /* background-color: black; */
    }

    

    .header {
        font-size: 0.9rem;
        
    }

    .secondRow {
        text-align: center;
        display: flex;
        justify-content: center;
        /* flex-direction: column; */
        
        
        /* background-color: red; */
        
    }

    .posts {
        padding-left: 4px;
        font-size: 2rem;
        color: darkorange;
    }
    
    
</style>
