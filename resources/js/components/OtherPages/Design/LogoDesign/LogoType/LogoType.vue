<template>
    <div id="cover">
        <div class="container">
            <p> Logo Design/Type</p>
            <br />
            <div class="intro">
                <h3>Choose the design you like</h3>
                <br />
                <p>The logo is a pictorial mark which is also called the logo symbol and logo brand. It is used as the identity of the company. The logo of several types. Logo put lives in the company. It is so beautifully designed that the viewers are attracted towards him. The logo for the company is very important.</p>
            </div>



            <div class="checkBoxGroup">
                <div class="checkBox" v-for="type in types" :key="type.title">
                    <input 
                    type="checkbox" 
                    class="inputCheckBox"
                    :id="type.title" 
                    v-model="selectedTypes" 
                    :value="type.title" 
                    :disabled="selectedTypes.length >= selectedTypesLimit && selectedTypes.indexOf(type.title) < 0 " />
                    <label class="checkBoxLabel" :for="type.title"><img :src="'/storage/logotype/'+type.file" :alt="type.title" class="checkbox-image" /></label>
                </div>
            </div>



            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <center>
                        <v-btn color="success" :disabled="isButtonDisabled()" @click="nextButtonClicked">Next</v-btn>
                    </center>
                </div>
            </div>
            
            
            
            <!-- <router-link tag="button" class="btn btn-warning" :disabled="isButtonDisabled()">Next</router-link> -->
        </div>
    </div>
</template>

<script>
import Type from './Type.vue';
import CheckMark from '../../../../UI/CheckMark';

export default {
    mounted() {
        console.log('Just Mounted on LogoType ', this.$store.state.logodesign);
        if(this.$store.state.logodesign.logotype !== null) {
            this.selectedTypes = [...this.$store.state.logodesign.logotype];
        }
        
    },
    components: {
        Type,
        CheckMark
    },
    data() {
        return {
            selectedTypes: [],
            selectedTypesLimit: 2,
            types: [
                {
                    title: 'Combination Mark',
                    file: 'combination-mark.png'
                },
                {
                    title: 'Emblem',
                    file: 'emblem.png'
                },
                {
                    title: 'Letterform',
                    file: 'letterform.png'
                },
                {   
                    title: 'Pictorial mark',
                    file: 'pictorial-mark.png'
                },
                {
                    title: 'Signature',
                    file: 'signature.png'
                },
                {
                    title: 'WordMark',
                    file: 'wordmark.png'
                },
                {
                    title: 'Abstract mark',
                    file: 'abstract-mark.png'
                }
            ]
        }
    },
    methods: {
        boxClicked() {
            //console.log(this.selectedTypes);
        },
        isButtonDisabled() {
            return this.selectedTypes.length < 1;
            // || this.selectedTypes.length >= this.selectedTypesLimit
        },
        nextButtonClicked() {
            //alert('nextButtonClicked');
            this.$store.dispatch('logodesign/setType', this.selectedTypes);
            this.$router.push({
                name: 'logofont'
            });
        }
    },
    watch: {
        selectedTypes: function(value, oldValue) {
            console.log('Value', value, 'Old Value', oldValue);
        }
    }
}
</script>

<style scoped>

    

    .intro {
        text-align: center;
    }



    



    

</style>
