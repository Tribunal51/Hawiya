<i18n>
    {
        "en": {
            "Logo Design": "Logo Design",
            "Branding": "Branding",
            "Stationery": "Stationery",
            "Packaging": "Packaging",
            "Social Media": "Social Media",
            "Website": "Website",
            "Promotional": "Promotional"
        },
        "ar": {
            "Logo Design": "تصميم شعار",
            "Branding": "العلامات التجارية",
            "Stationery": "ادوات مكتبيه",
            "Packaging": "التعبئة والتغليف",
            "Social Media": "وسائل التواصل الاجتماعي",
            "Website": "موقع الكتروني",
            "Promotional": "الترويجية"
        }
    }

</i18n>

<template>
    <div class="Cover">
        
        
        <div v-for="(link, index) in links" :key="link.name">
            <div class="row">
                <div class="col">
                    <button class="btn sideBarButton text-left" @click="buttonClicked(link.link)">{{ $t(link.name) }}</button>
                </div>
            </div>
            <div class="row" v-if="index < links.length - 1">
                <div class="col">
                    <WhiteBox />
                </div>
            </div>

        </div>
        
        
    </div>
</template>

<script>
import WhiteBox from '../../UI/WhiteBox';
export default {
    data() {
        return {
            showSideBar: false,
            links: [
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
                    link: '/design/stationery/products'
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
    components: {
        WhiteBox
    },
    methods: {
        displayWhiteBox(link) {

        },
        buttonClicked(link) {
            this.$router.push(link);
        }
    }
}
</script>

<style scoped>
    .Cover {
        padding-top: 20px;
        padding-left: 30px;
        width: 200px;
        background-color: #FFDB00;
        border-radius: 15px 0 0 15px;
        height: auto;
        display: flex;
        flex-flow: column;
        justify-content: center;
        align-items: center;
        padding-bottom: 20px;
    }

    

    .sideBarButton {
        width: 125px;
        background: transparent;
        padding-left: 0px !important;
        /* border-bottom: 2px solid white; */
        border-top: none;
        border-left: none;
        border-right: none;
        text-align: left;

    }

    .arrowButton {
        position: relative;
        border: none;
        background: transparent;
    }

</style>
