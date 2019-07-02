<template>
    <div class="Cover">
        <div class="container">
            <p>Logo Design/Font</p>
            <br />
            <div class="Intro">
                <h3> Choose the font you like.</h3>
                <br />
                <p> Font information </p>
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
                        <img 
                            :src="'/storage/logotype/'+font.file" 
                            :alt="font.name" 
                            class="checkbox-image"
                        />
                    </label>

                </div>
            </div>
            
            <div class="row my-2">
                <div class="col-sm-2">
                    <CheckMark>
                        <input 
                        type="radio" 
                        value="No Font Selected" 
                        v-model="selectedFont"
                         />
                    </CheckMark>
                </div>
                <div class="col-sm-10">
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
    </div>
</template>

<script>
import CheckMark from '../../../../UI/CheckMark';
export default {
    components: {
        CheckMark
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
                    name: 'Font 1',
                    file: 'letterform.png'
                },
                {
                    name: 'Font 2',
                    file: 'letterform.png'
                },
                {
                    name: 'Font 3',
                    file: 'letterform.png'
                },
                {
                    name: 'Font 4',
                    file: 'letterform.png'
                }
            ]
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
        width: 35% !important;
       
    }
    
    
</style>
