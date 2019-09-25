<i18n>
    {
        "en": {
            "noIdea": "I don't have an idea."
        },
        "ar": {
            "noIdea": ".ليس لدي فكرة"
        }
    }
</i18n>

<template>
    <!-- <div class="Cover">
        <div class="row my-2">
            <div class="col-sm-4 checkmarkSection">
                <CheckMark>
                    <slot></slot>
                </CheckMark>
            </div>
            <label :for="id" class="col-sm-4 noIdeaSection">
                <h4>{{ this. text ? this.text : "I don't have an idea"}}</h4>
            </label>
            <div class="col-sm-4"></div>
        </div>
    </div> -->

    <div class="Cover">
        <div class="checkmarkSection">
            <CheckMark><slot></slot></CheckMark>
        </div>
        <label :for="id" class="noIdeaSection">
            <h4>{{ this.text ? this.text : $t('noIdea')}}</h4> 
        </label>
    </div>
</template>

<script>
import CheckMark from './CheckMark';
export default {
    props: [
        "styling",
        "text",
        "id"
    ],
    components: {
        CheckMark
    },
    data() {
        return {
           
        }
    },
}
</script>

<style scoped>
    .Cover {
        display: flex;
        /* border: 1px solid darkgray; */
        
        /* background-color: gray; */
    }

    .checkmarkSection {
        padding: 10px;
    }

    .noIdeaSection {
        cursor: pointer;
        padding: 10px;
        /* background-color: red; */
    }
</style>