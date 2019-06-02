<template>
    <div id="cover">
        <form @submit="submitButtonClicked">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-11">
                        <!-- <h3>Logo Information</h3>  -->
                    </div>
                    
                    <div class="col-md-1">
                        <v-btn color="success" type="submit" :disabled="isButtonDisabled()">Submit</v-btn>
                        <!-- <input class="btn btn-warning" type="submit" value="Submit" :disabled="isButtonDisabled()" />  -->
                    </div>                    
                </div>
                
                
                        
                <div class="row">
                    <div class="col-xl">
                        <div class="row" id="section1">
                            <div class="col">
                                
                                <Form 
                                v-on:form="updateForm"
                                :Form="assignForm()"                            
                                />
                                <!-- <FormInfo :form="info.form" v-on:form="updateForm" /> -->
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md" id="section2">
                                <div class="row">
                                    <div class="col-md-1"><strong>Style</strong></div>
                                    <div class="col-md-11"><hr></div>
                                </div>
                                <Styles :styles="assignStyles()" v-on:styles="updateStyles" />
                                <!-- <Styles 
                                :styles="this.$store.state.logodesign.style === null ? info.styles : this.$store.state.logodesign.style" 
                                v-on:styles="updateStyles" /> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl" id="section3">
                        <div class="row">
                            <div class="col-md-1"><strong>Color</strong></div>
                            <div class="col-md-7"></div>
                            <div class="col-md-4">
                                <!-- <button class="btn btn-warning" type="submit" @click="submitButtonClicked">Submit</button> -->
                            </div>
                        </div>
                        
                        <Color v-on:color="updateColors" 
                        :colorList="info.colorList" 
                        :color="assignColor()" />
                    </div>                
                </div> 
                
            </div>
        </form>              
    </div>
</template>



<script>

import Form from './Form/Form.vue';
import Styles from './Style/Styles.vue';
import Color from './Color/Color.vue'; 
import axios from 'axios';
import { VBtn } from 'vuetify/lib';


export default {
    mounted() {
        console.log('Just mounted on Info page',this.$store.state);
        if(this.$store.state.logodesign.form !== null) {
            this.info.form = {...this.$store.state.logodesign.form};
        }
        // if(this.$store.state.logodesign.style !== null) {
        //     this.info.styles = {...this.$store.state.logodesign.style};
        //     console.log('Inside mounted of Info', this.info.styles);
        // }
        // if(this.$store.state.logodesign.color !== null) {
        //     console.log('Color not null', this.$store.state.logodesign.color);
        //     this.info.color = [...this.$store.state.logodesign.color];
        // }
    },
    components: {
        Form,
        Styles,
        Color,
        VBtn
    },
    updated() {
        //console.log(this.info);
    },
    methods: {
        assignForm() {
            return this.$store.state.logodesign.form === null ? this.info.form : this.$store.state.logodesign.form;
        },
        updateForm(form) {
            console.log('Form update in Info',form);
            this.info.form = {...form};
        },
        assignStyles() {
            return this.$store.state.logodesign.style === null ? this.info.styles : this.$store.state.logodesign.style
        },
        updateStyles(styles) {
            console.log('Style Update in Info', styles);
            this.info.styles = {...styles};
        },
        assignColor() {
            return this.$store.state.logodesign.color === null ? this.info.color : this.$store.state.logodesign.color;
        },
        updateColors(colors) {
            this.info.color = [...colors];
        },
        getInfo() {
            console.log(this.info);
        },
        isButtonDisabled() {
            return this.info.color.length < 1
        },
        submitButtonClicked(event) {
            event.preventDefault();
            console.log('button clicked and User logged in');
            const payload = {
                form: {...this.info.form},
                style: {...this.info.styles},
                color: [...this.info.color],
            }
            console.log('Payload', payload);
            this.$store.dispatch('logodesign/setInfo', payload);
            console.log('Final state', this.$store.state.logodesign);
            if(this.$store.state.user_id === -1) {
                 window.location.href = '/register?redirect=logotype';
                //alert('Redirect to Login');
            }
            else {
                
                alert('HTTP Packet sent');

                
                const dataToBeSent = {
                    user_id: this.$store.state.user_id,
                    package: this.$store.state.logodesign.package,
                    logotype: [...this.$store.state.logodesign.logotype],
                    style: {...this.$store.state.logodesign.style},
                    color: [...this.$store.state.logodesign.color],
                    brand_name: this.$store.state.logodesign.form.brand,
                    tagline: this.$store.state.logodesign.form.tagline,
                    business_field: this.$store.state.logodesign.form.business_field,
                    description: this.$store.state.logodesign.form.description
                }

                console.log('Data to be sent', dataToBeSent);

                axios.post('http://hawiya.net/api/orders/logo-design', dataToBeSent)
                .then(res => console.log(res.data))
                .catch(error => console.log(error));
                // console.log(localStorage);
                // console.log(sessionStorage);

                this.$store.dispatch('logodesign/resetState');
            }
            

            

        }
    },
    data() {
        return {
            info: {
                color: [],
                styles: { 
                    'modern_classic': 50,
                    'mature_youthful': 50,
                    'feminine_masculine': 50,
                    'playful_sophisticated': 50,
                    'economical_luxury': 50,
                    'geometric_organic': 50,
                    'abstract_literal': 50
                },
                form: {
                    brand: '',
                    tagline: '',
                    business_field: '',
                    description: ''
                },
                colorList: {
                    Red: "red",
                    Violet: "violet",
                    DarkViolet: "darkviolet",
                    Purple: "purple",
                    Blue: "blue",
                    LightBlue: "lightblue",
                    Green: "green",
                    LightGreen: "lightgreen",
                    Yellow: "yellow",
                    Orange: "orange",
                    OrangeRed: "orangered",
                    Brown: "brown",
                    Black: "black"
                }
            }
        }
    }
}
</script>

<style scoped>

    #cover {
        padding-bottom: 30px;
        font-family: 'LatoRegular', sans-serif;
    }

    #section1 {
        height: 50%;
        
        border-right: 1px solid lightgray;
    }
    
    #section2 {
        height: 50%;
        
        border-right: 1px solid lightgray;
    }

    #section3 {
        height: 100%;
    }

    .floatRight {
        float: right;
    }
    
</style>
