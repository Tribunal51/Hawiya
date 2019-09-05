<i18n>
    {
        "en": {
            "line1": "Design your identity with a professional team" 
        },
        "ar": {
            "line1": "صمم هويتك مع فريق محترف"
        }
    }
</i18n>

<template>
    <div class="Cover">
        <div class="navbarHeight"></div>
        <div class="filler">
            
            <div class="flex-container-align-bottom">
                <IntroSection :homePage="true">        
                    <BlackBox>
                        <h3 class="bold">{{ $t('line1') }}</h3>
                    </BlackBox>
                    <div class="row">
                        <div class="col gray">
                            Our design team gives you the professional edge you need to stand out your identity.
                        </div>
                    </div>
                    
                </IntroSection>
                
                    <div class="yellowContainerTopRightCurved">
                        <IntroSection :homePage="true">  
                            <BlackBox>
                                <div class="secondHeader">Let us build an outstanding brand for you</div>
                            </BlackBox>
                            <div class="row mt-2">
                                <div class="col">
                                    <StartHere />
                                </div>
                            </div>
                        </IntroSection>
                    </div>
                    
            </div>
                <!-- <div class="col-md"></div> -->
                <!-- <div class="col-md rightSide">                  
                    <div class="arrowButton" @click="showSideBar=!showSideBar"> 
                        {{ this.showSideBar ? '>' : '&lt;' }}
                    </div>
                    <transition name="slide-fade">
                        <SideBar v-if="showSideBar" />
                    </transition>     
                </div> -->
                                            

            <!-- <div class="testBox">

            </div>  -->

            <!-- <div class="row">
                <div class="col">
                    <IntroSection :homePage="true">
                        <div class="A">Test</div>
                    </IntroSection>
                </div>
            </div> -->


            <!-- <StickyLeftPanel top="10%" width="60%">
                <IntroSection> 
                    <BlackBox>
                        <h3 class="bold">{{ $t('line1') }}</h3>
                    </BlackBox>
                    <div class="row">
                        <div class="col gray">
                            Our design team gives you the professional edge you need to stand out your identity.
                        </div>
                    </div>
                </IntroSection>
                <div class="row yellowRow">
                    <div class="col-md yellowContainerTopRightCurved">
                        <IntroSection>
                            <BlackBox>
                                <h5>Let us build an outstanding brand for you</h5>
                            </BlackBox>
                            <div class="row">
                                <div class="col">
                                    <StartHere />
                                </div>
                            </div>
                        </IntroSection>
                    </div>
                </div>  
            </StickyLeftPanel> -->

        
            <StickySidebar />
            
            

        </div> 
        <div class="footerSection">
            <Footer />              
        </div>
        
    </div>
</template>

<script>
import Footer from '../../UI/Footer';
import BlackBox from '../../UI/BlackBox';
import IntroSection from '../../UI/IntroSection';
import StartHere from '../../UI/StartHere';
import SideBar from './SideBar';
import StickySidebar from '../../UI/StickySidebar';
import StickyLeftPanel from '../../UI/StickyLeftPanel';
// import VueI18n from 'vue-i18n';
// import Vue from 'vue';

export default {
    
    components: {
        Footer,
        BlackBox,
        IntroSection,
        StartHere,
        SideBar,
        StickySidebar,
        StickyLeftPanel
    },
    mounted() {
        // this.$i18n.locale='ar';
        console.log(this.$i18n.locale);
        
    },
    data() {

        return {
            showSideBar: true,
            
        }
    }
}
</script>

<style scoped>

    .navbarHeight {
        height: 15vh;
        /* background-color: black; */
    }

    .filler {
        min-height: 75vh;
        width: 100%;
        height: 100%;
        position: relative;
        /* background-color: red; */
        display: flex;
        align-items: flex-end;
    }


    .flex-container-align-bottom {
        /* height: 100%; */
        min-height: 60vh;
        width: 50%;
        display: flex;
        flex-direction: column;
        /* width: 50% !important; */

        /* align-items: flex-end; */
        justify-content: flex-end;
        /* background-color: red; */
        /* background-color: green; */
    
    }

    @media (max-width: 768px) {
        .flex-container-align-bottom {
            width: 100%;
        }
    }

    .yellowContainerTopRightCurved {
        width: 100%;
        height: auto;
        background-color: #FFDB00;
        border-radius: 0px 50px 0px 0px;
    }

    .rightSide {
        min-height: 60vh;
        /* background-color: yellow; */
        /* padding-top: 10px;
        padding-bottom: 10px; */
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
        align-items: center;
    }

    


    .bold {
        font-family: 'LatoBlack', sans-serif;
        font-size: 2.3rem;
        font-weight: 1000;
    }

    .gray {
        font-family: 'LatoRegular', sans-serif;
        color: gray;
        font-weight: 500;
        font-size: 1rem;
    }

    .testBox {
        width: 100%;
        height: 100%;
        display: flex;
    }

    .secondHeader {
        font-size: 1.5rem;
        font-family: 'LatoMedium', sans-serif;
        font-weight: 500;
    }

    /* .sidebarSection {
        width: 100%;
        height: 100%;
        position: relative;
        background-color: red !important;  
    } */

    .footerSection {
        display: flex;
        align-items: center;
        min-height: 10vh;
        /* background-color: red; */
    }

</style>
