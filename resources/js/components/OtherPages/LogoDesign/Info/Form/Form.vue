<template>
    <div id="cover">

        <div class="row">
            <div class="col-md-6"><strong> Fill out your personal information </strong></div>
            <div class="col-md-6"><hr></div>
        </div>
        <div class="form-group">
            <!-- <label for="brandName">*</label> -->
            <input type="text" 
            class="input-bottom-border" 
            id="brandName" 
            placeholder="Enter your brand name" 
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
            placeholder="Tagline (Optional)" 
            @input="updateForm($event.target.value, 'tagline')"
            :value="this.Form.tagline"
        
             />
        </div>

        <div class="form-group">
            <input type="text" 
            class="input-bottom-border" 
            placeholder="Business Field"  
            @input="updateForm($event.target.value, 'business_field')"
            :value="this.Form.business_field"
            required
            />
        </div>

        <div class="form-group">
            <textarea 
            type="text" 
            class="input-bottom-border" 
            placeholder="Description of your business" 
            @input="updateForm($event.target.value, 'description')"
            :value="this.Form.description" 
            required
            />
        </div>        
    </div>
</template>

<script>
export default {
    props: [
        "Form"
    ],
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

                case 'description': this.form.description = value;                
                break;
            }
            this.$emit('form', this.form);
        }
    }
    
}
</script>

<style scoped>

    #cover {
        text-align: left;
    }
    input {
        
        
    }
</style>
