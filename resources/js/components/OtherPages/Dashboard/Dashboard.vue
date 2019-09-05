<template>
    <div class="Cover" v-if="authuser !== -1">
        
        <HeaderPanel :user="user" />
        <router-view :authuser="authuser" />
        
    </div>
</template>

<script>
import HeaderPanel from './HeaderPanel.vue';

export default {
    props: [
        "authuser",
        "verified"
    ],
    data() {
        return {
            user: this.authuser,           
        }
    },
    components: {
        HeaderPanel
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


