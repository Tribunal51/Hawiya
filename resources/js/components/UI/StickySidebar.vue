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
    <div class="FullCover">
        <span class="arrowButton" @click="showSideBar = !showSideBar">
            {{ this.showSideBar ?  '>' : '&lt;'  }}
        </span>
        <!-- <div class="arrowButton text-right" @click="showSideBar = true" v-else>&lt;</div> -->
        <transition :name="$root.$i18n.locale === 'en' ? 'slide-fade-right' : 'slide-fade-left'">
            <div class="Cover" v-show="showSideBar">        
                <div v-for="(link, index) in links" :key="link.name">
                    <div class="row">
                        <div class="col">
                            <button class="btn sideBarButton" @click="buttonClicked(link.link)">{{ $t(link.name) }}</button>
                        </div>
                    </div>
                    <div class="row" v-if="index < links.length - 1">
                        <div class="col whiteBoxSection">
                            <WhiteBox />
                        </div>
                    </div>

                </div>
                
                
            </div>
        </transition>
    </div>
    
</template>

<script>
import WhiteBox from './WhiteBox';
export default {
    data() {
        return {
            showSideBar: true,
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
    .FullCover {
        /* position: absolute; */
        /* position: sticky;
        right: 0;
        top: 30%; */
        /* position: fixed; */
        /* float: right; */
        position: fixed;
        z-index: 1 !important;
        top: 30% !important;
        /* background-color: red; */
        display: flex;
        flex-flow: column;
    }

        html[dir="ltr"] .FullCover {
            right: 0 !important;
        }

        html[dir="rtl"] .FullCover {
            left: 0 !important;
        }

    .Cover {
        padding-top: 20px;
        width: 200px;
        background-color: #FFDB00;
        height: auto;
        display: flex;
        flex-flow: column;
        justify-content: center;
        align-items: center;
        padding-bottom: 20px;
    }

        html[dir="ltr"] .Cover {
            padding-left: 30px;
            border-radius: 15px 0 0 15px;

        }

        html[dir="rtl"] .Cover {
            padding-right: 30px;
            border-radius: 0 15px 15px 0;
        }

    

    .sideBarButton {
        width: 125px;
        background: transparent;
        /* border-bottom: 2px solid white; */
        border-top: none;
        border-left: none;
        border-right: none;
    }

        html[dir="ltr"] .sideBarButton {
            padding-left: 0px !important;
            text-align: left;
        }

        html[dir="rtl"] .sideBarButton {
            padding-right: 0px !important;
            text-align: right;
        }



    html[dir="ltr"] .arrowButton {
        text-align: right !important;
    }

    html[dir="rtl"] .arrowButton {
        text-align: left !important;
    }


    /* Enter and leave animations can use different timing and duration */

    .slide-fade-right-enter-active {
        transition: all .5s ease;
    }

    .slide-fade-right-leave-active {
        transition: all .5s cubic-bezier(1.0, 1.0, 1.0, 1.0);
    }

    .slide-fade-right-enter, .slide-fade-right-leave-to {
        /* slide-fade-leave-active below version 2.1.8 */
        opacity: 0;
        transform: translateX(30px);
    }



    /* Enter and leave animations can use different timing and duration */

    .slide-fade-left-enter-active {
        transition: all .5s ease;
    }

    .slide-fade-left-leave-active {
        transition: all .5s cubic-bezier(1.0, 1.0, 1.0, 1.0);
    }

    .slide-fade-left-enter, .slide-fade-left-leave-to {
        /* slide-fade-leave-active below version 2.1.8 */
        opacity: 0;
        transform: translateX(-30px);
    }

       

        


</style>
