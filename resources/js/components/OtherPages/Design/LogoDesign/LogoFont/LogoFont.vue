<i18n>
    {
        "en": {
            "title": "Choose your Brand Font",
            "line1": "Used correctly, typography can convey a certain mood or feeling. The audience needs to understand what message you are trying to send and be interested in it. Having appropriate font sets the tone for your Branding before you even begin.",
            "line2": "Using fonts that are clean and easy to read are key to any Brand. If fonts are too small or cramped together, your brand will be immediately ignored. It is fun to have a cool and complex Logo, but the audience should be able to easily comprehend what your Logo is saying."
        },
        "ar": {
            "title": "اختيار خط العلامة التجارية الخاصة بك",
            "line1": "تستخدم بشكل صحيح ، يمكن أن تنقل الطباعة مزاج أو شعور معين. يجب أن يفهم الجمهور الرسالة التي تحاول إرسالها وأن يهتم بها. إن وجود الخط المناسب يضبط نغمة علامتك التجارية قبل أن تبدأ.",
            "line2": "يعد استخدام الخطوط النظيفة وسهلة القراءة مفتاحًا لأي علامة تجارية. إذا كانت الخطوط صغيرة جدًا أو ضيقة معًا ، فسيتم تجاهل علامتك التجارية على الفور. من الممتع أن يكون لديك شعار رائع ومعقد ، لكن يجب أن يكون الجمهور قادرًا على فهم ما يقوله شعارك بسهولة."
        }
    }
</i18n>

<template>
    <div class="Cover">
        <SubHeader :hideYellowLine="true"><h3>{{ $t('title') }}</h3></SubHeader>
            
        <!-- <BlackBox>
            <h2> Choose Your Brand Font </h2>
        </BlackBox> -->
        <div class="row Intro mt-2">
            <div class="col-md">
                <p>
                    {{ $t('line1') }}
                </p>

                <p>
                    {{ $t('line2') }}
                </p>
            </div>
        </div>

        <div class="checkBoxGroup">
            <div class="checkBox" v-for="font in fonts" :key="font.name">
                <input 
                    type="radio" 
                    :id="font.name" 
                    :value="font.name"  
                    v-model="selectedFont"
                    class="inputRadio"  
                />
                <label :for="font.name" class="checkBoxLabel">
                    <!-- <img 
                        :src="'/storage/logotype/'+font.file" 
                        :alt="font.name" 
                        class="checkbox-image"
                    /> -->
                    <!-- <h1 :style="font.style">{{ font.name }}</h1> -->
                    <!-- <div class="fontImage" :style="'background:url('+font.file+') fill'"></div> -->

                    <!-- <img :src="font.file" :alt="font.name" class="fontImage" />
                    <div class="fontBox">
                        <p>{{ font.description }}</p>
                    </div> -->

                    <Font 
                        :font="font" 
                        :yellowBottomBorder="true" 
                    />
                </label>

            </div>
        </div>
        
            <!-- <div class="row my-2">
                <div class="col-sm-2">
                    <CheckMark>
                        <input 
                        type="radio" 
                        value="No Font Selected" 
                        v-model="selectedFont"
                        id="noIdea"   />
                    </CheckMark>
                </div>
                <label for="noIdea" class="col-sm-10 noIdeaSection">
                    <h4>I don't have an idea.</h4>
                </label>
            </div> -->

        <NoIdea id="noIdea">
            <input 
                type="radio" 
                value="No Font Selected" 
                v-model="selectedFont"
                id="noIdea"   
            />
        </NoIdea>

        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4 nextButtonSection">
                
                    <NextButton :buttonDisabled="isButtonDisabled()" :buttonClicked="nextButtonClicked"  />
                    <!-- <v-btn color="success" :disabled="isButtonDisabled()" @click="nextButtonClicked()">Next</v-btn> -->
                
            </div>
        </div>

    
    </div>
</template>

<script>
import CheckMark from '../../../../UI/CheckMark';
import BlackBox from '../../../../UI/BlackBox';
import SubHeader from '../../../../UI/SubHeader';
import NextButton from '../../../../UI/NextButton';
import Font from './Font';
import { store } from '../../../../../data/logodesign';
import NoIdea from '../../../../UI/NoIdea';

export default {
    components: {
        CheckMark,
        BlackBox,
        SubHeader,
        NextButton,
        Font,
        NoIdea
    },
    mounted() {
        if(this.$store.state.logodesign.font !== null) {
            this.selectedFont = this.$store.state.logodesign.font;
        }
    },
    data() {
        return {
            selectedFont: '',
        }
    },
    computed: {
        package() {
            let packageTitle = this.$store.state.logodesign.package;
            if(packageTitle) {
                packageTitle = packageTitle.charAt(0).toUpperCase() + packageTitle.slice(1).toLowerCase();
                return packageTitle;
            }
            
        },
        fonts() {
            return store.fonts;
        }
    },
    methods: {
        isButtonDisabled() {
            return this.selectedFont === '';
        },
        nextButtonClicked() {
            this.$store.dispatch('logodesign/setFont', this.selectedFont);
            this.$router.push({
                name: 'logoinfo'
            });
        }
    },
    watch: {
        selectedFont: function(newValue, oldValue) {
            console.log('Watch', newValue);
        }
    },
    
}
</script>

<style scoped>

    .checkBoxGroup {
        display: flex;
        /* background-color: red !important; */
    }

    .checkBox {
        /* background-color: red; */
        /* width: 200px !important;
        
        height: 200px !important; */
        /* flex-grow: 1; */
        /* width: 200px !important;
        height: 200px !important; */
        /* flex: 1 1 auto; */
        /* background-color: green !important; */
    }

    .checkBoxLabel {
        /* background-color: blue !important; */
    }

    .checkBox img:hover {
        transform: scaleX(1);
        transform: scaleY(1);
    }

    :checked + .checkBoxLabel img {
        transform: scale(1);
        box-shadow: 0 0 0 0;
        z-index: 0;
    }

    .fontImage {
        width: 100%;
        height: 75px;
    }

    .fontBox {
        /* display: inline-block; */
        color: gray;
        border-bottom: solid #FFDB00 2px;
    }

    .noIdeaSection {
        cursor: pointer;
    }

    .nextButtonSection {
        text-align: right;
    }
    
    
</style>
