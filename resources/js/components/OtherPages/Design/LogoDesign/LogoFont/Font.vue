<i18n>
    {
        "en": {
            "Serif": "Serif",
            "serif_description": "Traditional, have feel.",
            "Sans Serif": "Sans Serif",
            "sans_serif_description": "Modern, \n feel free.",
            "Script": "Script",
            "script_description": "Cursive, \n a bit more decorative.",
            "Display": "Display",
            "display_description": "Decorative, \n good as a design focal point."
            
        },
        "ar": {
            "Serif": "سآريف",
            "serif_description": "التقليدية ، ويشعر.",
            "Sans Serif": "سانس سآريف",
            "sans_serif_description": "الحديث ، لا تتردد.",
            "Script": "سثريبت",
            "script_description": "مخطوطة ، وأكثر قليلا الزخرفية.",
            "Display": "ديسبلاي",
            "display_description": "ديكور ، وحسن كنقطة محورية التصميم."

        }
    }
</i18n> 

<template>
    <div class="Cover" :style="coverStyling">
        <img :src="font.file" :alt="font.name" class="fontImage" :styling="imageStyling" />
        <div class="fontBox" :style="displayYellowLine()">
            <span>{{ $t(font.description) }}</span>
        </div>
    </div>
    
</template>

<script>
export default {
    props: [
        "font",
        "coverStyling",
        "imageStyling",
        "yellowBottomBorder"
    ],
    methods: {
        displayYellowLine() {
            if(this.yellowBottomBorder) {
                return {
                    borderBottom: 'solid #FFDB00 2px'
                }
            }
        }
    },
    filters: {
        breakLine(word) {
            return word.split(',').join(', ');
            // let word = words.join('<br>');
            // return word;
        }
    }

}
</script>

<style scoped>

    .Cover {
        /* max-width: 200px; */
        /* background-color: yellow !important; */
        /* min-height: 150px; */
    }

    .fontImage {
        width: 100%;
        height: 75px;
    }

    .fontBox {
        min-height: 50px;
        /* display: inline-block; */
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: gray;
        /* min-height: 60px; */
        /* border-bottom: solid #FFDB00 2px; */
    }

    .checkBox img:hover {
        transform: scaleX(1);
        transform: scaleY(1);
    }

    :checked + .checkBoxLabel img {
        transform: scale(1);
        box-shadow: 0 0 0 0;
        z-index: 0;
    }
</style>