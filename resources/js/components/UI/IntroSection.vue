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
        padding-left: 200px;
        padding-top: 5px;
        padding-right: 200px;
        padding-bottom: 40px;
        /* margin-top: 10px; */
        /* margin-bottom: 20px; */
        
    }

    @media(max-width: 800px) {
        .introSections {
            width: 100% !important;
            padding-left: 20px;
            padding-right: 20px;
            padding-bottom: 40px;

        }
    }

    @media (min-width: 801px) and (max-width: 1000px) {
        .introSections {
            width: 100% !important;
            padding-left: 100px;
            padding-right: 100px;

        }
    }
</style>
