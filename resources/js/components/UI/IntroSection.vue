<template>
    <div :class="homePage ? 'home' : 'introSections'" :style="styling">
        <slot></slot>
    </div>
</template>

<script>
export default {
    props: [
        "styling",
        "homePage"
    ],
    data() {
        return {
            homePageStyling: {
                paddingLeft: '66%',
                paddingTop: '5px',
                paddingRight: '0%',
                paddingBottom: '5px',
                fontSize: '1.3rem'
            }
        }
    }
}
</script>

<style scoped>
    .introSections {
        padding-left: 33%;
        padding-top: 5px;
        padding-right: 27%;
        padding-bottom: 40px;
        font-size: 1.3rem;
        /* background-color: green; */
    }

    .home {
        padding-left: 66%;
        padding-top: 2px;
        padding-right: 0%;
        padding-bottom: 10px;
        font-size: 1.3rem;
        /* background-color: red; */

    }

    @media(max-width: 349px) {
        .introSections, .home {
            padding-left: 5px;
            padding-right: 5px;
            font-size: 0.8rem;
        }
    }

    @media(min-width: 350px) and (max-width: 800px) {
        .introSections, .home {
            width: 100% !important;
            padding-left: 20px;
            padding-right: 20px;
            

            font-size: 0.8rem;
        }
    }

    @media (min-width: 801px) and (max-width: 1000px) {
        .introSections, .home {
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

        .home {
            width: 100% !important;
            padding-left: 34% !important;
            padding-right: 0% !important;
            font-size: 0.85rem;
        }

    }

</style>
