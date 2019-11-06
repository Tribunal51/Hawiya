<template>
    <div class="Cover alignLang" v-if="authuser !== -1">
        
        <HeaderPanel :user="user" />
        <slot></slot>
        <IntroSection :styling="highTopPadding">
            <router-view :authuser="authuser" />
        </IntroSection>
        
    </div>
</template>

<script>
import HeaderPanel from './HeaderPanel.vue';
import IntroSection from '../../UI/IntroSection';

export default {
    props: [
        "authuser",
        "verified"
    ],
    data() {
        return {
            user: this.authuser,
            highTopPadding: {
                paddingTop: '100px'
            },           
        }
    },
    components: {
        HeaderPanel,
        IntroSection
    },
    methods: {
        buttonClicked() {
            this.$router.push({
                name: 'dashboardsettings'
            });
        }
    }
}
</script>

<style scoped>
    

    

</style>


