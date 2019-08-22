<template>
    <div class="Cover">
        <IntroSection :styling="introSectionStyling">
            <div class="row firstRow">
                <div class="col-md-5 reportSection">
                    <div class="reportHeader">
                        REPORT
                    </div>
                    <div class="clientContactForm">
                        <h5 class="clientFormHeader">CLIENT CONTACT</h5>
                        <div class="clientFormField">Name: {{ this.client.name }}</div>
                        <div class="clientFormField">Email: {{ this.client.email }}</div>
                        <div class="clientFormField">Phone No: {{ this.client.phone }}</div> 
                        <div class="clientFormField">City, State: {{ this.client.address }}</div>
                    </div>
                </div>
                <div class="col-md-7 brandInfoSection">
                    <BlackBox />
                    <Form :Form="orderInfo.form" :readonly="true" title="Brand Information" />
                </div>
            </div>
            <div class="row secondRow">
                <div class="col-md-5 styleSection">
                    <Styles 
                        :styles="orderInfo.style"
                        :readonly="true"
                    />
                </div>
                <div class="col-md-7 bottomRightSection">
                    <div class="row">
                        <div class="col-md logotypeSection">

                        </div>
                        <div class="col-md colorSection">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Font
                        </div>
                        <div class="col-md-8 fontSection">

                        </div>
                    </div>
                </div>
            </div>
        </IntroSection>
    </div>
    
    
</template>

<script>
import IntroSection from '../UI/IntroSection';
import Form from '../OtherPages/Design/LogoDesign/Info/Form/Form';
import Styles from '../OtherPages/Design/LogoDesign/Info/Style/Styles';
import axios from 'axios';
import BlackBox from '../UI/BlackBox';

export default {
    components: {
        IntroSection,
        Form,
        BlackBox,
        Styles
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
                logotype: [],
                color: [],
                font: ''
            };
        },
        client() {
            let client = JSON.parse(this.clientString);
            return client;
        }
    }
}
</script>

<style scoped>

    .Cover {
        overflow-x: hidden;
        
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
        background-color: blue;
        height: 500px;
    }

    .colorSection {
        background-color: gray; 
        height: 500px;
    }

    .fontSection {
        background-color: pink;
        height: 500px;
    }

</style>
