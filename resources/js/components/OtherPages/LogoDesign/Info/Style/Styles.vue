<template>
    <div id="cover">
        <div class="row sliderRow" v-for="(value,style) in tempStyles" :key="style">
            
                <div class="col-sm-3 labelLeft">{{ style.split('_')[0] }}</div>
                <div class="col-sm-6 slider">
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
                        thumbLabel 
                        thumbSize="20"
                        height="10"
                        color=#FBC02D
                        thumbColor=#FBC02D
                        @change="updateStyles"
                    ></VSlider>
                        
                    <!-- <vue-slider 
                    v-model="tempStyles[style]"
                    v-bind="options" /> -->
                                     
                </div>
                <div class="col-sm-3 labelRight">{{ style.split('_')[1] }}</div>
            
        </div>
    </div>
</template>

<script>
// import 'vuetify/dist/vuetify.min.css'; // Ensure you are using css-loader
// import { VSlider } from 'vuetify/lib';


import VueSlider from 'vue-slider-component';
// import 'vue-slider-component/theme/antd.css';


import { VSlider } from 'vuetify/lib';

export default {
    components: {
        VSlider,
        VueSlider
    },
    props: [
        "styles",
        
    ],
    created() {
        // console.log('Vuetify style isDisabled', document.querySelector('#vuetify-style'));
        // document.querySelector('#vuetify-style').disabled = false;
    },
    beforeDestroy() {
        // document.querySelector('#vuetify-style').disabled = true;
    },
    data() {
        return {
            tempStyles: {},
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
        this.tempStyles = this.styles;
        console.log('Styles in Styles',this.styles);
    },
    methods: {
        updateStyles() {
            this.$emit('styles', this.tempStyles);
        }
    }
}
</script>

<style scoped>

    
    .sliderRow {
        height: 30px !important;        
    }

    .labelLeft {       
        padding-top: 8px;
        text-align: right;       
    }

    .slider {       
        vertical-align: middle;      
    }

    .labelRight {
        text-align: left;
        padding-top: 8px;
        
    }

    

    @media (max-width:576px) {
        .sliderRow {
            width: 100%;
        }

        .slider {
            width: 60%;
        }

        .labelLeft {
            width: 20%;
        }

        .labelRight {
            width: 20%;
        }
    }

    
    
</style>


