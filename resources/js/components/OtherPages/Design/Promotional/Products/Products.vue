<template>
    <div class="Cover">
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
</template>