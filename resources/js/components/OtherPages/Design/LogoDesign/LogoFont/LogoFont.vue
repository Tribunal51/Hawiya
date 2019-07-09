<template>
    <div class="Cover">
        <h5>{{ this.package }} / Package </h5>
        <BlackBox>
            <h2> Choose Your Brand Font </h2>
        </BlackBox>
        <div class="Intro">
            <p>
                Used correctly, typography can convey a certain mood or feeling. The audience needs to understand what message you are trying to send and be interested in ti. Having the appropriate font sets the tone for your Branding before you even begin.
            </p>

            <p>
                Using fonts that are clean and easy to read are key to any Brand. If fonts are too small or cramped together, your Brand will be immediately ignored. It is fun to have a cool and complex Logo, but the audience should be able to easily comprehend what your Logo is saying.
            </p>
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
                    <h1 :style="font.style">{{ font.name }}</h1>
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
                        />
                </CheckMark>
            </div>
            <div class="col-sm-11">
                <h4>I don't have an idea.</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <center>
                    <v-btn color="success" :disabled="isButtonDisabled()" @click="nextButtonClicked()">Next</v-btn>
                </center>
            </div>
        </div>

    
    </div>
</template>

<script>
import CheckMark from '../../../../UI/CheckMark';
import BlackBox from '../../../../UI/BlackBox';
export default {
    components: {
        CheckMark,
        BlackBox
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
                    style: {
                        'fontFamily': 'Serif',
                        'fontSize': '2rem'
                    },
                    description: 'Traditional, have feel.',
                    file: 'letterform.png'
                },
                {
                    name: 'Sans Serif',
                    style: {
                        'fontFamily': 'Sans-Serif',
                        'fontSize': '2rem'
                    },
                    description: 'Modern, feel free.',
                    file: 'letterform.png'
                },
                {
                    name: 'Script',
                    style: {
                        'fontStyle': 'Italic',
                        'fontSize': '2rem'
                    },
                    description: 'Cursive, a bit more decorative.',
                    file: 'letterform.png'
                },
                {
                    name: 'Display',
                    style: {
                        'fontStyle': 'Bold',
                        'fontSize': '2rem'
                    },
                    description: 'Decorative, good as a design focal point.',
                    file: 'letterform.png'
                }
            ]
        }
    },
    computed: {
        package() {
            let packageTitle = this.$store.state.logodesign.package;
            packageTitle = packageTitle.charAt(0).toUpperCase() + packageTitle.slice(1).toLowerCase();
            return packageTitle;
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
    .checkBox {
        /* background-color: red; */
        width: 20% !important;  
        height: 200px !important;
        flex-grow: 1;
    }

    .fontBox {
        display: inline-block;
        color: gray;
        border-bottom: solid #FFDB00 2px;
    }
    
    
</style>
