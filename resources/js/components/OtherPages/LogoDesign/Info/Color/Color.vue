<template>
    <div id="cover">
        <div class="row my-2" v-for="(colorcode,color) in colorListTemp" :key="color">
            <div class="col-sm-2" id="checkboxSection">
                <CheckMark>
                    <input  
                    type="checkbox" 
                    :id="color" 
                    :value="color" 
                    v-model="colors" 
                    :disabled="colors.length >= 3 && colors.indexOf(color) < 0"
                    />
                </CheckMark>                
            </div>

            <div class="col-sm-10 colorSection">
                <div class="row">
                    <div v-for="index in 8" :key="index" class="col-xs shadeSection">
                        <div class="shade" :style="setBackgroundColor(colorcode, index)">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- <div v-for="index in 8" :key="index" class="col-xs">
                <div class="shade" :style="setBackgroundColor(colorcode, index)">
                </div>
            </div> -->
            
            
        </div>
    </div>
</template>

<script>
import CheckMark from './CheckMark.vue';
export default {
    mounted() {
        // console.log(this.colorListTemp);
        this.colors = [...this.color];
        console.log('Color prop in Color.vue', this.color);
        // this.colors = this.$store.state.logodesign.color;
    },
    components: {
        CheckMark
    },
    props: [
        "colorList",
        "color"
    ],
    data() {
        return {
            colorListTemp: this.colorList,
            colors: []
        }
    },
    
    methods: {
        setBackgroundColor(color, index) {
            let setColor = color;
            let opacity = index*0.125;
            //  console.log('Test','backgroundColor:'+setColor+','+'opacity:0');
            return (
                'backgroundColor:'+setColor+';'+
                'opacity:'+opacity
            )
            
            
        }
    },
    watch: {
        colors: function() {
            console.log('Watch', this.colors);
            this.$emit('color', this.colors);
        }
    }

}
</script>

<style scoped>

    #colorRow {
        margin-top: 5px;
        margin-bottom: 5px;
    }
    .shade {
        width: 47px;
        height: 30px;
        border-radius: 35%;
        
    }

    /* .shadeSection {
         width: calc(100% /8);
    } */

    .colorSection {
        /* background-color: red; */
        width: 100%;
    }

    @media (max-width: 768px) {
        .shadeSection {
            width: calc(100% /8);
        }

        .shade {
            width: auto;
        }
    }

    

</style>
