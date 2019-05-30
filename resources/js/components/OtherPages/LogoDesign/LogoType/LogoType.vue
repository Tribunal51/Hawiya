<template>
    <div id="cover">
        <div class="container">
            <p> Logo Design/Type</p>
            <br />
            <div id="intro">
                <h3>Choose the design you like</h3>
                <br />
                <p>The logo is a pictorial mark which is also called the logo symbol and logo brand. It is used as the identity of the company. The logo of several types. Logo put lives in the company. It is so beautifully designed that the viewers are attracted towards him. The logo for the company is very important.</p>
            </div>
            <!-- <div class="card-deck" id="cards">
                <div id="card" v-for="type in types" :key="type.title">
                    <Type :type="type" />
                </div>
            </div> -->
            <!-- <div class="row checkboxGroup">
                <div class="col-md checkBox" v-for="type in types" :key="type.title">
                    <CheckMark>
                        <input 
                            :id="type.title"
                            type="checkbox" 
                            v-model="selectedTypes" 
                            :value="type.title" 
                            :disabled="selectedTypes.length >= selectedTypesLimit && selectedTypes.indexOf(type.title) < 0"
                        />
                    </CheckMark>                   
                    <label :for="type.title"><img :src="'/storage/logotype/'+type.file" :alt="type.title" class="checkbox-image" /> </label>
                </div>
            </div> -->

            
            <!-- <div class="checkBoxGroup">
                <div class="checkBox" v-for="type in types" :key="type.title">
                    <input type="checkbox" :id="type.title" v-model="selectedTypes" :value="type.title" 
                    :disabled="selectedTypes.length >= selectedTypesLimit && selectedTypes.indexOf(type.title) < 0 " />
                    <label :for="type.title"><img :src="'/storage/logotype/'+type.file" :alt="type.title" class="checkbox-image" /></label>
                </div>
            </div> -->
            
            <!-- <v-container v-bind="{ [`grid-list-${size}`]: true }" fluid>
                <v-layout row wrap>
                    <v-flex
                    v-for="type in types"
                    :key="type.title"
                    md4>
                        <v-card flat tile>
                            <v-img
                                :src="'/storage/logotype/'+type.file"
                                :alt="type.title"
                            ></v-img>
                                                       
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container> -->


            <!-- <router-link :to="{
                name: 'logoinfo'
            }"            
            >
                <button class="btn btn-warning" :disabled="isButtonDisabled()" @click="nextButtonClicked()">Next</button>
            </router-link> -->



            <div class="checkBoxGroup">
                <div class="checkBox" v-for="type in types" :key="type.title">
                    <input type="checkbox" :id="type.title" v-model="selectedTypes" :value="type.title" 
                    :disabled="selectedTypes.length >= selectedTypesLimit && selectedTypes.indexOf(type.title) < 0 " />
                    <label :for="type.title"><img :src="'/storage/logotype/'+type.file" :alt="type.title" class="checkbox-image" /></label>
                </div>
            </div>



            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <center>
                        <v-btn color="success" :disabled="isButtonDisabled()" @click="nextButtonClicked">Next</v-btn>
                    </center>
                </div>
            </div>
            
            
            
            <!-- <router-link tag="button" class="btn btn-warning" :disabled="isButtonDisabled()">Next</router-link> -->
        </div>
    </div>
</template>

<script>
import Type from './Type.vue';
import CheckMark from '../Info/Color/CheckMark.vue';
export default {
    mounted() {
        console.log('Just Mounted on LogoType ', this.$store.state.logodesign);
        if(this.$store.state.logodesign.logotype !== null) {
            this.selectedTypes = [...this.$store.state.logodesign.logotype];
        }
        
    },
    components: {
        Type,
        CheckMark
    },
    data() {
        return {
            selectedTypes: [],
            selectedTypesLimit: 2,
            types: [
                {
                    title: 'Combination Mark',
                    file: 'combination-mark.png'
                },
                {
                    title: 'Emblem',
                    file: 'emblem.png'
                },
                {
                    title: 'Letterform',
                    file: 'letterform.png'
                },
                {   
                    title: 'Pictorial mark',
                    file: 'pictorial-mark.png'
                },
                {
                    title: 'Signature',
                    file: 'signature.png'
                },
                {
                    title: 'WordMark',
                    file: 'wordmark.png'
                },
                {
                    title: 'Abstract mark',
                    file: 'abstract-mark.png'
                }
            ]
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
            //alert('nextButtonClicked');
            this.$store.dispatch('logodesign/setType', this.selectedTypes);
            this.$router.push({
                name: 'logoinfo'
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
    #cover {
        /* background-image: red; */
    }

    #card {
        width: 25%;
        border: none;
        /* background-color: green; */
    }

    #intro {
        text-align: center;
    }


    .checkBoxGroup {
        display: flex;
        align-items: flex-start;
        flex-wrap: wrap;
        width: 100%;
        justify-content: center;
    }

    .checkBox {
        width: 200px !important;
        height: auto;
        margin: 10px;
    }


    ul {
        list-style-type: none;
    }

    li {
        display: inline-block;
    }

    /* input[type="checkbox"][id^="cb"] {
        display: none;
    } */

    input[type="checkbox"] {
        display: none;
    }

    label {
        border: 1px solid #fff;
        padding: 5px;
        display: block;
        position: relative;
        margin-bottom: 10px;
        cursor: pointer;
    }

    label:before {
        background-color: white;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        border: 1px solid grey;
        position: absolute;
        bottom: -5px;
        right: -5px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 28px;
        transition-duration: 0.4s;
        transform: scale(0);
    }

    label img {
        width: 100%;
        height: auto;
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
        
    }
    label img:hover {
        transform: scale(1.1);
    }

    :checked + label {
        border-color: #ddd;
    }

    :checked + label:before {
        content: "✓";
        background-color: green;
        transform: scale(1);
        z-index: 1
    }

    :checked + label img {
        transform: scale(1.1);
        box-shadow: 0 0 5px #333;
        z-index: -1;
    }




    



    

</style>
