<i18n>
    {
        "en": {
            "Connect": "Connect",
            "With The Hawiya Brand": "With The Hawiya Brand...",
            "Get in Touch": "Get in Touch",
            "Telephone": "Telephone: +965 12345678",
            "Fax": "Fax: +965 12345678",
            "Office": "Office",
            "Address": "6th Floor, Meshal Tower, Jaber Al-Mubarak Street, Sharq, Kuwait City.",
            "General Inquiries": "General Inquiries",
            "Business": {
                "New Business": "New Business", 
                "ContactName": "Ahmad Abouzeid",
                "ContactPhone": "+965 12345678",
                "ContactEmail": "Ahmad@HawiyaBrands.com"
            },
            "Opening Hours": "Opening Hours",
            "OfficeHours": {
                "Line1": "Sunday to Thursday - 9AM to 6PM",
                "Line2": "Friday & Saturday - Closed"
            },
            "Interested": "Interested in becoming part of our Team?",
            "InterestedContact": "Please send your CV & Portfolio to careers@hawiyabrands.com"

        },
        "ar": {
            "Connect": "الاتصال",
            "With The Hawiya Brand": "...مع ماركة هاوية",
            "Get in Touch": "ابقى على تواصل",
            "Telephone": "+هاتف: ٩٦٥ ١٢٣٤٥٦٧٨",
            "Fax": "+فاكس: ٩٦٥ ١٢٣٤٥٦٧٨",
            "Office": "مركز",
            "Address": "الطابق السادس ، برج مشعل ، شارع جابر المبارك ، الشرق ، مدينة الكويت.",
            "General Inquiries": "تساؤلات عامة",
            "Business": {
                "New Business": "أعمال جديدة",
                "ContactName": "احمد ابوزيد",
                "ContactPhone": "+٩٦٥ ١٢٣٤٥٦٧٨",
                "ContactEmail": "Ahmad@HawiyaBrands.com"
            },
            "Opening Hours": "ساعات العمل",
            "OfficeHours": {
                "Line1": "من الأحد إلى الخميس - 9:00 حتي 6:00",
                "Line2": "الجمعة والسبت - مغلق"
            },
            "Interested": "هل أنت مهتم بأن تصبح جزءًا من فريقنا؟",
            "InterestedContact": "يرجى إرسال سيرتك الذاتية وحافظة الأوراق المالية إلى careers@hawiyabrands.com"
        }
    }
</i18n>

<template>
    <div id="cover">
        <IntroSection>            
            <div class="row">
                <div class="col-md">
                    <BlackBox :customStyles="fontRegular">
                        <h2> {{ $t('Connect') }} <br /> {{ $t('With The Hawiya Brand') }} </h2>               
                    </BlackBox>
                </div>
                <div class="col-md">

                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <BlackBox :customStyles="fontRegular">
                        <h4>{{ $t('Connect') }}</h4>
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
                                <h4>{{ $t('Get in Touch') }}</h4>                                
                            </BlackBox>
                            
                            <div class="row">
                                <div class="col">
                                    <p class="smallLightGray">
                                    {{ $t('Telephone') }} <br>
                                    {{ $t('Fax') }}</p>

                                    <p class="lightGray">{{ $t('Office') }}<br>
                                    <span class="smallLightGray">{{ $t('Address')}}</span></p>

                                    <p class="lightGray">{{ $t('General Inquiries') }}<br>
                                    <span class="smallLightGray">hello@hawiyabrands.com</span></p>

                                    <p class="lightGray">{{ $t('Business.New Business') }}<br>
                                    <span class="smallLightGray">{{ $t('Business.ContactName')}}<br>{{ $t('Business.ContactEmail') }}<br>{{ $t('Business.ContactPhone') }}</span></p>
                                </div>
                            </div>
                                                 
                        </div>
                        <div class="col-sm">
                            
                            <BlackBox :customStyles="fontRegular">
                                <h4>{{ $t('Opening Hours')}}</h4>
                            </BlackBox>
                            
                            <div class="row">
                                <div class="col-md">
                                    <p class="smallLightGray">
                                        {{ $t('OfficeHours.Line1')}}<br>{{ $t('OfficeHours.Line2')}}
                                    </p>
                                </div>                              
                            </div>
                            
                            <BlackBox :customStyles="fontRegular">
                                <h4>{{ $t('Interested') }}</h4>
                            </BlackBox>

                            <div class="row">
                                <div class="col-md">
                                    <p class="smallLightGray">
                                        {{ $t('InterestedContact')}}
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
