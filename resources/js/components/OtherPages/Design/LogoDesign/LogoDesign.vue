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
                <h2>{{ this.$store.state.logodesign.branding ? 'Branding: '+this.$store.state.logodesign.package : 'Logo Design' }}</h2>
            </BlackBox>
        
        <router-view />
    </div>
</template>


<script>
import SecondaryNavbar from '../../../UI/SecondaryNavbar.vue';
import LogoPackage from './LogoPackage/LogoPackage.vue';
import BlackBox from '../../../UI/BlackBox.vue';
export default {

    mounted() {
        if(this.$route.fullPath === '/design/logo-design') {
            this.$router.push({
                name: 'brandingpackage'
            });
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
    }

</style>
