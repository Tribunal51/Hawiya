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
        padding-left: 30%;
        padding-top: 5px;
        padding-right: 30%;
        padding-bottom: 40px;
        font-size: 1.3rem;
        /* background-color: green; */
    }

    .home {
        padding-top: 2px;
        padding-bottom: 10px;
        font-size: 1.3rem;
        /* background-color: red; */

    }

        html[dir="ltr"] .home {
            padding-left: 60%;
            padding-right: 0%;
        }

        

        html[dir="rtl"] .home {
            padding-left: 0%;
            padding-right: 60%;
        }


    @media(max-width: 349px) {
        .introSections, .home {
            padding-left: 5px !important;
            padding-right: 5px !important;
            font-size: 0.8rem;
        }
    }

    @media(min-width: 350px) and (max-width: 800px) {
        .introSections, .home {
            width: 100%;
            padding-left: 20px !important;
            padding-right: 20px !important;
            

            font-size: 0.8rem;
        }
    }

    @media (min-width: 801px) and (max-width: 1000px) {
        .introSections, .home {
            width: 100%;
            padding-left: 100px !important;
            padding-right: 100px !important;

            font-size: 0.8rem;

        }
    }

    @media (min-width: 1001px) and (max-width: 2200px) {
        .introSections {
            width: 100%;
            padding-left: 15% !important;
            padding-right: 15% !important;
            
            font-size: 0.85rem;
        }

        .home {
            width: 100%;
            font-size: 0.85rem;
        }

        html[dir="ltr"] .home {
            padding-left: 30% !important;
            padding-right: 0% !important;
        }

        html[dir="rtl"] .home {
            padding-left: 0% !important;
            padding-right: 30% !important;
        }

    }



    /* RTL LTR */

    






    

</style>
