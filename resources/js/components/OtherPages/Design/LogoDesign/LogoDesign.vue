<template>
    <div class="Cover">
        
          
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

        <!-- <BlackBox>
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
        </BlackBox>    -->
        <Header 
            :title="getHeaderInfo('title')"
            :packageText="getHeaderInfo('text')"
        /> 
          
        <router-view />
            
    </div>
</template>


<script>
import SecondaryNavbar from '../../../UI/SecondaryNavbar.vue';
import LogoPackage from './LogoPackage/LogoPackage.vue';
import BlackBox from '../../../UI/BlackBox.vue';
import IntroSection from '../../../UI/IntroSection.vue';
import Header from '../../../UI/Header.vue';

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
                name: 'logopackage'
            });
        }
        
    },
    components: {
        SecondaryNavbar,
        LogoPackage,
        BlackBox,
        Header
    },
    methods: {
        getHeaderInfo(option) {
            if(option === 'title') {
                return this.$store.state.logodesign.branding ? 'Branding' : 'Logo Design';
            }
            if(option === 'text') {
                let packageName = this.$store.state.logodesign.package;
                // if(packageName) {
                //     packageName = this.$options.filters.capitalizeFirstLetter(packageName);
                // }
                if(!packageName) {
                    packageName = '';
                }
                return packageName;
            }
        }
    }
}
</script>

<style scoped>
    .Cover {
       font-family: 'LatoRegular', sans-serif;
       width: 100%;
    }



</style>
