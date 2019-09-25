<i18n>
    {
        "en": {
            "title": "Logo Color",
            "Choose your Brand Color": "Choose your Brand Color"
        },
        "ar": {
            "title": "لون الشعار",
            "Choose your Brand Color": "اختيار لون العلامة التجارية الخاصة بك"
        }
    }
</i18n>

<template>
    <div id="cover">
        <SubHeader><h5><strong>{{ $t('title') }}</strong></h5></SubHeader>
        <!-- <div class="row">
            <div class="col-md-4">
                <BlackBox>
                    <h5>Logo Color</h5>
                </BlackBox>
            </div>
            <div class="col-md-8 yellowLineSection">

            </div>
        </div> -->
        <div class="row">
            <div class="col-md mt-2 mb-2">
                <h5>{{ $t('Choose your Brand Color') }}</h5>
            </div>
        </div>
        <div class="row rowSection my-2" v-for="(colorcode,color) in colorsList" :key="color">
            <div class="col-2 checkmarkSection">
                <CheckMark>
                    <input  
                    type="checkbox" 
                    :id="color" 
                    :value="color" 
                    v-model="colors" 
                    :disabled="colors.length >= 3 && colors.indexOf(color) < 0"
                    />
                </CheckMark>                
            </div>
            <label :for="color" class="col-10 colorSection">
                <div class="row">
                    <div v-for="index in 8" :key="index" class="col-xs shadeSection">
                        
                        <div class="shade" :style="setBackgroundColor(colorcode, index)">
                        </div>
                        
                    </div>
                </div>
            </label>
            
            <!-- <div v-for="index in 8" :key="index" class="col-xs">
                <div class="shade" :style="setBackgroundColor(colorcode, index)">
                </div>
            </div> -->
            
            
        </div>
       
        <div class="noColorSection">
            <NoIdea id="noColor">
                <input type="checkbox" :value="noColor" v-model="colors" id="noColor" />
            </NoIdea>
        </div>
        
       
        <!-- <div class="rowSection my-2">
            <div class="checkmarkSection">
                <CheckMark>
                    <input 
                    type="checkbox" 
                    :value="noColor" 
                    v-model="colors"
                    id="noColor"
                    />
                </CheckMark>
            </div>

            <label class="noColorSection" for="noColor">
                <h4>I don't have an idea.</h4>
            </label>
        </div> -->
    </div>
</template>

<script>
import BlackBox from '../../../../../UI/BlackBox';
import CheckMark from '../../../../../UI/CheckMark';
import SubHeader from '../../../../../UI/SubHeader';
import { store } from '../../../../../../data/logodesign';
import NoIdea from '../../../../../UI/NoIdea';

export default {
    mounted() {
        // console.log(this.colorListTemp);
        this.colors = [...this.color];
        console.log('Color prop in Color.vue', this.color);
        // this.colors = this.$store.state.logodesign.color;
    },
    components: {
        CheckMark,
        BlackBox,
        SubHeader,
        NoIdea
    },
    props: [
        "color"
    ],
    data() {
        return {
            colors: [],
            noColor: 'No Color Selected'
        }
    },
    computed: {
        colorsList() {
            return store[this.$i18n.locale].colors;
        }
    },
    methods: {
        setBackgroundColor(color, index) {
            let setColor = color;
            let opacity = index*0.125;
            //  console.log('Test','backgroundColor:'+setColor+','+'opacity:0');
            return (
                'backgroundColor:'+setColor+';'+
                'opacity:'+opacity
            )
            
            
        },
       
    },
    watch: {
        colors: function(newValue, oldValue) {
            if(newValue.find(color => color === this.noColor)) {

                // If noColor is added after some color
                if(newValue.indexOf(this.noColor) > 0) {
                    this.colors = [this.noColor];
                } 
                else if(newValue.length > 1) {
                    // If noColor is the first element and the array has more than 1 element
                    this.colors = this.colors.filter(color => color !== this.noColor);
                }
            }
            console.log('Watch', this.colors);
            this.$emit('color', this.colors);
        }
       
    }

}
</script>

<style scoped>

    .colorRow {
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .shade {
        width: 47px;
        height: 30px;
        border-radius: 35%;
        
    }
    
    .rowSection {
        /* background-color: green; */
    }


    /* .shadeSection {
         width: calc(100% /8);
    } */

    .checkmarkSection {
        width: 20%;
        /* background-color: red; */
    }

    .colorSection {
        /* background-color: red; */
        width: 80%;
        cursor: pointer;
    }

    

    @media (max-width: 768px) {
        .shadeSection {
            width: calc(100% /8);
        }

        .shade {
            width: auto;
        }
    }

    /* @media (max-width: 575px) {
        
    } */
    
    .noColorSection {
        display: flex;
        justify-content: center;
    }
    

</style>
