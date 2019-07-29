<template>
    <div class="Cover">
        <SubHeader><h5>Logo Information</h5></SubHeader>
        <!-- <div class="row">
            <div class="col-md-4">
                <BlackBox>
                    <h5>Logo Information</h5>
                </BlackBox>
            </div>
            <div class="col-md-8 yellowLineSection">

            </div>
        </div> -->
        <div class="row">
            <div class="col-md mt-2 mb-2">
                <h5>Fill your brand information</h5>
            </div>
        </div>
        
        <div class="form-group">
            <!-- <label for="brandName">*</label> -->
            <input type="text" 
            class="input-bottom-border" 
            id="brandName" 
            placeholder="BRAND NAME (REQUIRED)" 
            @input="updateForm($event.target.value, 'brand')"
            :value="this.Form.brand"
            required
            />
            <small for="brandName" id="brandName" class="form-text text-muted">At least 3 characters</small>
        </div>

        <div class="form-group">
            <input 
            type="text" 
            class="input-bottom-border" 
            placeholder="TAGLINE (OPTIONAL)" 
            @input="updateForm($event.target.value, 'tagline')"
            :value="this.Form.tagline"
        
             />
        </div>

        <div class="form-group">
            <input type="text" 
            class="input-bottom-border" 
            placeholder="BUSINESS FIELD (REQUIRED)"  
            @input="updateForm($event.target.value, 'business_field')"
            :value="this.Form.business_field"
            required
            />
        </div>

        <div class="form-group">
            <input type="text" 
            class="input-bottom-border"
            placeholder="SUBJECT (REQUIRED)" 
            @input="updateForm($event.target.value, 'subject')"
            :value="this.Form.subject" 
            required 
            />

        </div>

        <div class="form-group">
            <textarea 
            type="text" 
            class="input-bottom-border" 
            placeholder="DESCRIPTION OF YOUR BUSINESS (REQUIRED)" 
            @input="updateForm($event.target.value, 'description')"
            :value="this.Form.description" 
            required
            />
        </div>        
    </div>
</template>

<script>
import BlackBox from '../../../../../UI/BlackBox';
import SubHeader from '../../../../../UI/SubHeader';

export default {
    props: [
        "Form"
    ],
    components: {
        BlackBox,
        SubHeader
    },
    data() {
        return {
            form: {...this.Form}
        }
    },
    mounted() {
        // if(this.$store.state.logodesign.form === null) {
        //     this.form = {...this.Form};
        // }
        // else {
        //     this.form = {...this.$store.state.logodesign.form};
        // }
    },
    methods: {
        updateForm(value, type) {
            switch(type) {
                case 'brand': this.form.brand = value;
                break;

                case 'tagline': this.form.tagline = value;
                break;

                case 'business_field': this.form.business_field = value;               
                break;

                case 'subject': this.form.subject = value;
                break;

                case 'description': this.form.description = value;                
                break;  
            }
            this.$emit('form', this.form);
        }
    }
    
}
</script>

<style scoped>
    .Cover {
        text-align: left;
    }

    
</style>
