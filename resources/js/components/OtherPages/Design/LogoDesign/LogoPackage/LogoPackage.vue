<template>
    <div id="cover">
        
            
                <!-- <BlackBox>
                    <h2>Logo Design</h2>
                </BlackBox> -->
                <!-- <SecondaryNavbar 
                    :navStyle="navStyle"
                    :navItemStyle="navItemStyle"
                    
                /> -->

                <BlackBox>
                    We believe logos speak louder than anything and that's why, with pristine designs, we produce sitrring identities for brands all around the world.
                </BlackBox>
                <!-- <div id="intro">
                    <h3>We offer Custom Pricing <br />
                    Because every project is different.</h3>
                    <h2> Logo Designing </h2>
                    <p>We believe logos speak louder than anything and that's why, with pristine designs, we produce identities for brands all around the world.</p>
                </div> -->
                <div class="card-group packageCards">  
                            
                    <!-- <div id="card" class="card mx-auto" v-for="card in cards" :key="card.title"> -->
                    <Card :card="card" v-for="card in cards" :key="card.title">
                        <button 
                            class="btn btn-secondary"
                            @click="orderButtonClicked(card.title)"
                        >ORDER</button>
                    </Card>
                    <!-- </div>             -->
                    
                </div>
            
       
    </div>
        
</template>

<script>
import Card from '../../../../UI/Card.vue';
import IntroSection from '../../../../UI/IntroSection.vue';
import BlackBox from '../../../../UI/BlackBox.vue';
import SecondaryNavbar from '../../../../UI/SecondaryNavbar.vue';

export default {
    components: {
        Card,
        IntroSection,
        BlackBox,
        SecondaryNavbar
    },
    mounted() {
        console.log('Just mounted Package', this.$store.state.logodesign);
    },
    data() {
        return {
            cards: [
                    {
                        title: "FAST TRACK",
                        old_price: 150,
                        new_price: 100,
                        offers: {
                            "Logo Concepts": 2,
                            "Revisions": 2,
                            "Dedicated Designers": 2,
                            "Turnaround Time": "48hrs",
                        },
                    },
                    {
                        title: "BASIC",
                        old_price: 200,
                        new_price: 350,
                        offers: {
                            "Logo Concepts": 4,
                            "Revisions": 4,
                            "Dedicated Designers": 2,
                            "Turnaround Time": "48hrs",
                        },
                    },
                    {
                        title: "ADVANCED",
                        old_price: 300,
                        new_price: 500,
                        offers: {
                            "Logo Concepts": 6,
                            "Revisions": 6,
                            "Dedicated Designers": 2,
                            "Turnaround Time": "48hrs",
                        },
                    }

            ],
            navStyle: {
                backgroundColor: 'transparent !important',
                borderTop: 'none',
                borderBottom: '3px solid #FFDB00',
                display: 'flex',
                justifyContent: 'flex-start'
                
            },
            navItemStyle: {
                color: 'gray',
                fontSize: '1.2rem',
                fontFamily: 'LatoRegular, sans-serif'
            },
        }
    },
    methods: {
        orderButtonClicked(title) {
            this.$store.dispatch('logodesign/setPackage',title);
            this.$router.push({
                name:'logotype'
            });
        }
    }
}
</script>

<style scoped>
    #cover {
        margin: 1px;
        padding: 1px;
        font-family: 'LatoRegular', sans-serif;
        background-color: white;
        /* background-color: yellow; */
    }


    #intro {
        text-align: center
    }

    

   
</style>
