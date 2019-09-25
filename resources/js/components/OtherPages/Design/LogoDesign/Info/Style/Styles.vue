<i18n>
    {
        "en": {
            "Logo Style": "Logo Style",
            "Choose your Logo Style": "Choose your Logo Style",
            "Classic": "Classic",
            "Modern": "Modern",
            "Youthful": "Youthful",
            "Mature": "Mature",
            "Masculine": "Masculine",
            "Feminine": "Feminine",
            "Playful": "Playful",
            "Sophisticated": "Sophisticated",
            "Luxury": "Luxury",
            "Economical": "Economical",
            "Organic": "Orgnic",
            "Geometric": "Geometric",
            "Literal": "Literal",
            "Abstract": "Abstract"

        },
        "ar": {
            "Logo Style": "نمط الشعار",
            "Choose your Logo Style": "اختر شعارك",
            "Classic": "كلاسيكي",
            "Modern": "حديث",
            "Youthful": "شاب",
            "Mature": "ناضج",
            "Masculine": "مذكر",
            "Feminine": "المؤنث",
            "Playful": "لعوب",
            "Sophisticated": "متطور",
            "Luxury": "ترف",
            "Economical": "اقتصادي",
            "Organic": "عضوي",
            "Geometric": "هندسي",
            "Literal": "حرفي",
            "Abstract": "نبذة مختصرة"
        }
    }
</i18n>

<template>
    <div id="cover">
        <!-- <div class="row">
            <div class="col-md-4">
                <BlackBox>
                    <h5>Logo Style</h5>
                </BlackBox>
            </div>
            <div class="col-md-8 yellowLineSection">

            </div>
        </div> -->
        <SubHeader><h5><strong>{{ title ? title : $t('Logo Style') }}</strong></h5></SubHeader>
        <div class="row">
            <div class="col-md mt-2 mb-2">
                <h5 v-show="!readonly">{{ $t('Choose your Logo Style') }}</h5>
            </div>
        </div>
        <div class="row" v-for="(value,style) in tempStyles" :key="style" :style="readonly ? 'height: 60px !important' : 'height: 30px !important'">
            
            <div class="col-3 labelFirst">{{ capitalizeFirstLetterAndTranslate(style.split('_')[0]) }}</div>
            <div class="col-6 slider">
                <!-- <input 
                type="range" 
                min="0" 
                max="100" 
                class="custom-range" 
                id="myRange" 
                v-model="tempStyles[style]"
                @change="$emit('styles', tempStyles)" />
                {{ value }} -->
                
                
                <VSlider 
                    v-model="tempStyles[style]"
                    :thumbLabel="readonly ? 'always' : true"
                    min="-100"
                    max="100"
                    thumbSize="30"
                    height="10"
                    step="10"                      
                    color=#FBC02D
                    thumbColor=#FBC02D
                    @change="updateStyles" 
                    :readonly="readonly"                      
                ></VSlider>
                    
                <!-- <vue-slider 
                v-model="tempStyles[style]"
                v-bind="options" /> -->

                
                                    
            </div>
            <div class="col-3 labelSecond">{{ capitalizeFirstLetterAndTranslate(style.split('_')[1]) }}</div>
                
            
        </div>
    </div>
</template>

<script>
// import 'vuetify/dist/vuetify.min.css'; // Ensure you are using css-loader
// import { VSlider } from 'vuetify/lib';


// import VueSlider from 'vue-slider-component';
// import 'vue-slider-component/theme/antd.css';

import BlackBox from '../../../../../UI/BlackBox';
import { VSlider } from 'vuetify/lib';
import SubHeader from '../../../../../UI/SubHeader';

export default {
    components: {
        VSlider,
        BlackBox,
        SubHeader
    },
    props: [
        "styles",
        "title",
        "readonly"
    ],
    created() {
        // console.log('Vuetify style isDisabled', document.querySelector('#vuetify-style'));
        // document.querySelector('#vuetify-style').disabled = false;
    },
    beforeDestroy() {
        // document.querySelector('#vuetify-style').disabled = true;
    },
    filters: {
        capitalizeFirstLetter: word => word.charAt(0).toUpperCase() + word.slice(1)
    },
    data() {
        return {
            slider:0,
            options: {
                dotSize: 14,
                width: 'auto',
                height: 10,
                contained: false,
                direction: 'ltr',
                data: null,
                min: 0,
                max: 100,
                interval: 1,
                disabled: false,
                clickable: true,
                duration: 0.5,
                adsorb: false,
                lazy: false,
                tooltip: 'focus',
                tooltipPlacement: 'top',
                tooltipFormatter: void 0,
                useKeyboard: false,
                enableCross: true,
                fixed: false,
                minRange: void 0,
                maxRange: void 0,
                order: true,
                marks: false,
                dotOptions: void 0,
                process: true,
                dotStyle: void 0,
                railStyle: void 0,
                processStyle: void 0,
                tooltipStyle: void 0,
                stepStyle: void 0,
                stepActiveStyle: void 0,
                labelStyle: void 0,
                labelActiveStyle: void 0,
            },                    
        }        
    },
    mounted() {
        //this.tempStyles = {...this.styles};
        //console.log('TempStyles', this.tempStyles);
    },
    computed: {
        tempStyles() {
            return this.styles;
        }
    },
    methods: {
        updateStyles() {
            this.$emit('styles', this.tempStyles);
        },
        capitalizeFirstLetterAndTranslate(word) {
            return this.$t(word.charAt(0).toUpperCase() + word.slice(1));
        }

    }
}
</script>

<style scoped>
    
    .sliderRow {
        height: 30px !important;        
    }

    .labelFirst {       
        padding-top: 8px;      
    }

        html[dir="ltr"] .labelFirst {
            text-align: right;
        }

        html[dir="rtl"] .labelFirst {
            text-align: left;
        }

    .slider {       
        width: 100%;
        /* background-color: red; */
        vertical-align: middle;      
    }

    .labelSecond {
        padding-top: 8px;
    }

        html[dir="ltr"] .labelSecond {
            text-align: left;
        }

        html[dir="rtl"] .labelSecond {
            text-align: right;
        }

    @media (max-width:576px) {
        .sliderRow {
            width: 100%;
            
        }

        .slider {
            /* background-color: green; */
            width: 100%;
        }

        .labelFirst {
            width: 10%;
           
            /* text-align: center; */
        
            /* font-size: 0.5rem; */
        }

        .labelSecond {
            width: 10%; 
            /* display: none;  */
            /* font-size: 0.5rem; */
            /* display: none; */
        }
    }

    
    
</style>


