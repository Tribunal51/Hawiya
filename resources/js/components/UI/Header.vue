<i18n>
    {
        "en": {
            
        },
        "ar": {

        }
    }
</i18n>

<template>
    <div class="Cover">
        <BlackBox />
        
        <div class="row">
            <div class="col headerSection">
                <h2> {{ $root.$t(this.title) }} </h2>
            </div>
        </div>

        <div v-if="packageText" class="row">
            <div class="col">
                <strong>{{ $root.$t(packageText) + packageSuffix[$root.$i18n.locale] }}</strong>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <strong> {{ this.text }} </strong>
            </div>
        </div>
        
        <BlackBox />
    </div> 
</template>

<script>
import BlackBox from './BlackBox';

export default {
    components: {
        BlackBox
    },
    props: [
        "title",
        "text",
        "bottomblackbox",
        "packageText"
    ],
    mounted() {
        console.log('Header Component', this.title, this.text);
    },
    data() {
        return {
            packageSuffix: {
                en: " / Package",
                ar: " / صفقة"
            }
        }
    },
    methods: {
        renderPackage() {
            console.log(this.$i18n.messages[this.$root.$i18n.locale]);
            return this.$i18n.messages[this.$root.$i18n.locale][this.packageText] + this.packageSuffix[this.$root.$i18n.locale];
        }
    }
}
</script>

<style scoped>
    .headerSection {
        font-family: 'LatoBold', sans-serif;
    }
</style>
