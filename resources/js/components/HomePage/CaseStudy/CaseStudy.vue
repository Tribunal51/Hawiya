<template>
    <div id="cover">       
        <IntroSection>
            <h1 class="paddingHeader">Casestudy</h1>
            <BlackBox />
            <div class="row">
                <h4>Our strategic approach in every brand ensures that the creative impression will echo throughout your business.</h4>
            </div>            
        </IntroSection>
        <div class="outerSection">            
            <div class="innerSection container py-3 px-3 card-group">
                <Step v-for="(path,key) in images" :key="key" :image="path" :alt="key" />                               
            </div>            
        </div>
        <IntroSection>
            <div class="row">
                
                <div class="col-sm-5">
                    <BlackBox />
                    <div class="row">
                        <h4>Interested ?</h4>
                    </div>                    
                </div>
                <div class="col-lg-6">
                    <BlackBox />
                    <div class="row">
                        <h1>Let us build an outstanding brand for you</h1>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-outline-dark" id="startButton">START HERE</button>
                    </div>
                </div>
            </div>
            
        </IntroSection>
    </div>
</template>

<script>
import IntroSection from '../../UI/IntroSection.vue';
import BlackBox from '../../UI/BlackBox.vue';
import Step from './Step.vue';

export default {
    components: {
        IntroSection,
        BlackBox,
        Step
    },
    data() {
        return {
            images: {
                "Client's Request": "/storage/CaseStudy/ClientRequest.png",
                "Inspiration": "/storage/CaseStudy/Inspiration.png",
                "Catch the idea": "/storage/CaseStudy/CatchTheIdea.png",
                "Sketch":"/storage/CaseStudy/Sketch.png",
                "Done":"/storage/CaseStudy/Done.png"
            }
        }
    }
}
</script>

<style scoped>

    #cover {
        width: 100%;
        height: 100%;   
        /* min-height: 100vh !important; */
        font-family: 'LatoRegular', sans-serif;
        background-color: #E9E9E9;
    }

    .paddingHeader {
        padding-top: 10px !important;
    }

    .outerSection {
        background-color: white;
        padding-left: 33%;
        padding-right: 27%;
    }

    .innerSection {
        border-top: solid #FFDB00 10px;
        border-bottom: solid #FFDB00 10px;
        /* margin-left: 30% !important;
        margin-right: 35% !important;
        padding-right:40% !important; */

        /* width: 35%; */
    }

    #startButton {
        border-radius: 0% ;
        border: 3px solid black ;
        font-family: 'LatoBold', sans-serif;
        font-size: 1.1rem;
        
    }

    @media (max-width:1000px) {
        .outerSection {
            padding-left: 0px;
            padding-right: 0px;
        }
    }

    @media (min-width: 1001px) and (max-width: 2200px) {
        .outerSection {
            padding-left: 17% !important;
            padding-right: 10% !important;
        }

    }
</style>
