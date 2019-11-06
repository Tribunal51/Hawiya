<template>
  <div id="cover">
    <form @submit="submitButtonClicked">
        <div class="row">
          <div class="col-xl">
            <div class="row" id="section1">
              <div class="col-md">
                <Form v-on:form="updateForm" :Form="assignForm()"/>
                <!-- <FormInfo :form="info.form" v-on:form="updateForm" /> -->
              </div>
            </div>
            <div class="row">
              <div class="col-md" id="section2">
                <Styles :styles="assignStyles()" v-on:styles="updateStyles"/>
                <!-- <Styles 
                                :styles="this.$store.state.logodesign.style === null ? info.styles : this.$store.state.logodesign.style" 
                v-on:styles="updateStyles" />-->
              </div>
            </div>
          </div>
         
          <div class="col-xl" id="section3">
            <Color v-on:color="updateColors" :color="assignColor()" />
          </div>
        </div>
        <!-- <ImageUpload v-on:dataurls="updateFileUrls"/> -->
        <div class="row">
          <div class="col-md-2">
            <SubmitButton buttonType="submit" :buttonDisabled="isButtonDisabled()" />
          </div>
          <div class="col-md-10">
          </div>
        </div>
      
    </form>
    
  </div>
</template>



<script>

import Form from "./Form/Form.vue";
import Styles from "./Style/Styles.vue";
import Color from "./Color/Color.vue";
import axios from "axios";
import { VBtn } from "vuetify/lib";
import ImageUpload from "../../../../UI/ImageUpload";
import SubmitButton from '../../../../UI/SubmitButton';
import { store } from '../../../../../data/logodesign';

export default {
  mounted() {
    console.log("Just mounted on Info page", this.$store.state);
    if (this.$store.state.logodesign.form !== null) {
      this.info.form = { ...this.$store.state.logodesign.form };
    }
    // window.images = [];
    if(this.$store.state.logodesign.style !== null) {
        this.info.styles = {...this.$store.state.logodesign.style};
        console.log('Inside mounted of Info', this.info.styles);
    }
    if(this.$store.state.logodesign.color !== null) {
        console.log('Color not null', this.$store.state.logodesign.color);
        this.info.color = [...this.$store.state.logodesign.color];
    }
  },
  components: {
    Form,
    Styles,
    Color,
    VBtn,
    ImageUpload,
    SubmitButton
  },
  updated() {
    //console.log(this.info);
  },
  methods: {
    assignForm() {
      return this.$store.state.logodesign.form === null
        ? this.info.form
        : this.$store.state.logodesign.form;
    },
    updateForm(form) {
      console.log("Form update in Info", form);
      this.info.form = { ...form };
      // this.updateDisabledButtonStatus();
    },
    assignStyles() {
      return this.$store.state.logodesign.style === null
        ? this.info.styles
        : this.$store.state.logodesign.style;
    },
    updateStyles(styles) {
      console.log("Style Update in Info", styles);
      this.info.styles = { ...styles };
    },
    assignColor() {
      return this.$store.state.logodesign.color === null
        ? this.info.color
        : this.$store.state.logodesign.color;
    },
    updateColors(colors) {
      this.info.color = [...colors];
      // this.updateDisabledButtonStatus();
    },
    updateFileUrls(urls) {
      // console.log('Inside Info, these are the URLs', urls);
      // console.log('Number of images', urls.length);
      // console.log('First URL', urls[0]);
    },
    getInfo() {
      console.log(this.info);
    },
    updateDisabledButtonStatus() {
      let colorsCondition = false;
      let formCondition = true;
      if(this.info.color.length > 0) {
        colorsCondition = true;
      }
      for(var key in this.info.form) {
        if(this.info.form[key] === '') {
          formCondition = false;
        }
      }
      if(colorsCondition && formCondition) {
        this.isButtonDisabled = false;
      }
      else {
        this.isButtonDisabled = true;
      }
    },
    isButtonDisabled() {
      return this.info.color.length < 1;
    },
    submitButtonClicked(event) {
      event.preventDefault();
      console.log("button clicked and User logged in");
      let files_to_store = [];

      console.log("Window.files", window.files);

      const payload = {
        form: { ...this.info.form },
        style: { ...this.info.styles },
        color: [...this.info.color],
        files: window.files
      };
      console.log("Payload", payload);
      this.$store.dispatch("logodesign/setInfo", payload);
      console.log("Final state", this.$store.state.logodesign);
      console.log('Is LogoDesign Valid', this.$store.getters['logodesign/isValid']);

      const dataToBeSent = {
        user_id: this.$store.state.user_id,
        branding: this.$store.state.logodesign.branding,
        package: this.$store.state.logodesign.package,
        logotype: [...this.$store.state.logodesign.logotype],
        font: this.$store.state.logodesign.font,
        style: {...this.$store.state.logodesign.style},
        color: [...this.$store.state.logodesign.color],
        brand_name: this.$store.state.logodesign.form.brand,
        tagline: this.$store.state.logodesign.form.tagline,
        business_field: this.$store.state.logodesign.form.business_field,
        subject: this.$store.state.logodesign.form.subject,
        description: this.$store.state.logodesign.form.description
      }
      console.log('DataToBeSent', dataToBeSent);
      axios.post('http://hawiya.net/api/orders/logo-design', dataToBeSent)
      .then(res => console.log('Response', res.data))
      .catch(error => console.log(error.response));
      //window.location.href = "/confirm-order";

      //   if (this.$store.state.user_id === -2) {
      //     window.location.href = "/register?redirect=logotype";
      //     //alert('Redirect to Login');
      //   } else {
      //     alert("HTTP Packet sent");

      //     const dataToBeSent = {
      //       user_id: this.$store.state.user_id,
      //       package: this.$store.state.logodesign.package,
      //       logotype: [...this.$store.state.logodesign.logotype],
      //       style: { ...this.$store.state.logodesign.style },
      //       color: [...this.$store.state.logodesign.color],
      //       brand_name: this.$store.state.logodesign.form.brand,
      //       tagline: this.$store.state.logodesign.form.tagline,
      //       business_field: this.$store.state.logodesign.form.business_field,
      //       description: this.$store.state.logodesign.form.description
      //     };
      //     var bodyFormData = new FormData();
      //     console.log("window.images", window.images);

      //     // if(window.images.length > 0) {
      //     //     Array.from(window.images).forEach(file => {
      //     //         bodyFormData.append('files[]', file);

      //     //     });
      //     // }
      //     // bodyFormData.set("user_id", dataToBeSent["user_id"]);
      //     // bodyFormData.set('package', dataToBeSent.package);
      //     // bodyFormData.set('logotype', dataToBeSent.logotype);
      //     // bodyFormData.set('style', dataTobeSent.style);
      //     // bodyFormData.set('color', dataToBeSent.color);
      //     // bodyFormData.set('brand_name', dataToBeSent.brand_name);
      //     // bodyFormData.set('tagline', dataToBeSent.tagline);
      //     // bodyFormData.set('business_field', dataToBeSent.business_field);
      //     // bodyFormData.set('description', dataToBeSent.description);
      //     console.log("bodyFormData", bodyFormData);

      //     //    for(var key of bodyFormData.entries()) {
      //     //        console.log(key[0], " ", key[1]);
      //     //     }

      //     console.log("Data to be sent", dataToBeSent);
      //     //console.log('BodyFormData',bodyFormData);
      //     axios
      //       .post("http://hawiya.net/api/orders/logo-design", bodyFormData, {
      //         headers: {
      //           "Content-Type": "multipart/form-data"
      //         }
      //       })
      //       .then(res => {
      //         console.log("res.data", res.data);
      //         let order_id = res.data;

      //         if (order_id > 0) {
      //           console.log("worked");
      //           // this.$store.dispatch('logodesign/setOrderId');
      //           //window.location.href = '/payment';
      //         } else {
      //           alert("Could not register the order.");
      //         }
      //         console.log("Finalized State", this.$store.state);
      //       })
      //       .catch(error => console.log(error.response));

      //     // console.log(localStorage);
      //     // console.log(sessionStorage);

      //   }
    }
  },
  data() {
    return {
      info: {
        color: [],
        styles: store.styles,
        form: store.form
      }
    }
  },
};
</script>

<style scoped>
  #cover {
    padding-bottom: 30px;
    font-family: "LatoRegular", sans-serif;
  }

  #section1 {
    height: 50%;

    /* border-right: 1px solid lightgray; */
  }

  #section2 {
    height: 50%;

    /* border-right: 1px solid lightgray; */
  }

  #section3 {
    height: 100%;
  }

  .floatRight {
    float: right;
  }
</style>
