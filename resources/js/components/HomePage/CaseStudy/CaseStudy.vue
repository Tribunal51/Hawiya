<i18n>
    {
        "en": {
            "title": "Case Study",
            "line1": "Our strategic approach in every brand ensures that the creative impression with echo throughout your business.",
            "Interested": "Interested ?",
            "InterestedLine1": "Let us build an outstanding brand for you"
        },
        "ar": {
            "title": "دراسة الحالة",
            "line1": "نهجنا الاستراتيجي في كل علامة تجارية يضمن أن الانطباع الإبداعي مع صدى في جميع أنحاء عملك.",
            "Interested": "مهتم؟",
            "InterestedLine1": "دعونا نبني علامة تجارية متميزة لك"
        }
    }
</i18n>

<template>
    <div id="cover">       
        <IntroSection>
            <div class="row">
                <div class="col">
                    <h1 class="paddingHeader">{{ $t('title') }}</h1>
                </div>
            </div>
            <BlackBox>
                <h4>{{ $t('line1') }}</h4>
            </BlackBox>            
        </IntroSection>
        <div class="outerSection">   
            <IntroSection :styling="{paddingTop: '0px !important', paddingBottom: '0px !important'}">         
                <div class="innerSection px-3 py-3">
                    <!-- <Step v-for="(path,key) in images" :key="key" :image="path" :alt="key" /> -->
                    
                                 
                    <Step v-for="step in steps" :key="step.name.en" :image="step.image" :alt="step.name[$root.$i18n.locale]" />
                </div>  
            </IntroSection>          
        </div>
        <IntroSection>
            <div class="row">
                
                <div class="col-sm-5">
                    <BlackBox>
                        <h4>{{ $t('Interested') }}</h4>
                    </BlackBox>                   
                </div>
                <div class="col-lg-6">
                    <BlackBox>
                        <h2>{{ $t('InterestedLine1') }}</h2>
                    </BlackBox>
                    <div class="row">
                        <div class="col">
                            <StartHere />
                        </div>
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
import StartHere from '../../UI/StartHere';

export default {
    components: {
        IntroSection,
        BlackBox,
        Step,
        StartHere
    },
    data() {
        return {
            images: {
                "Client's Request": "/storage/CaseStudy/ClientRequest.png",
                "Inspiration": "/storage/CaseStudy/Inspiration.png",
                "Catch the idea": "/storage/CaseStudy/CatchTheIdea.png",
                "Sketch":"/storage/CaseStudy/Sketch.png",
                "Done":"/storage/CaseStudy/Done.png"
            },
            steps: [
                {
                    name: {
                        en: "Client's Request", 
                        ar: "طلب العميل"
                    },
                    image: "/storage/CaseStudy/ClientRequest.png"
                },
                {
                    name: {
                        en: "Inspiration",
                        ar: "وحي - الهام"
                    },
                    image: "/storage/CaseStudy/Inspiration.png"
                },
                {
                    name: {
                        en: "Catch the idea",
                        ar: "قبض على الفكرة"
                    },
                    image: "/storage/CaseStudy/CatchTheIdea.png"
                },
                {
                    name: {
                        en: "Sketch",
                        ar: "رسم"
                    },
                    image: "/storage/CaseStudy/Sketch.png"
                },
                {
                    name: {
                        en: "Done",
                        ar: "منجز"
                    },
                    image: "/storage/CaseStudy/Done.png"
                }
            ]
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
        width: 100%;
    }

    .innerSection {
        border-top: solid #FFDB00 10px;
        border-bottom: solid #FFDB00 10px;
        display: flex;
        flex-flow: row wrap;
        /* margin-left: 30% !important;
        margin-right: 35% !important;
        padding-right:40% !important; */

        /* width: 35%; */
    }

    
</style>
