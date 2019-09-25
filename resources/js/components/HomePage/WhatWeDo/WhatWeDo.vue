<i18n>
    {
        "en": {
            "title": "What We Do",
            "line1": "We have years of experience working with entrepreneurs just like you. We've learned it's best to start by listening to your story. Then we review your existing brand and offer you options from there. Below we've listed our most requested packages, but each of these can be tweaked or we can give you a completely custom quote. ",
            "line2": "We believe in every project we take on. Our belief can be seen in our attention to detail and meticulous care which shines through, in every brand we build.",
            "line3": "We help businesses find a brand experience that's fresh & distinct by providing them with innovative, strategic & creative solutions.",
            "line4": "Details Matter",
            "line5": "We focus on every little detail while understanding your core business, which in turn helps us to precisely define your brand's meaning, character and personality. In turn, this helps us to connect all elements of your brand thus leading to a complete brand experience. All made possible by a team bursting with passion to build fine brands."
        },
        "ar": {
            "title": "الذي نفعله",
            "line1": "لدينا سنوات من الخبرة في العمل مع رواد الأعمال مثلك تمامًا. لقد تعلمنا أنه من الأفضل أن تبدأ بالاستماع إلى قصتك. ثم نقوم بمراجعة علامتك التجارية الحالية ونقدم لك خيارات من هناك. أدناه ، أدرجنا الحزم الأكثر طلبًا ، لكن يمكن تعديل كل منها أو يمكن أن نقدم لك عرض أسعار مخصص تمامًا.",
            "line2": "نحن نؤمن بكل مشروع نقوم به. يمكن أن نرى إيماننا في اهتمامنا بالتفاصيل والرعاية الدقيقة التي تتألق في كل علامة تجارية نبنيها.",
            "line3": "نحن نساعد الشركات على إيجاد تجربة العلامة التجارية الجديدة والمتميزة من خلال تزويدهم بحلول مبتكرة واستراتيجية وخلاقة.",
            "line4": "التفاصيل",
            "line5": "نحن نركز على كل التفاصيل الصغيرة بينما نفهم عملك الأساسي ، والذي بدوره يساعدنا على تحديد معنى علامتك التجارية وشخصيتها وشخصيتها بدقة. وهذا بدوره يساعدنا على ربط جميع عناصر علامتك التجارية مما يؤدي إلى تجربة العلامة التجارية الكاملة. كل ذلك جعله ممكنًا من خلال فريق مليء بالشغف لبناء علامات تجارية راقية."
        }
    }
</i18n>

<template>
    <div id="cover" class="alignLang">  

        
        <div class="bannerHeader">
            <IntroSection :styling="{paddingTop: '0px !important', paddingBottom: '0px !important'}">
                <h1> {{ $t('title') }}</h1>
            </IntroSection>
        </div>
        
                                           
        
        <div class="row">
            <div class="col-sm">                
                <IntroSection>
                    <div id="IntroSection1">
                        <BlackBox>                   
                            {{ $t('line1') }}
                        </BlackBox>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div id="IntroSection2">
                                <BlackBox >                               
                                    {{ $t('line2') }}
                                </BlackBox>
                            </div>
                        </div>
                        <div class="col-md">
                            <div id="IntroSection3">
                                <BlackBox>   
                                    {{ $t('line3') }}                           
                                </BlackBox>
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
            <BlackBox>
                <h2>{{ $t('line4') }}</h2>
            </BlackBox>
            <div class= "row">
                <div class="col">
                    {{ $t('line5') }}
                </div>
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
import Services from '../../UI/Services';

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
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        background-color: #FFDB00;
        /* height: 6rem !important; */
        width: 100%;
        /* vertical-align: middle; */
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .bannerHeaderContent {
        width: 100%;
        height: 100%;
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

     
    

</style>
