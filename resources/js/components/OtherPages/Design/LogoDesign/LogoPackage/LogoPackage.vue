<i18n>
    {
        "en": {
            "line1": "We believe logos speak louder than anything and that's why, with pristine designs, we produce stirring identities for brands all around the world."


        },
        "ar": {
            "line1": "نحن نعتقد أن الشعارات تتحدث بصوت أعلى من أي شيء ، ولهذا السبب ، مع التصاميم البكر ، ننتج هويات قوية للعلامات التجارية في جميع أنحاء العالم."
            
        }
    }

</i18n>

<template>
    <div id="cover">
        
            
                <!-- <BlackBox>
                    <h2>Logo Design</h2>
                </BlackBox> -->
                <!-- <SecondaryNavbar 
                    :navStyle="navStyle"
                    :navItemStyle="navItemStyle"
                    
                /> -->
                
                <div class="row">
                    <div class="col">
                        {{ $t('line1') }}
                    </div>
                </div>
                
                <!-- <div id="intro">
                    <h3>We offer Custom Pricing <br />
                    Because every project is different.</h3>
                    <h2> Logo Designing </h2>
                    <p>We believe logos speak louder than anything and that's why, with pristine designs, we produce identities for brands all around the world.</p>
                </div> -->
                <div class="card-group packageCards">  
                            
                    <!-- <div id="card" class="card mx-auto" v-for="card in cards" :key="card.title"> -->
                    <Card :card="card" v-for="card in cards" :key="card.title">
                        <OrderButton :buttonClicked="() => orderButtonClicked(card)" />
                        <!-- <button 
                            class="btn btn-secondary"
                            @click="orderButtonClicked(card)"
                        >ORDER</button> -->
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
import OrderButton from '../../../../UI/OrderButton';
import { store } from '../../../../../data/logodesign';

export default {
    components: {
        Card,
        IntroSection,
        BlackBox,
        SecondaryNavbar,
        OrderButton
    },
    mounted() {
        console.log('Just mounted Package', this.$store.state.logodesign);
        // getPackages();
        console.log(this.$i18n);
    },
    data() {
        return {
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
    computed: {
        cards() {
            return store.packages;
        }
    },
    methods: {
        orderButtonClicked(card) {
            let payload = {
                package: card.title,
                price: card.new_price
            }
            this.$store.dispatch('logodesign/setPackage',payload);
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
