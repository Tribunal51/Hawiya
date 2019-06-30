<template>
    <div id="cover">
        <form @submit="formSubmitted">
            <div class="formSection">
                <input class="input-bottom-border" type="text" placeholder="NAME (REQUIRED)" v-model="form.name" required/>
                <input class="input-bottom-border" type="email" placeholder="EMAIL (REQUIRED)" v-model="form.email" required />
                <input class="input-bottom-border" type="tel" placeholder="PHONE" v-model="form.phone" />
                <input class="input-bottom-border" type="text" placeholder="SUBJECT (REQUIRED)" v-model="form.subject" required />
                <textarea class="input-bottom-border" type="text" placeholder="MESSAGE (REQUIRED)" v-model="form.message" required />
            </div>
            <input type="submit" class="btn btn-dark" value="Submit" />       
            <!-- <button type="submit" class="btn btn-dark" @click="submitButtonClicked">Submit</button> -->
        </form>
        <div v-if="success" class="alert alert-success py-2 my-2" role="alert">
            Form submitted. We will reach out to you soon.
        </div>

        <div v-if="error" class="alert alert-danger py-2 my-2" role="alert">
            There was an alert in submitting the form. Please try again later.
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                name: '',
                email: '',
                phone: '',
                subject: '',
                message: ''
            },
            success: false,
            error: ''
        }
    },
    methods: {
        formSubmitted(event) {
            this.success = true;
            event.preventDefault();
            axios.post("http://hawiya.net/api/query", this.form)
            .then(res => {
                if(res.data > 0) {
                    this.success = true;
                    this.error = false;
                    this.clearForm();
                }
                else {
                    this.error = true;
                }
                console.log(res.data);
            })
            .catch(error => console.log(error.response.data));
            console.log(this.form);
            
        },
        clearForm() {
           Object.keys(this.form).forEach(key => {
               this.form[key] = '';
           });
        }
    }
}
</script>

<style scoped>
    #cover {
        width: 100%;
        height: 100%;
        padding-right: 5% !important;
        
    }
    /* .input-bottom-border {
        border: 0;
        outline: 0;
        background: transparent;
        border-bottom: 1px solid black;
        width: 100%;
        display: block;
    } */

    .formSection {
        margin-bottom: 10px;
        font-family: 'LatoLight',sans-serif;
    }

    textarea {
        height: 100px;
        resize: none;
    }
    
    /* input:required:invalid, input:focus:invalid, textarea:required:invalid, textarea:focus:invalid {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAeVJREFUeNqkU01oE1EQ/mazSTdRmqSxLVSJVKU9RYoHD8WfHr16kh5EFA8eSy6hXrwUPBSKZ6E9V1CU4tGf0DZWDEQrGkhprRDbCvlpavan3ezu+LLSUnADLZnHwHvzmJlvvpkhZkY7IqFNaTuAfPhhP/8Uo87SGSaDsP27hgYM/lUpy6lHdqsAtM+BPfvqKp3ufYKwcgmWCug6oKmrrG3PoaqngWjdd/922hOBs5C/jJA6x7AiUt8VYVUAVQXXShfIqCYRMZO8/N1N+B8H1sOUwivpSUSVCJ2MAjtVwBAIdv+AQkHQqbOgc+fBvorjyQENDcch16/BtkQdAlC4E6jrYHGgGU18Io3gmhzJuwub6/fQJYNi/YBpCifhbDaAPXFvCBVxXbvfbNGFeN8DkjogWAd8DljV3KRutcEAeHMN/HXZ4p9bhncJHCyhNx52R0Kv/XNuQvYBnM+CP7xddXL5KaJw0TMAF8qjnMvegeK/SLHubhpKDKIrJDlvXoMX3y9xcSMZyBQ+tpyk5hzsa2Ns7LGdfWdbL6fZvHn92d7dgROH/730YBLtiZmEdGPkFnhX4kxmjVe2xgPfCtrRd6GHRtEh9zsL8xVe+pwSzj+OtwvletZZ/wLeKD71L+ZeHHWZ/gowABkp7AwwnEjFAAAAAElFTkSuQmCC);
        background-position: right top;
        background-repeat: no-repeat;
        -moz-box-shadow: none;
    }
    input:required:valid, textarea:required:valid {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAepJREFUeNrEk79PFEEUx9/uDDd7v/AAQQnEQokmJCRGwc7/QeM/YGVxsZJQYI/EhCChICYmUJigNBSGzobQaI5SaYRw6imne0d2D/bYmZ3dGd+YQKEHYiyc5GUyb3Y+77vfeWNpreFfhvXfAWAAJtbKi7dff1rWK9vPHx3mThP2Iaipk5EzTg8Qmru38H7izmkFHAF4WH1R52654PR0Oamzj2dKxYt/Bbg1OPZuY3d9aU82VGem/5LtnJscLxWzfzRxaWNqWJP0XUadIbSzu5DuvUJpzq7sfYBKsP1GJeLB+PWpt8cCXm4+2+zLXx4guKiLXWA2Nc5ChOuacMEPv20FkT+dIawyenVi5VcAbcigWzXLeNiDRCdwId0LFm5IUMBIBgrp8wOEsFlfeCGm23/zoBZWn9a4C314A1nCoM1OAVccuGyCkPs/P+pIdVIOkG9pIh6YlyqCrwhRKD3GygK9PUBImIQQxRi4b2O+JcCLg8+e8NZiLVEygwCrWpYF0jQJziYU/ho2TUuCPTn8hHcQNuZy1/94sAMOzQHDeqaij7Cd8Dt8CatGhX3iWxgtFW/m29pnUjR7TSQcRCIAVW1FSr6KAVYdi+5Pj8yunviYHq7f72po3Y9dbi7CxzDO1+duzCXH9cEPAQYAhJELY/AqBtwAAAAASUVORK5CYII=);
        background-position: right top;
        background-repeat: no-repeat;
    } */
    

</style>
