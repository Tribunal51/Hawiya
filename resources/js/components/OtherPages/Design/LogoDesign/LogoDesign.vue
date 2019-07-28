<template>
    <div id="cover">
        
          
            <!-- <center>
                Package: <strong>{{ this.$store.state.logodesign.package }}</strong> /
                Logotype: <strong>{{ this.$store.state.logodesign.logotype }}</strong>
            </center> -->

            <!-- <BlackBox>
                <h2>Logo Design</h2>
                <template v-slot:packageName>
                    <h4> {{ this.$store.state.logodesign.package }} </h4>
                </template>
            </BlackBox>
            <div class="row">
                <h5>{{ this.$store.state.logodesign.package }} / Package</h5>
            </div> -->

        <BlackBox>
            <div class="row">
                <div class="col headerSection">
                    <h2> {{ this.$store.state.logodesign.branding ? 'Branding' : 'Logo Design' }} </h2> 
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <strong> {{ this.$store.state.logodesign.branding ? this.$store.state.branding.package : this.$store.state.logodesign.package | capitalizeFirstLetter }} / Package </strong>
                </div>
            </div>
        </BlackBox>    
          
        <router-view />
            
    </div>
</template>


<script>
import SecondaryNavbar from '../../../UI/SecondaryNavbar.vue';
import LogoPackage from './LogoPackage/LogoPackage.vue';
import BlackBox from '../../../UI/BlackBox.vue';
import IntroSection from '../../../UI/IntroSection.vue';


export default {
    data() {
        return {
            headerInfo: '',
            packageInfo: ''
        }
    },
    filters: {
        capitalizeFirstLetter: word => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase()
    },
    mounted() {
        if(this.$route.fullPath === '/design/logo-design') {
            this.$router.push({
                name: 'brandingpackage'
            });
        }
        if(this.$store.state.logodesign.branding) {
            headerInfo = "Branding";
            packageInfo = this.$store.state.branding.package;
        }
        else {
            headerInfo = "Logo Design";
            packageInfo = this.$store.state.logodesign.package;
        }
        
    },
    components: {
        SecondaryNavbar,
        LogoPackage,
        BlackBox
    },
    data() {
        return {
           
            
        } 
    },
    methods: {
        
    },
    watch: {
        branding: function(newValue, oldValue) {
            console.log('CHANGED');
            if(newValue) {
                this.title = "Branding: "+this.$store.state.logodesign.package;
            }
            else {
               this.title = "Logo Design"; 
            }
        }
    }
}
</script>

<style scoped>
    #cover {
       font-family: 'LatoRegular', sans-serif;
       width: 100%;
    }

    .headerSection {
        font-family: 'LatoBold', sans-serif;
    }

</style>
