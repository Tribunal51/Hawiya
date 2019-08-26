<template>
    <div class="Cover">
        <IntroSection :styling="introSectionStyling">
            <div class="row firstRow">
                <div class="col-md-5">
                    <Client :client="client" />
                    <!-- <div class="reportHeader">
                        REPORT
                    </div>
                    <div class="clientContactForm">
                        <h5 class="clientFormHeader">CLIENT CONTACT</h5>
                        <div class="clientFormField">Name: {{ this.client.name }}</div>
                        <div class="clientFormField">Email: {{ this.client.email }}</div>
                        <div class="clientFormField">Phone No: {{ this.client.phone }}</div> 
                        <div class="clientFormField">City, State: {{ this.client.address }}</div>
                    </div> -->
                </div>
                <div class="col-md-7 brandInfoSection">
                    <BlackBox />
                    <Form :Form="orderInfo.form" :readonly="true" title="Brand Information" />
                </div>
            </div>
            <div class="row secondRow">
                <div class="col-md-5 styleSection">
                    <div class="row">
                        <div class="col">
                            <Styles 
                                :styles="orderInfo.style"
                                :readonly="true"
                            />
                        </div>
                    </div>                  
                </div>
                <div class="col-md-7 bottomRightSection">
                    <div class="row">
                        <div class="col-sm logotypeSection">
                            <div class="row">
                                <div class="col">
                                    <span class="subHeader">Design Type</span>
                                </div>
                            </div>
                            <div class="row mb-2" v-for="logotype in orderInfo.logotype" :key="logotype">
                                <div class="col">
                                    <img class="logotypeImage" :src="getLogotypeImage(logotype)" :alt="logotype"  />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm colorSection">
                            <div class="row">
                                <div class="col">
                                    <span class="subHeader">Color</span>
                                </div>
                            </div>
                            <div class="colorsBox">
                                <div v-for="color in orderInfo.color" :key="color" class="color"  :style="assignColor(color)"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col fontSection">
                            <div class="row">
                                <div class="col-4 fontHeaderSection">
                                    <span class="subHeader">Font</span>
                                </div>
                                <div class="col-8 fontImageSection">
                                    <Font 
                                        :font="assignFont()" 
                                        coverStyling="width: 150px"
                                    />
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </IntroSection>
    </div>
    
    
</template>

<script>
import IntroSection from '../../UI/IntroSection';
import Form from '../../OtherPages/Design/LogoDesign/Info/Form/Form';
import Styles from '../../OtherPages/Design/LogoDesign/Info/Style/Styles';
import axios from 'axios';
import BlackBox from '../../UI/BlackBox';
import { store } from '../../store';
import Font from '../../OtherPages/Design/LogoDesign/LogoFont/Font';
import Client from './Client';

export default {
    components: {
        IntroSection,
        Form,
        BlackBox,
        Styles,
        Font,
        Client
    },
    props: [
        "orderString",
        "clientString"
    ],
    mounted() {
        //this.client = {...JSON.parse(this.clientString)};
        
        
        
    },
    data() {
        return {
            introSectionStyling: {
                paddingTop: '0px !important'
            },
            order: {}
        }
    },
    computed: {
        orderInfo() {
            this.order = JSON.parse(this.orderString);
            return {
                form: {
                    brand_name: this.order.brand_name,
                    tagline: this.order.tagline,
                    business_field: this.order.business_field,
                    subject: this.order.subject,
                    description: this.order.description
                },
                style: { ...this.order.style },
                logotype: [...this.order.logotype],
                color: [...this.order.color],
                font: this.order.font
            };
        },
        client() {
            let client = JSON.parse(this.clientString);
            return client;
        }
    },
    methods: {
        getLogotypeImage(logotype) {
            console.log('Current logotype', logotype);
            console.log('LOGOTYPE ITEM', store.logotypes.find(type => type.title === logotype));
            let type = store.logotypes.find(type => type.title === logotype);
            if(type) {
                return type.file;
            }
        },
        assignColor(color) {
            console.log('COLOR', color, store.colorsList[color]);
            return {
                backgroundColor: store.colorsList[color]
            }
        },
        assignFont() {
            let font = store.fonts.find(font => font.name === this.orderInfo.font);
            return font;
        }
    }
}
</script>

<style scoped>

    .Cover {
        overflow-x: hidden;
        background-color: white;
    }

    .reportSection {
        background-color: #FFDB00;
    }

    .reportHeader {
        width: 100%;
        padding: 100px 5px 5px 20px;
        font-family: 'LatoBold', sans-serif;
        color: gray;
        font-size: 3.5rem;
        font-weight: 800;
    }

    .clientContactForm {
        width: 100%;
        display: flex;
        flex-flow: column wrap;
        padding: 5px 5px 20px 20px;
    }

    .clientFormHeader {
        font-weight: 600;
        font-size: 1.3rem;
    }

    .clientFormField {
        padding-bottom: 2px;
        font-size: 1.1rem;
    }

    

    .brandInfoSection {
        /* height: 500px; */
        /* background-color: red; */
        padding-top: 100px;
    }

    .styleSection {
        /* background-color: green; */
        padding-top: 20px;
        height: 500px;
    }

    .logotypeSection {
        /* background-color: blue; */
        /* height: 500px; */
    }

    .subHeader {
        font-weight: 500;
        font-size: 1.3rem;
    }

    .logotypeImage {
        width: 100%;
        height: 100%;
    }

    .colorSection {
        /* background-color: gray;  */
        /* height: 500px; */
    }

    .colorsBox {
        width: 100%;
        height: 100%;
        display: flex;
        flex-flow: column nowrap;

    }

    .color {
        width: 100%;
        height: 50px;
        margin-bottom: 5px;
        /* background-color: red; */
    }

    .fontSection {
        /* box-sizing: border-box; */
        border: 1px solid gray;
    }

    .fontHeaderSection {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    

    .fontImageSection {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        /* background-color: pink; */
        /* height: 500px; */
        
    }

    .fontImage {
        width: 100%;
        height: auto;
    }

    
</style>
