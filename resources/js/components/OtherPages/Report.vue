<template>
    <div class="Cover">
        <IntroSection :styling="introSectionStyling">
            <div class="row firstRow">
                <div class="col-md-5 reportSection">
                    <div class="reportHeader">
                        REPORT
                    </div>
                    <div class="ClientContactForm">
                        <h5 class="clientFormHeader">CLIENT CONTACT</h5>
                        <div class="clientFormField">Name: {{ this.clientInfo.name }}</div>
                        <div class="clientFormField">Email: {{ this.clientInfo.email }}</div>
                        <div class="clientFormField">Phone No: {{ this.clientInfo.phone }}</div> 
                        <div class="clientFormField">City, State: {{ this.clientInfo.address }}</div>
                    </div>
                </div>
                <div class="col-md-7 brandInfoSection">

                </div>
            </div>
            <div class="row secondRow">
                <div class="col-md-5 styleSection">

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

export default {
    components: {
        IntroSection
    },
    data() {
        return {
            introSectionStyling: {
                paddingTop: '0px !important'
            },
            clientInfo: {               
                name: '',
                email: '',
                phone: '',
                address: ''               
            },
            orderInfo: {
                form: {
                    brand_name: '',
                    tagline: '',
                    business_field: '',
                    subject: '',
                    description: ''
                },
                style: {

                },
                logotype: [],
                color: [],
                font: ''
            }
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
        font-size: 3rem;
        font-weight: 800;
    }

    .ClientContactForm {
        width: 100%;
        display: flex;
        flex-flow: column wrap;
        padding: 5px 5px 20px 20px;
    }

    .ClientFormField {
        padding-bottom: 2px;
        font-size: 1.5rem;
    }

    

    .brandInfoSection {
        /* height: 500px; */
        background-color: red;
    }

    .styleSection {
        background-color: green;
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
