<template>
    <div class="Cover">
        <div class="navbarHeight"></div>
        <div class="filler">
            <div class="row">
                <div class="col-md flex-container-align-bottom">
                    <IntroSection styling="paddingRight: 0px !important; paddingBottom: 0px">
                        <IntroSection styling="paddingRight: 0px !important"> 
                            <BlackBox>
                                <h3>Design your identity with a professional team</h3>
                            </BlackBox>
                            <div class="row">
                                <div class="col">
                                    Our design team gives you the professional edge you need to stand out your identity.
                                </div>
                            </div>
                        </IntroSection>
                    </IntroSection>
                    <!-- <div class="row yellowRow">
                        <div class="col-md yellowContainerTopRightCurved">
                            <IntroSection styling="paddingRight: 0px !important; paddingBottom: 0px">
                                <IntroSection styling="paddingRight: 0px !important">
                                    <BlackBox>
                                        <h5>Let us build an outstanding brand for you</h5>
                                    </BlackBox>
                                    <div class="row">
                                        <div class="col">
                                            <StartHere />
                                        </div>
                                    </div>
                                </IntroSection>
                            </IntroSection>
                        </div>
                    </div> -->
                </div>
                <div class="col-md rightSide">
                    <!-- <div class="row">
                        <button class="btn btn-primary" @mouseenter="showSideBar=true" @mouseleave="showSideBar=false"> Test </button>
                    </div> -->
                    
                    <div class="arrowButton" @click="showSideBar=!showSideBar"> 
                        {{ this.showSideBar ? '>' : '&lt;' }}
                    </div>
                    <transition name="slide-fade">
                        <!-- <SideBar v-if="showSideBar" /> -->
                    </transition>     
                </div>
            </div>                                 
        </div>               
        <div class="row">
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

export default {
    components: {
        Footer,
        BlackBox,
        IntroSection,
        StartHere,
        SideBar
    },
    data() {
        return {
            showSideBar: true
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
        
    }


    .flex-container-align-bottom {
        height: 60vh;
        display: flex;
        flex-direction: column;
        
        /* align-items: flex-end; */
        justify-content: center;
        /* background-color: red; */
    
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



    .arrowButton {
        /* font-family: 'LatoRegular', sans-serif; */
        background: transparent;
        font-size: 4rem;
        border: none;
        cursor: pointer;
        /* position: absolute; */
    }

    /* Enter and leave animations can use different duration and timing functions */

    .slide-fade-enter-active {
        transition: all .5s ease;
    }

    .slide-fade-leave-active {
        transition: all .5s cubic-bezier(1.0, 1.0, 1.0, 1.0);
    }

    .slide-fade-enter, .slide-fade-leave-to {
        /* slide-fade-leave-active below version 2.1.8 */
        transform: translateX(10px);
        opacity: 0;
    }

    

</style>
