<template>
    <div class="introSections">
        <slot></slot>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
    .introSections {
        padding-left: 33%;
        padding-top: 5px;
        padding-right: 27%;
        padding-bottom: 40px;
        font-size: 1.3rem;


    }

    @media(max-width: 800px) {
        .introSections {
            width: 100% !important;
            padding-left: 20px;
            padding-right: 20px;
            

            font-size: 0.8rem;
        }
    }

    @media (min-width: 801px) and (max-width: 1000px) {
        .introSections {
            width: 100% !important;
            padding-left: 100px !important;
            padding-right: 100px !important;

            font-size: 0.8rem;

        }
    }

    @media (min-width: 1001px) and (max-width: 2200px) {
        .introSections {
            width: 100% !important;
            padding-left: 17% !important;
            padding-right: 10% !important;
            
            font-size: 0.85rem;
        }

    }

</style>
