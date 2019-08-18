<template>
    <div id="cover">
        <IntroSection styling="paddingBottom: 20px">
            <BlackBox>
                <h2>PROFILE </h2>
            </BlackBox>
            
        </IntroSection>
        
        <div class="Sort">
            <SearchPage />
        </div>          
    </div>
</template>

<script>
import SearchPage from './SearchPage.vue';
import IntroSection from '../../UI/IntroSection.vue';
import BlackBox from '../../UI/BlackBox';

export default {
    data() {
        return {

        }
    },
    components: {
        BlackBox,
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
