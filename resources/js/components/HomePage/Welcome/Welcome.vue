<template>
    <div class="Cover">
        <div class="navbarHeight"></div>
        <div class="filler">
            <div class="row">
                <div class="col-md flex-container-align-bottom">
                    <IntroSection>
                        <BlackBox>
                            <h3>Design your identity with a professional team</h3>
                        </BlackBox>
                        <div class="row">
                            Our design team gives you the professional edge you need to stand out your identity.
                        </div>
                    </IntroSection>
                    <div class="row yellowRow">
                        <div class="col-md yellowContainerTopRightCurved">
                            <IntroSection>
                                <BlackBox>
                                    <h5>Let us build an outstanding brand for you</h5>
                                </BlackBox>
                                <div class="row">
                                    <StartHere />
                                </div>
                            </IntroSection>
                        </div>
                    </div>
                </div>
                <div class="col-md rightSide">
                    <!-- <div class="row">
                        <button class="btn btn-primary" @mouseenter="showSideBar=true" @mouseleave="showSideBar=false"> Test </button>
                    </div> -->
                    
                    <SideBar v-show="showSideBar" />
                          
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
    .Cover {
        /* padding-top: 15vh; */
        /* Total height: 85vh */
    }

    .navbarHeight {
        height: 15vh;
        background-color: black;
    }

    .filler {
        min-height: 70vh;
        
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

    .flex-container-align-right {
        height: 60vh;
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
        align-items: center;
        background-color: red;
    }

    .rightSide {
        height: 60vh;
        background-color: yellow;
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
        align-items: center;
    }

</style>
