<template>
    <div id="cover">
        <IntroSection>
            
            <SecondaryNavbar 
                :navStyle="navStyle"
                :navItemStyle="navItemStyle"
                :hamburger="hamburger"
                :displayNavbar="displayNavbarHandler()"
            />

            <router-view />
            
           
            
        </IntroSection>
    </div>
</template>

<script>
import SecondaryNavbar from '../../UI/SecondaryNavbar.vue';
import IntroSection from '../../UI/IntroSection.vue';
export default {
    components: {
        SecondaryNavbar,
        IntroSection
    },  
    data() {
        return {
            navStyle: {
                backgroundColor: 'white !important',
                borderTop: 'none',
                borderBottom: '3px solid #FFDB00',
                display: 'flex',
                justifyContent: 'flex-start',
                opacity: '1'          
            },
            navItemStyle: {
                color: 'gray',
                fontSize: '1.2rem',
                fontFamily: 'LatoRegular, sans-serif'
            },
            hamburger: { 
                color: 'white',
                backgroundColor: 'gray',
                opacity: 1
            },
            navbarWhiteList: [
                "logopackage",
                "brandingpackage",
                "socialmediapackage",
                "stationeryitems",
                "packagingproducts",
                "promotionalinfo"
            ]
        }
    },
    methods: {
        displayNavbarHandler() {
            return this.navbarWhiteList.find(name => name === this.$route.name);
            // return true;
            // console.log('displayNavbarHandler', this.$route, this.$router);
        }
    },
    mounted() {
        // if(this.$store.state.verified <= 0 && this.$store.state.user_id > 0 ) {
        //     window.location.href="/home";
        // }
        
        
    }
}
</script>

<style scoped>
    #cover {
        background-color: white;
    }

</style>
