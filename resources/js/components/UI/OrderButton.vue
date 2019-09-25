<i18n>
    {
        "en": {
            "ORDER": "ORDER"
        },
        "ar": {
            "ORDER": "طلب"
        }
    }
</i18n>

<template>
    <button 
        class="btn btn-outline-dark orderButton"
        @click="buttonClicked"
        >{{ $t('ORDER')}}</button>
</template>

<script>
export default {
    props: [
        "buttonClicked"
    ]
}
</script>

<style scoped> 
    .orderButton {
        width: 100px;
        border-radius: 20px 20px 20px 20px;
        border: 1px solid black ;
        font-family: 'LatoBold', sans-serif;
        font-size: 1.1rem;
        padding-top: 2px;
        padding-bottom: 2px;
        padding-left: 10px;
        padding-right: 10px;
    
    }

</style>
