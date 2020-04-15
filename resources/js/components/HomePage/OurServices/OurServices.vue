<i18n>
    {
        "en": {
            "header": "OUR SERVICES",
            "Design": "Design",
                "Brand Identity": "Brand Identity",
                "Brand Strategy": "Brand Strategy",

            "Printing": "Printing",
                "Commercial": "Commercial",
                    "Business Card": "Business Card",
                    "Flyer": "Flyer",
                    "Brochure": "Brochure",
                    "Receipt Books": "Receipt Books",
                    "Forms": "Forms",
                    "Letter Head": "Letter Head",
                    "Envelopes": "Envelopes",
                    "Note Pads": "Note Pads",
                    "Folder": "Folder",
                    "Gift Cards": "Gift Cards",
                    "Stickers": "Stickers",

                "Packaging": "Packaging",
                    "Bags": "Bags",
                    "Boxes - Top & Bottom Tray & Lid": "Boxes - Top & Bottom Trap & Lid",
                    "Folding carton box": "Folding carton box",
                    "Food packaging box": "Food packaging box",
                    "Cup Holder": "Cup Holder",
                    "Paper Cup": "Paper Cup",
                    "Cake Base": "Cake Base",
                    "Hardcover Box": "Hardcover Box",
                    "Wrapping Sheets": "Wrapping Sheets",

            "Signage": "Signage",
                "Exhibition Booths": "Exhibition Booths",
                "Workstations": "Workstations",
                "Catering station": "Catering station",
                "Vinyl Sticker": "Vinyl Sticker",
                "Banners": "Banners",
                "Roll Up - Pop Up": "Roll Up - Pop - Up"

        },
        "ar": {
            "header": "خدماتنا",
            "Design": "التصميم",
                "Brand Identity": "هوية العلامة التجارية",
                "Brand Strategy": "استراتيجية العلامة التجارية",

            "Printing": "الطباعة",
                "Commercial": "تجاري",
                    "Business Card": "بطاقة العمل",
                    "Flyer": "نشرة إعلانية",
                    "Brochure": "كراسة",
                    "Receipt Books": "كتب استلام",
                    "Forms": "نماذج",
                    "Letter Head": "رأس الرسالة",
                    "Envelopes": "المغلفات",
                    "Note Pads": "منصات الملاحظات",
                    "Folder": "مجلد",
                    "Gift Cards": "بطاقات الهدايا",
                    "Stickers": "ملصقات",

                "Packaging": "التعبئة والتغليف",
                    "Bags": "أكياس",
                    "Boxes - Top & Bottom Tray & Lid": "صناديق - فخ وغطاء علوي وسفلي",
                    "Folding carton box": "علبة كرتون قابلة للطي",
                    "Food packaging box": "مربع تغليف المواد الغذائية",
                    "Cup Holder": "حامل الكأس",
                    "Paper Cup": "كوب ورقي",
                    "Cake Base": "قاعدة الكيك",
                    "Hardcover Box": "مربع غلاف فني",
                    "Wrapping Sheets": "أوراق التغليف",

            "Signage": "لافتات",
                "Exhibition Booths": "أكشاك العرض",
                "Workstations": "محطات العمل",
                "Catering station": "محطة تموين",
                "Vinyl Sticker": "ملصق الفينيل",
                "Banners": "لافتات",
                "Roll Up - Pop Up": "نشمر - يطفو على السطح"
            
        }
    }
</i18n>

<template>
    <div class="Cover">
        <div class="imageSection">
            <IntroSection :styling="{'paddingBottom': '0px'}">
                <div class="headerSection">
                    <div class="row">
                        <div class="col">
                            <h2 class="header">{{ $t('header') }}</h2>
                        </div> 
                    </div> 
                    <BlackBox :blue="true"></BlackBox>
                </div>
            </IntroSection>
        </div>
        <div class="servicesSection">
            <IntroSection>
                <div class="row">
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col subHeaderSection">
                                <div class="verticalBlueBlock"></div><div class="subheader">{{ $t('Design') }}</div>
                            </div> 
                        </div> 
                        <div v-for="service in services.Design" :key="service" class="row">
                            <div class="col">
                                <span class="service">- {{ $t(service) }}</span>
                            </div> 
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col subHeaderSection">
                                <div class="verticalBlueBlock"></div><div class="subheader">{{ $t('Printing') }}</div> 
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-md">
                                <div class="row">
                                    <div class="col">
                                        <span class="boldHeader">- {{ $t('Commercial') }}</span>
                                    </div> 
                                </div>
                                <div v-for="service in services.Printing.Commercial" :key="service" class="row">
                                    <div class="col">
                                        <span class="service"> - {{ $t(service) }}</span>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md">
                                <div class="row">
                                    <div class="col">
                                        <span class="boldHeader">- {{ $t('Packaging') }}</span>
                                    </div>
                                </div> 
                                <div v-for="service in services.Printing.Packaging" :key="service" class="row">
                                    <div class="col">
                                        <span class="service"> - {{ $t(service) }}</span>
                                    </div> 
                                </div>
                            </div> 
                        </div> 
                    </div> 
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col subHeaderSection">
                                <div class="verticalBlueBlock"></div><div class="subheader">{{ $t('Signage') }}</div>
                            </div> 
                        </div> 
                        <div v-for="service in services.Signage" :key="service" class="row">
                            <div class="col">
                                <span class="service"> - {{ $t(service) }}</span>
                            </div> 
                        </div>  
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
    mounted() {

    },
    data() {
        return {
            services: {
                Design: [
                    "Brand Identity", 
                    "Brand Strategy"
                ],
                Printing: {
                    Commercial: [
                        "Business Card",
                        "Flyer",
                        "Brochure",
                        "Receipt Books",
                        "Forms",
                        "Letter Head",
                        "Envelopes",
                        "Note Pads",
                        "Folder",
                        "Gift Cards",
                        "Stickers"
                    ],
                    Packaging: [
                        "Bags",
                        "Boxes - Top & Bottom Tray & Lid",
                        "Folding carton box",
                        "Food packaging box",
                        "Cup Holder",
                        "Paper Cup",
                        "Cake Base",
                        "Hardcover Box",
                        "Wrapping Sheets"
                    ]
                },
                Signage: [
                    "Exhibition Booths",
                    "Workstations",
                    "Catering station",
                    "Vinyl Sticker",
                    "Banners",
                    "Roll Up - Pop Up"
                ]
            }
        }
    },
    components: {
        BlackBox,
        IntroSection
    }
}
</script>

<style scoped>
    .Cover {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        font-family: 'LatoMedium';
    }

    .imageSection {
        height: 40vh;
        background: url('/storage/ourServices.png') no-repeat center center;
        
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-color: red;
    }

    .headerSection {
        /* background-color: green; */
        /* display: flex;
        flex-direction: column; */
    }

    .header {
        color: white;
        font-weight: 800;
        font-size: 3rem;
    }

    .verticalBlueBlock {
        width: 5px;
        height: 1.2rem;
        background-color: #00AEEF;
    }   

        html[dir="ltr"] .verticalBlueBlock {
            margin-right: 1rem;
        }

        html[dir="rtl"] .verticalBlueBlock {
            margin-left: 1rem;
        }
    
    .subheader {
        color: #00AEEF;
        font-weight: 700;
        font-size: 1.5rem;
    }

    .boldHeader {
        font-weight: 700;
        font-size: 1.2rem;
    }

    .service {
        font-size: 1.2rem;
    }

    .servicesSection {
        /* background-color:green; */
        min-height: 50vh;
        padding-top: 10vh;
    }

    .subHeaderSection {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        padding-bottom: 20px;
        /* background-color:green; */
    }

</style>