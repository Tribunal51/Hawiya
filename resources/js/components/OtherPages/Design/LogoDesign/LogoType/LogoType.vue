<template>
    <div id="cover">
        <!-- <div class="row mt-4">
            <div class="col-md-4">
                <BlackBox>
                    <h3>{{ this.$store.state.logodesign.branding ? this.$store.state.branding.package : 'Choose the design you like' }}</h3>
                </BlackBox>
            </div>

            <div class="col-md-8 yellowLineSection">
                
            </div>
        </div> -->
        <SubHeader :hideYellowLine="false">
            <h3>{{ this.$store.state.logodesign.branding ? this.$store.state.logodesign.package : 'Choose the design you like' }}</h3>        
        </SubHeader>
        <div class="row">
            <div class="col-md">              
                <div class="intro">
                    <p>The logo is a pictorial mark which is also called the logo symbol and logo brand. It is used as the identity of the company. The logo of several types. Logo put lives in the company. It is so beautifully designed that the viewers are attracted towards him. The logo for the company is very important.</p>
                </div>
            </div>
        </div>
            



        <div class="checkBoxGroup">
            <div class="checkBox" v-for="type in types" :key="type.title">
                <input 
                type="checkbox" 
                class="inputCheckBox"
                :id="type.title" 
                v-model="selectedTypes" 
                :value="type.title" 
                :disabled="selectedTypes.length >= selectedTypesLimit && selectedTypes.indexOf(type.title) < 0 " />
                <label class="checkBoxLabel" :for="type.title"><img :src="type.file" :alt="type.title" class="checkbox-image" /></label>
            </div>
        </div>



        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <center>
                    <NextButton :buttonDisabled="isButtonDisabled()" :buttonClicked="nextButtonClicked" />
                    <!-- <v-btn color="success" :disabled="isButtonDisabled()" @click="nextButtonClicked">Next</v-btn> -->
                </center>
            </div>
        </div>
            
            
            
            <!-- <router-link tag="button" class="btn btn-warning" :disabled="isButtonDisabled()">Next</router-link> -->
        
    </div>
</template>

<script>
import Type from './Type.vue';
import CheckMark from '../../../../UI/CheckMark';
import BlackBox from '../../../../UI/BlackBox';
import SubHeader from '../../../../UI/SubHeader';
import NextButton from '../../../../UI/NextButton';
import { store } from '../../../../../data/logodesign';

export default {
    mounted() {
        console.log('Just Mounted on LogoType ', this.$store.state.logodesign);
        if(this.$store.state.logodesign.logotype !== null) {
            this.selectedTypes = [...this.$store.state.logodesign.logotype];
        }
        
    },
    components: {
        Type,
        CheckMark,
        BlackBox,
        SubHeader,
        NextButton
    },
    data() {
        return {
            selectedTypes: [],
            selectedTypesLimit: 2,
            // types: [
            //     {
            //         title: 'Combination Mark',
            //         file: '/storage/logotype/combination-mark.png'
            //     },
            //     {
            //         title: 'Emblem',
            //         file: '/storage/logotype/emblem.png'
            //     },
            //     {
            //         title: 'Letterform',
            //         file: '/storage/logotype/letterform.png'
            //     },
            //     {   
            //         title: 'Pictorial mark',
            //         file: '/storage/logotype/pictorial-mark.png'
            //     },
            //     {
            //         title: 'Signature',
            //         file: '/storage/logotype/signature.png'
            //     },
            //     {
            //         title: 'WordMark',
            //         file: '/storage/logotype/wordmark.png'
            //     },
            //     {
            //         title: 'Abstract mark',
            //         file: '/storage/logotype/abstract-mark.png'
            //     },
            //     {
            //         title: 'Typography',
            //         file: '/storage/logotype/typography.png'
            //     }
            // ]
        }
    },
    computed: {
        types() {
            return store.logotypes;
        }
    },
    methods: {
        boxClicked() {
            //console.log(this.selectedTypes);
        },
        isButtonDisabled() {
            return this.selectedTypes.length < 1;
            // || this.selectedTypes.length >= this.selectedTypesLimit
        },
        nextButtonClicked() {
            // alert('nextButtonClicked');
            this.$store.dispatch('logodesign/setType', this.selectedTypes);
            this.$router.push({
                name: 'logofont'
            });
        }
    },
    watch: {
        selectedTypes: function(value, oldValue) {
            console.log('Value', value, 'Old Value', oldValue);
        }
    }
}
</script>

<style scoped>

    

    .intro {
        margin-top: 20px;
    }

    .yellowHR {
        width: 100%;
        height: 2px;
        background-color: #FFDB00;
    }

    .yellowLineSection {
        border-bottom: 2px solid #FFDB00;
    }


    



    

</style>
