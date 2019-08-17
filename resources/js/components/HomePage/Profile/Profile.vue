<template>
    <div id="cover">
        <IntroSection>
            <h2 class="headerPadding">PROFILE</h2>
            
        </IntroSection>
        
        <div class="Sort">
            <SearchPage />
        </div>          
    </div>
</template>

<script>
import SearchPage from './SearchPage.vue';
import IntroSection from '../../UI/IntroSection.vue';
export default {
    data() {
        return {

        }
    },
    components: {
        SearchPage,
        IntroSection
    }
}
</script>

<style scoped>
    #cover {
        font-family: 'LatoRegular', sans-serif;
        background-color: #E9E9E9;
        
    }

    .Sort {
        
        overflow-y: auto;
    }

    .headerPadding {
        padding-top: 10px !important;   
    }


</style>
