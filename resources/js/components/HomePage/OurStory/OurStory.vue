<i18n>
    {
        "en": {
            "header": "OUR STORY",
            "text": "At Impress printing we are passionate about everything we create, what makes us happy is to deliver a product that helps you reach your goal. Commuication is the key to success; hence our team will be working by your side, as consultants while our production team will handle your job as a masterpiece."
        },
        "ar": {
            "header": "قصتنا",
            "text": "في Impress printing ، نحن متحمسون لكل شيء نبتكره ، وما يجعلنا سعداء هو تقديم منتج يساعدك على الوصول إلى هدفك. التواصل هو مفتاح النجاح؛ ومن ثم ، سيعمل فريقنا بجانبك ، كمستشارين بينما سيتعامل فريق الإنتاج لدينا مع عملك كعمل تحفة."
        }
    }

</i18n>

<template>
    <div class="Cover">
        <div class="darkBlueLine"></div>
        <div class="imageSection">
            <img class="image" :src="imageLink" :alt="imageLink" />
        </div>
        <div class="informationSection">
            <IntroSection> 
                <div class="row">
                    <div class="col headerSection">
                        
                        <h2 class="header">{{ $t('header') }}</h2>
                            
                        <BlackBox :blue="true" />
                    </div>
                </div> 
                <div class="row">
                    <div class="col textSection gray">
                        {{ $t('text')}}
                    </div>
                </div> 
            </IntroSection>
        </div> 
        
    </div>
</template>

<script>
import BlackBox from '../../UI/BlackBox';
import IntroSection from '../../UI/IntroSection';
export default {
    data() {
        return {
            imageLink: "/storage/OurStory.png"
        }
    },
    mounted() {

    },
    components: {
        BlackBox, 
        IntroSection
    }
}
    
</script>

<style scoped>
    .Cover {
        /* background-color: red !important;   */
        /* min-height: 88vh; */
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    .darkBlueLine {
        background-color: #00AEEF;
        width: 100%;
        height: 3vh;
        color: #00AEEF;
        border: 3px solid #00AEEF;
        display: block;
    }

    .imageSection {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        /* min-height: 40vh; */
        /* background-color: yellow; */
    }


    .image {
        width: 100%;
        height: 100%;
        min-height: 20vh;
    }

    .informationSection {
        /* min-height: 45vh; */
        display: flex;
    }

    .header {
        padding-top: 20px;
        font-weight: 900;
        font-family: 'LatoBlack', sans-serif;
        font-size: 2rem;
        /* font-size: 6vw; */
        /* background-color: red; */
    }

    .textSection {
        font-size: 1.3rem;
        /* font-size: 4vw; */
        /* background-color: red; */
    }

    

</style>