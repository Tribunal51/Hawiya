<template>
    <div class="Cover">
        <SubHeader :hideYellowLine="true"><h3>Choose Your Brand Font</h3></SubHeader>
            
        <!-- <BlackBox>
            <h2> Choose Your Brand Font </h2>
        </BlackBox> -->
        <div class="row Intro mt-2">
            <div class="col-md">
                <p>
                    Used correctly, typography can convey a certain mood or feeling. The audience needs to understand what message you are trying to send and be interested in it. Having the appropriate font sets the tone for your Branding before you even begin.
                </p>

                <p>
                    Using fonts that are clean and easy to read are key to any Brand. If fonts are too small or cramped together, your Brand will be immediately ignored. It is fun to have a cool and complex Logo, but the audience should be able to easily comprehend what your Logo is saying.
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
                    <img :src="font.file" :alt="font.name" class="fontImage" />
                    <div class="fontBox">
                        <p>{{ font.description }}</p>
                    </div>
                </label>

            </div>
        </div>
        
        <div class="row my-2">
            <div class="col-sm-1">
                <CheckMark>
                    <input 
                    type="radio" 
                    value="No Font Selected" 
                    v-model="selectedFont"
                    id="noIdea"   />
                </CheckMark>
            </div>
            <label for="noIdea" class="col-sm-11 noIdeaSection">
                <h4>I don't have an idea.</h4>
            </label>
        </div>

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

export default {
    components: {
        CheckMark,
        BlackBox,
        SubHeader,
        NextButton
    },
    mounted() {
        if(this.$store.state.logodesign.font !== null) {
            this.selectedFont = this.$store.state.logodesign.font;
        }
    },
    data() {
        return {
            selectedFont: '',
            fonts: [
                {
                    name: 'Serif.',
                    description: 'Traditional, have feel.',
                    file: '/storage/Fonts/Serif.png'
                },
                {
                    name: 'Sans Serif',
                    description: 'Modern, feel free.',
                    file: '/storage/Fonts/SansSerif.png'
                },
                {
                    name: 'Script',
                    description: 'Cursive, a bit more decorative.',
                    file: '/storage/Fonts/Script.png'
                },
                {
                    name: 'Display',
                    description: 'Decorative, good as a design focal point.',
                    file: '/storage/Fonts/Display.png'
                }
            ]
        }
    },
    computed: {
        package() {
            let packageTitle = this.$store.state.logodesign.package;
            if(packageTitle) {
                packageTitle = packageTitle.charAt(0).toUpperCase() + packageTitle.slice(1).toLowerCase();
                return packageTitle;
            }
            
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
    }

    .checkBox {
        /* background-color: red; */
        /* width: 200px !important;
        
        height: 200px !important; */
        /* flex-grow: 1; */
        /* width: 200px !important;
        height: 200px !important; */
        flex: 1 1 auto;
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
        display: inline-block;
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
