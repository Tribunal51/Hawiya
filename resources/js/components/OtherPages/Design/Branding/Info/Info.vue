<i18n>
    {
        "en": {
            "YOU WILL GET": "YOU WILL GET",
            "branding_feature1": "LOGO OR WATERMARK",
            "branding_feature2": "DIFFERENT LOGO 'LOCKUPS'",
            "branding_feature3": "KEY COLORS",
            "branding_feature4": "ADDITIONAL COLOR PALETTE OPTIONS",
            "branding_feature5": "CORPORATE TYPEFACES",
            "branding_feature6": "STANDARD TYPOGRAPHIC TREATMENTS",
            "branding_feature7": "CONSISTENT STYLE FOR IMAGES",
            "branding_feature8": "HAVE A FULL LIBRARY OF GRAPHIC ELEMENTS"
        },
        "ar": {
            "YOU WILL GET": "ستحصل",
            "branding_feature1": "شعار أو علامة مائية",
            "branding_feature2": "شعار مختلف 'الأقفال'",
            "branding_feature3": "الألوان الرئيسية",
            "branding_feature4": "خيارات لوح الألوان الإضافية",
            "branding_feature5": "أنواع الشركات",
            "branding_feature6": "المعالجات الطباعية القياسية",
            "branding_feature7": "نمط ثابت للصور",
            "branding_feature8": "لديك مكتبة كاملة من العناصر الرسومية"
        }
    }
</i18n>

<template>
    <div class="Cover">
        <!-- <BlackBox>
            <div class="col-md-3">
                <h2> {{ this.package }}</h2>
            </div>
            <div class="col-md-9 borderBottomYellow">

            </div>
        </BlackBox> -->
        <SubHeader>
            <h2>{{ $root.$t(this.$store.state.branding.package) }}</h2>
        </SubHeader>
        <div class="row mt-3">
            <div class="col-md textSection">
                <div class="row">
                    <h5 class="col">{{ $t('YOU WILL GET') }}</h5>
                </div>
                <div class="row">
                    <div class="col p-4">
                        <div class="row" v-for="feature in features" :key="feature">
                            <p class="col"> - {{ $t(feature) }}</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md inputSection">
                <div class="image">
                    <ImageUpload 
                        v-on:dataurls="updateFileUrls"
                        v-on:files="updateFiles" 
                        type="single"
                        :hideImage="true" />
                </div>
                <div class="textarea">
                    <textarea 
                        v-model="comment" 
                        class="input-textarea-gray">
                    </textarea>
                </div>
                

                <!-- <TextArea v-on:text="updateComment"></TextArea> -->

                

            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <SubmitButton :buttonClicked="nextButtonClicked" :buttonDisabled="isButtonDisabled()" />
            </div>
        </div>
        
       
   </div>
</template>

<script>
import ImageUpload from '../../../../UI/ImageUpload';
import BlackBox from '../../../../UI/BlackBox';
import TextArea from '../../../../UI/TextArea';
import SubmitButton from '../../../../UI/SubmitButton';
import SubHeader from '../../../../UI/SubHeader';
import { store } from '../../../../../data/branding';
//import * from 'vuetify/lib';
// import { VBtn } from 'vuetify';

export default {
    components: {
        ImageUpload,
        BlackBox,
        TextArea,
        SubmitButton,
        SubHeader
    },
    data() {
        return {
            comment: '',
            dataurl: '',
            file: '',
            
        }
    },
    computed: {
        features() {
            return store.features;
        },
        package() {
            return this.$store.state.branding.package;
        }
    },
    mounted() {

    },
    methods: {
        updateFileUrls(urls) {
            if(urls === null) {
                this.dataurl = '';
            } else {
                this.dataurl = urls[0];
                //console.log('Urls', this.dataurls);
            }
            
        },
        updateFiles(files) {
            if(files === null) {
                this.file = '';
            }
            else {
                this.file = files[0];
                //console.log('Files Update ', this.files);
            }
            
            
        },
        isButtonDisabled() {
            return (this.file === '' || this.comment === '');
        },
        nextButtonClicked() {
            //console.log('Current Image: ',this.dataurls);
            //console.log('Curent comment', this.comment);

            let data = {
                user_id: 1,
                package: 'Test',
                logo_photo: this.dataurl,
                comment: this.comment
            };
            console.log('Data to send', data);

            let payload = {
                image: this.dataurl,
                comment: this.comment
            }
            this.$store.dispatch('branding/setInfo', payload);

            console.log('Is Branding Order valid? ',this.$store.getters['branding/isValid'] );
            console.log(this.$store.state);
            // console.log('Data', data);
            axios.post('http://hawiya.net/api/orders/branding', data)
            .then(res => console.log(res.data))
            .catch(error => console.log(error.response));
        }
    }

}
</script>

<style scoped>

    

    .textSection {
        padding-top: 5px;
    }

    .inputSection {
        padding: 5px;
        height: 100%;
    }

    /* .features {
        padding-left: 10px;
    } */

    .input-textarea-gray {
        margin-top: 10px;
        height: 300px;
        width: 100%;
    }

    .featuresSection {
        padding: 10px;
    }
</style>
