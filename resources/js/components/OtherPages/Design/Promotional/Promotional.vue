<template>
    <div class="Cover">
        <BlackBox>
            <h2>Promotional</h2>
        </BlackBox>
        <div class="row">
            <h4>Design your Promotional Items</h4>
        </div>
        <BlackBox />
        
        <div class="row grayContainer mt-2 mb-2">
            <div class="col-md flex-container">
                <div class="product" v-for="item in items" :key="item.name">
                    
                    <label class="yellowCheckBox">
                        <input type="checkbox" :value="item" :id="item.name" v-model="selectedItems" hidden   />
                        <span></span>
                    </label>
                    <label class="itemLabel" :for="item.name">{{ item.name }}</label>              
                </div>
                
            </div>
            <div class="col-md flex-container-align-vertical">
                <div class="checkoutSection">
                    <Cost 
                        :items="selectedItems" 
                        :totalPrice="totalPrice"                        
                    />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <!-- <v-btn round color="primary" @click="backButtonClicked()">Back</v-btn> -->
            </div>
            <div class="col-md-4">
                <!-- <v-btn 
                    color="#FFDB00" 
                    round 
                    :disabled="selectedItems.length < 1" 
                    @click="submitButtonClicked()">Submit</v-btn> -->
                    <SubmitButton 
                        :buttonDisabled="selectedItems.length < 1"
                        :buttonClicked="() => submitButtonClicked()"
                    />
            </div>
        </div>

    </div>
</template>

<script>
import BlackBox from '../../../UI/BlackBox';
import SubmitButton from '../../../UI/SubmitButton';
import Cost from './Cost';
import { store } from './store.js';

export default {
    components: {
        BlackBox,
        Cost,
        SubmitButton
    },
    data() {
        return {
            totalPrice: 0,
            selectedItems: []
        }
    },
    computed: {
        items() {
            return store.items;
        }
    },
    methods: {
        submitButtonClicked() {
            let arrayOfItemNames = this.selectedItems.map(item => item.name);
            let price = this.totalPrice;
            let payload = {
                items: arrayOfItemNames,
                price: price
            };
            this.$store.dispatch('promotional/setItems', payload);
            console.log(this.$store.state);
        }
    },
    watch: {
        selectedItems: function(newValue, oldValue) {
            this.totalPrice = this.selectedItems.map(item => item.price).reduce((prev, next) => {
                return prev + next;
            },0);
        }
    }

}
</script>

<style scoped>
    .flex-container {
        height: 300px;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
    }

    @media(max-width: 240px) {
        .flex-container {
            height: auto;
            min-height: 300px;
        }
    }

    .itemLabel {
        cursor: pointer;
    }

    

</style>
