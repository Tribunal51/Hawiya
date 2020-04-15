<i18n>
    {
        "en": {
            "line1": "Design your identity with a professional team",
            "line2": "Our design team gives you the professional edge you need to stand out your identity.",
            "line3": "Let us build an outstanding brand for you",
            "splashLine1": "Design | Signage | Print",
            "splashLine2": "Small-scale to industrial, we can cover all your jobs!"

        },
        "ar": {
            "line1": "صمم هويتك مع فريق محترف",
            "line2": "يمنحك فريق التصميم لدينا الميزة الاحترافية التي تحتاجها لتبرز هويتك.",
            "line3": "دعونا نبني علامة تجارية متميزة لك",
            "splashLine1": "التصميم | لافتات | طباعة",
            "splashLine2": "على نطاق صغير للصناعية ، يمكننا تغطية جميع وظائفك!"
        }
    }
</i18n>

<template>
    <!-- <div v-if="this.$root.$i18n.locale === 'en'" class="Cover"> -->
    <div class="Cover">
        <div class="navbarHeight"></div>
        <div class="filler">
           <div class="splash-image-container">
                <div class="splash-section">
                    <h1 class="splashHeader1">{{ $t('splashLine1') }}</h1> 
                    <span class="splashHeader2">{{ $t('splashLine2') }}</span>
                </div>
            </div>
            <div class="flex-container-align-bottom">
                <IntroSection>    
                    <div class="row">
                        <div class="col-md-8 line1Section">
                            <BlackBox :blue="true">
                                <h3 class="bold alignLang">{{ $t('line1') }}</h3>
                            </BlackBox>
                        </div> 
                        <div class="col-md-4">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-8 gray alignLang line2Section">
                            {{ $t('line2') }}
                
                        </div> 
                        <div class="col-md-4 line3Section">
                            <BlackBox :blue="true">
                                <h3>{{ $t('line3') }}</h3>
                            </BlackBox> 
                        </div> 
                    </div>
                    
                        
                    
                    
                </IntroSection>
                
                    <!-- <div class="yellowContainerCurved">
                        <IntroSection :homePage="true">  
                            <BlackBox>
                                <div class="secondHeader alignLang">{{ $t('line3') }}</div>
                            </BlackBox>
                            <div class="row mt-2">
                                <div class="col alignLang">
                                    <StartHere />
                                </div>
                            </div>
                        </IntroSection>
                    </div> -->
                    
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

        
            <!-- <StickySidebar /> -->
            
            

        </div> 
        <!-- <div class="footerSection">
            <Footer />              
        </div> -->
        
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

    .Cover {}

    .navbarHeight {
        height: 15vh;
        /* background-color: black; */
    }

    .filler {
        min-height: 85vh;
        width: 100%;
        height: 100%;
        position: relative;
        /* background-color: red; */
        display: flex;
        flex-direction: column;
        /* align-items: flex-end; */
    }

    .splash-image-container {
        min-height: 35vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: url('/storage/SplashImage.png') no-repeat;
        /* padding-left: 1000px; */
        /* padding-left: 100px; */
        background-size: 100% 80%;
        /* background-size: contain; */
        /* background-origin: content-box; */
        /* margin: 100px; */
        margin-left:8%;
        

    }




    .flex-container-align-bottom {
        /* height: 100%; */
        min-height: 55vh;
        width: auto;
        display: flex;
        flex-direction: column;
        /* width: 50% !important; */

        /* align-items: flex-end; */
        /* justify-content: flex-end; */
        /* background-color: red; */
        /* background-color: green; */
    
    }

    

    

    .splashHeader1 {
        font-size: 2.5rem; 
        /* font-size: 5vw; */
        font-weight: 300;
        color: white;
    }

    .splashHeader2 {
        font-size: 1.3rem;
        /* font-size: 3vw; */
        color: white;
        font-style: italic;
        font-family: 'LatoRegular', sans-serif;
    }

    .splash-section {
        /* background-color: red; */
        margin-right: 25%
    }

    @media (max-width: 768px) {
        
        .flex-container-align-bottom {
            width: 100%;
        }

        .splash-section {
            margin-right: 0%;
        }

        .splash-image-container {
            margin-left: 0%;
            /* background: #00AEEF;
            border-radius: 10%; */
            
        }

        .splashHeader1 {
            font-size: 5.5vw !important;
        }

        .splashHeader2 {
            width: 80%;
            /* background-color: red; */
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            font-size: 3.5vw !important;
        }
    }

    @media(min-width:769px) and (max-width: 1044px) {
        .splash-image-container {
            margin-left: 0% !important;
        }
    }

    .yellowContainerCurved {
        width: 100%;
        height: auto;
        background-color: #FFDB00;
        /* border-radius: 0px 50px 0px 0px; */
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

    


    /* 
    LTR RTL Specific Styles
    */

    html[dir="ltr"] .alignLang {
        text-align: left;
    }

    html[dir="rtl"] .alignLang {
        text-align: right;
    }


    html[dir="ltr"] .yellowContainerCurved {
        border-radius: 0px 50px 0px 0px;
    }

    html[dir="rtl"] .yellowContainerCurved {
        border-radius: 50px 0px 0px 0px;
    }

</style>
