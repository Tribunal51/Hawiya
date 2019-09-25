<i18n>
    {
       "en": {
            "Logo Design": "Logo Design",
            "Branding": "Branding",
            "Stationery": "Stationery",
            "Packaging": "Packaging",
            "Social Media": "Social Media",
            "Website": "Website",
            "Promotional": "Promotional",
            "Interested": "Interested?",
            "line1": "Let us build an outstanding brand for you."
        },
        "ar": {
            "Logo Design": "تصميم شعار",
            "Branding": "العلامات التجارية",
            "Stationery": "ادوات مكتبيه",
            "Packaging": "التعبئة والتغليف",
            "Social Media": "وسائل التواصل الاجتماعي",
            "Website": "موقع الكتروني",
            "Promotional": "الترويجية",
            "Interested": "مهتم؟",
            "line1": "دعونا نبني علامة تجارية متميزة لك."

        }
    }
</i18n>

<template>
    <div class="Cover">
        <IntroSection>
            <div class="row">
                <div class="col-md">
                    <BlackBox />
                    <div class="flex-container">
                        <button 
                            class="btn btn-outline-warning flexItem" 
                            v-for="service in services" 
                            :key="service.name"
                            @click="buttonClicked(service.link)">
                            <strong>{{ $t(service.name) }}</strong>
                        </button>
                    </div>
                    
                </div>
                <div class="col-md">
                    <BlackBox>
                        <h5>{{ $t('Interested') }}</h5>
                    </BlackBox>
                    <div class="row">
                        <div class="col">
                            <h3>{{ $t('line1') }} </h3>
                            <StartHere :differentPage="differentPage" />
                        </div>
                    </div>
                </div>
            </div>
        </IntroSection>
    </div>
</template>

<script>
import IntroSection from './IntroSection';
import BlackBox from './BlackBox';
import StartHere from './StartHere';

export default {
    components: {
        IntroSection,
        BlackBox,
        StartHere
    },
    props: [
        "differentPage"
    ],
    data() {
        return {
            services: [
                {
                    name: 'Logo Design',
                    link: '/design/logo-design/package'
                },
                {
                    name: 'Branding',
                    link: '/design/branding/package'
                },
                {
                    name: 'Social Media',
                    link: '/design/social-media/package'
                },
                {
                    name: 'Stationery',
                    link: '/design/stationery/items'
                },
                {
                    name: 'Packaging',
                    link: '/design/packaging/products'
                },
                {
                    name: 'Promotional',
                    link: '/design/promotional'
                }
            ]
        }
    },
    methods: {
        buttonClicked(link) {
            this.$store.dispatch('resetAllStates');
            //this.$router.push(link);
            if(this.differentPage) {
               location.href=link;
            }
            else {
                this.$router.push(link);
            }
        }
    }
}
</script>

<style scoped>
    .Cover {
        border-top: 5px solid #FFDB00;
        background-color: #E9E9E9;
    }

    .flex-container {
        display: flex;
        /* justify-content: center; */
        flex-wrap: wrap;

    }

    .flexItem {
        /* width: 30%; */
        width: 150px;
        margin: 2px;
        border-radius: 0%;
        border: 2px solid #FFDB00;
        font-family: 'LatoBold', sans-serif;
        color: black;
        font-size: 1.1rem;
    }

    

</style>
