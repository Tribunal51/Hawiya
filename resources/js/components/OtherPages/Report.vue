<template>
    <IntroSection>
        Test
        <div class="Cover">
            <div class="row firstRow">
                <div class="col-md-5 reportSection">

                </div>
                <div class="col-md-7 brandInfoSection">

                </div>
            </div>
            <div class="row secondRow">
                <div class="col-md-5 styleSection">

                </div>
                <div class="col-md-7 bottomRightSection">
                    <div class="row">
                        <div class="col-md logotypeSection">

                        </div>
                        <div class="col-md colorSection">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Font
                        </div>
                        <div class="col-md-8 fontSection">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </IntroSection>
    
</template>

<script>
import IntroSection from '../UI/IntroSection';

export default {
    components: {
        IntroSection
    }
}
</script>

<style scoped>

    .reportSection {
        background-color: #FFDB00;
    }

    .brandInfoSection {
        background-color: red;
    }

    .styleSection {
        background-color: green;
    }

    .logotypeSection {
        background-color: blue;
    }

    .colorSection {
        background-color: gray; 
    }

    .fontSection {
        background-color: pink;
    }

</style>
