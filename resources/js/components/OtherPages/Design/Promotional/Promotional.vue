<template>
    <div class="Cover">
        <Header 
            title = "Promotional" 
            text = "Design Your Promotional Items"
        />
        <!-- <BlackBox>
            <h2>Promotional</h2>
        </BlackBox>
        <div class="row">
            <h4>Design your Promotional Items</h4>
        </div> -->
        <RingLoader v-if="!loaded" />
        <div v-else>
            <div class="row grayContainer mt-2 mb-2">
                <div class="col-md flex-container">
                    <div class="product" v-for="item in items" :key="item.title">
                        
                        <label class="yellowCheckBox">
                            <input type="checkbox" :value="item" :id="item.title" v-model="selectedItems" hidden   />
                            <span></span>
                        </label>
                        <label class="itemLabel" :for="item.title">{{ $root.$t(item.title) }}</label>              
                    </div>
                    
                </div>
                <div class="col-md flex-container-align-vertical">
                    <div class="checkoutSection">
                        <Cost 
                            :products="selectedItems" 
                            v-on:update="updateCost"     
                            triangleColor='lightgray'                   
                        />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <!-- <v-btn round color="primary" @click="backButtonClicked()">Back</v-btn> -->
                    <SubmitButton 
                        :buttonDisabled="selectedItems.length < 1" 
                        :buttonClicked="() => submitButtonClicked()" 
                    />
                </div>
                <div class="col-md-4">
                    <!-- <v-btn 
                        color="#FFDB00" 
                        round 
                        :disabled="selectedItems.length < 1" 
                        @click="submitButtonClicked()">Submit</v-btn> -->
                        <!-- <SubmitButton 
                            :buttonDisabled="selectedItems.length < 1"
                            :buttonClicked="() => submitButtonClicked()"
                        /> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BlackBox from '../../../UI/BlackBox';
import SubmitButton from '../../../UI/SubmitButton';
import Cost from '../../../UI/Cost';
import { store, getProducts } from '../../../../data/promotional.js';
import Header from '../../../UI/Header';
import RingLoader from 'vue-spinner/src/RingLoader';

export default {
    components: {
        BlackBox,
        Cost,
        SubmitButton,
        Header,
        RingLoader
    },
    data() {
        return {
            selectedItems: [],
            totalCost: 0,
            loaded: false
        }
    },
    computed: {
        items() {
            return store.products;
        }
    },
    mounted() {
        getProducts().then(res => {
            this.loaded = true;
        });
    },
    methods: {
        updateCost(cost) {
            this.totalCost = cost;
        },
        submitButtonClicked() {
            let arrayOfItemNames = this.selectedItems.map(item => item.title);
            let price = this.totalPrice;
            let payload = {
                items: arrayOfItemNames,
                price: price
            };
            this.$store.dispatch('promotional/setItems', payload);
            console.log(this.$store.state);
        }
    },
    // watch: {
    //     selectedItems: function(newValue, oldValue) {
    //         this.totalPrice = this.selectedItems.map(item => item.price).reduce((prev, next) => {
    //             return prev + next;
    //         },0);
    //     }
    // }

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
