<template>
    <div id="cover">
        <IntroSection>            
            <div class="row">
                <div class="col-md">
                    <BlackBox :customStyles="fontRegular">
                        <h2> Connect <br /> With The Hawiya Brand... </h2>               
                    </BlackBox>
                </div>
                <div class="col-md">

                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <BlackBox :customStyles="fontRegular">
                        <h4>Connect</h4>
                    </BlackBox>
                    <div class="row">
                        <div class="col-md">
                            <ContactUsForm />
                        </div>
                    </div>                    
                </div>
                <div class="col-md">
                    <div class="row">
                        <div class="col-sm">
                            <BlackBox :customStyles="fontRegular">
                                <h4>Get in Touch</h4>                                
                            </BlackBox>
                            
                            <div class="row">
                                <div class="col">
                                    <p class="smallLightGray">
                                    Telephone: +965 12345678 <br>
                                    Fax: +965 12345678</p>

                                    <p class="lightGray">Office<br>
                                    <span class="smallLightGray">6th Floor, Meshal Tower, Jaber Al-Mubarak St., Sharq, Kuwait City.</span></p>

                                    <p class="lightGray">General Inquiries<br>
                                    <span class="smallLightGray">hello@hawiyabrands.com</span></p>

                                    <p class="lightGray">New Business<br>
                                    <span class="smallLightGray">Ahmad Abouzeid<br>Ahmad@Hawiyabrands.com<br>+965 12345678</span></p>
                                </div>
                            </div>
                                                 
                        </div>
                        <div class="col-sm">
                            
                            <BlackBox :customStyles="fontRegular">
                                <h4>Opening Hours</h4>
                            </BlackBox>
                            
                            <div class="row">
                                <div class="col-md">
                                    <p class="smallLightGray">
                                        Sunday to Thursday - 9AM to 6PM<br>Friday & Saturday - Closed
                                    </p>
                                </div>                              
                            </div>
                            
                            <BlackBox :customStyles="fontRegular">
                                <h4>Interested in becoming part of our Team?</h4>
                            </BlackBox>

                            <div class="row">
                                <div class="col-md">
                                    <p class="smallLightGray">
                                        Please send your CV & Portfolio to careers@hawiyabrands.com
                                    </p>
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
import BlackBox from '../../UI/BlackBox.vue';
import IntroSection from '../../UI/IntroSection.vue';
import ContactUsForm from './ContactUsForm.vue';
export default {
    components: {
        BlackBox,
        IntroSection,
        ContactUsForm
    },
    data() {
        return {
            fontRegular: {
                'fontFamily':'LatoRegular,sansSerif'
            },
            fontMedium: {
                'fontFamily':'LatoMedium,sansSerif'
            },
            fontBold: {
                'fontFamily':'LatoBold,sansSerif'
            },
            
            
        }
    }
}
</script>

<style scoped>
    #cover {
        min-height: 60vh !important;

    }

    .regular {
        font-family: 'LatoRegular', sans-serif;
    }

    .smallLightGray {
        font-family: 'LatoLight', sans-serif;
        font-size: 0.7rem;
        color: gray;
        display: block;
    }

    .lightGray {
        font-family: 'LatoLight', sans-serif;
        color: gray;
        display: block;
    }
</style>
