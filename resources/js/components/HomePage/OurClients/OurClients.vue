<i18n>
    {
        "en": {
            "OUR CLIENTS": "OUR CLIENTS",
            "line1": "Interested ?",
            "line2": "Let us build an outstanding brand for you.",
            "DOWNLOAD THE APP": "DOWNLOAD THE APP"
        },
        "ar": {
            "OUR CLIENTS": "عملائنا",
            "line1": "مهتم؟",
            "line2": "دعنا نبني علامة تجارية متميزة لك.",
            "DOWNLOAD THE APP": "قم بتحميل التطبيق"
        }
    }
</i18n> 

<template>
    <div class="Cover">
        <div class="row">
            <div class="col headerSection">
                <IntroSection :styling="{'paddingBottom': '0px'}">
                    <div class="row">
                        <div class="col">
                            <h1 class="headerText">{{ $t('OUR CLIENTS') }}</h1>
                        </div> 
                    </div> 
                    <BlackBox :blue="true" />
                </IntroSection> 
            </div> 
        </div> 
        <div class="row">
            <div class="col clientsContainer">
                <img :src="imageLink" class="clientsImage" :alt="imageLink" />
            </div>
        </div> 
        <div class="row">
            <div class="col interestedSection">
                <IntroSection :styling="{'paddingBottom': '0px'}">
                    <div class="row">
                        <div class="col leftSection">
                            <h4 class="leftSectionLine1">{{ $t('line1') }}</h4> 
                            <div class="leftSectionLine2Container">
                                <span class="leftSectionLine2">{{ $t('line2') }}</span>
                                <button class="DownloadTheAppButton" href="">{{ $t('DOWNLOAD THE APP') }}</button>
                            </div> 
                        </div> 
                        <div class="col rightSection">
                            <a href="" class="rightSectionItem"><img class="rightSectionImage" :src="appleStoreLink" :alt="appleStoreLink" /></a> 
                            <a href="" class="rightSectionItem"><img class="rightSectionImage" :src="playStoreLink" :alt="playStoreLink" /></a>
                            
                        </div> 
                    </div> 
                </IntroSection> 
            </div>
        </div> 
    </div>

</template>

<script>
import BlackBox from '../../UI/BlackBox';
import IntroSection from '../../UI/IntroSection';

export default {
    components: {
        BlackBox,
        IntroSection
    },
    mounted() {

    },
    data() {
        return {
            imageLink: "/storage/clients.png",
            appleStoreLink: "/storage/appStore.png",
            playStoreLink: "/storage/googlePlay.png"
        }

    },
}
</script>

<style scoped> 

    .Cover {

    }

    .headerText {
        font-size: 2.5rem; 
        font-weight: 900;
        font-family: 'LatoBlack', sans-serif;
    }

    .clientsContainer {
        padding-left: 100px;
        padding-right: 100px;
        padding-top: 50px;
        padding-bottom: 50px;
        min-height: 30vh;
        background-color: white;
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    .clientsImage {
        width: 100%;
        height: auto;
    }

    @media (max-width: 768px) {
        .clientsContainer {
            padding-left: 5px;
            padding-right: 5px;
            padding-bottom: 2px;
            padding-top: 2px;
        }
    }

    .interestedSection {
        display: flex;
        align-items: center;
        min-height: 20vh;
        padding-top: 5vh;
        padding-bottom: 5vh;
        background-color: #00AEEF;
        color: white;
    }

    .leftSectionLine2Container {
        /* background-color: red; */
        /* display: flex;
        flex-flow: row wrap;
        justify-content: flex-start; */
    }

    .leftSectionLine1 {
        font-size: 1.2rem;
        font-family: 'LatoRegular', sans-serif;
    }

    .leftSectionLine2 {
        font-size: 1.8rem;
        font-family: 'LatoBold', sans-serif; 
        
    }

    .DownloadTheAppButton {
        background-color: black;
        border: 1px solid black;
        color: white;
        padding: 5px;
        /* width: 10rem; */
        font-weight: 900;
        font-family: 'LatoBold', sans-serif;
    }


    .rightSection {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        /* background-color: red; */
    }

    .rightSectionItem {
        margin: 10px;
        width: 150px;
        height: auto;
    }

    .rightSectionImage {
        width: 100%;
        height: auto;
    }

</style>