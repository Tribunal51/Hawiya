<template>
    <div id="cover">
        <div class="bannerHeader">
             
                 
                    
            <div class="bannerText">
                <h1>What We Do</h1>
            </div>
                     
                  
                                           
        </div> 
        <div class="row">
            <div class="col-sm">                
                <IntroSection>
                    <BlackBox />
                    <div class="row" id="IntroSection1">
                        We have years of experience working with entrepreneurs just like you. We've learned it's best to start by listening to your story. Then we review your existing brand and offer you options from there. Blow we've listed our most requested packages, but each of these can be tweaked or we can give you a completely custom quote.
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div id="IntroSection2">
                                <BlackBox />
                                <div class="row">
                                We believe in every project we take on. Our belief can be seen in our attention to detail and meticulous care which shines through, in every brand we build.
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div id="IntroSection3">
                                <BlackBox />
                                <div class="row">
                                We help businesses find a brand experience that's fresh & distinct by providing them with innovative, strategic & creative solutions.
                                </div>
                            </div>
                        </div>
                    </div>
                </IntroSection>
                

            </div>

        </div>

        <!-- <SecondaryNavbar 
        :navItemStyle="this.navItemStyle"
        :navStyle="this.navStyle"
        /> -->

        
        
        <IntroSection>
            <BlackBox />
            <h2>Details Matter.</h2>
            <div class= "row">
                We focus on every little detail while understanding your core business, which in turn helps us to precisely define your brand's meaning, character and personality. In turn, this helps us to connect all elements of your brand thus leading to a complete brand experience. All made possible by a team bursting with passion to build fine brands.
            </div>
        </IntroSection>
        
        <Services />
        <!-- <MeetTheTeam /> -->



        <!-- <div id="WhatWeDoCarousel">
            <WhatWeDoCarousel />
        </div>
        <div id="MeetTheTeam">            
            <MeetTheTeam />
        </div> -->
        
        
    </div>
</template>

<script>
import WhatWeDoCarousel from './WhatWeDoCarousel.vue';
import MeetTheTeam from './MeetTheTeam.vue';
import BlackBox from '../../UI/BlackBox.vue';
import SecondaryNavbar from '../../UI/SecondaryNavbar.vue';
import IntroSection from '../../UI/IntroSection';
import Services from './Services.vue';

export default {
    components: {
        WhatWeDoCarousel,
        MeetTheTeam,
        BlackBox,
        SecondaryNavbar,
        IntroSection,
        Services
    },
    data() {
        return {
            navItemStyle: {
                'color': '#FFDB00',
                'backgroundColor': '',
                'opacity': '1',
                'fontSize': '1.3rem',
            },
            navStyle: {
                'backgroundColor':'#666666 !important',
                'opacity': '1'
            }
        }
    }
}
</script>

<style scoped>

    #cover {
        font-family: 'LatoRegular', sans-serif;
        height: 100%;
        width: 100%;
        /* background-color: #E9E9E9; */
        background-color: white;
        font-size: 0.85rem;
    } 
/* 
    #WhatWeDoCarousel {
        height: 50%;
        width: 100%;
        
    }

    #MeetTheTeam {
        height: 50%;
        width: 100%;
        
        
    } */

    #banner {
        width: 100%;
         
    }

    /* .introSections {
        padding-left: 200px;
        padding-top: 5px;
        padding-right: 200px;
        margin-top: 10px;
        margin-bottom: 20px;
    } */

    .bannerHeader {
        /* display: flex; */
        align-items: center;
        padding-left: 33% !important;
        background-color: #FFDB00;
        height: 6rem !important;
        display: table !important;
        width: 100%;
        /* vertical-align: middle; */
    }

    .bannerText {
        display: table-cell !important;
        vertical-align: middle !important;
    }
    
    #IntroSection1 {
        margin-bottom: 30px;
    }

    #IntroSection3 {
        margin-left: 40px;
        
    }

    @media (max-width: 800px) {
        .bannerHeader {
            padding-left:20px !important;
        }
    }

     @media (min-width: 1001px) and (max-width: 2200px) {
         .bannerHeader {
            padding-left: 17% !important;
            padding-right: 17% !important;
            height: 4rem !important;
         }
     }

     
    

</style>
