<template>
    <div id="cover">
        <IntroSection>
            <SecondaryNavbar 
                        :navStyle="navStyle"
                        :navItemStyle="navItemStyle"
                        
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
                backgroundColor: 'transparent !important',
                borderTop: 'none',
                borderBottom: '3px solid #FFDB00',
                display: 'flex',
                justifyContent: 'flex-start'
                
            },
            navItemStyle: {
                color: 'gray',
                fontSize: '1.2rem',
                fontFamily: 'LatoRegular, sans-serif'
            },
        }
    }
}
</script>

<style scoped>
    #cover {
        background-color: white;
    }

</style>
