<template>
    <div class="Cover">
        <textarea 
            :style="textAreaStyle" 
            :placeholder="placeholder" 
            v-model="text"
            required>
        </textarea>
    </div>
    
</template>

<script>
export default {
    props: [
        "width",
        "height",
        "placeholder"
    ],
    data() {
        return {
            text: ''
        }
    },
    computed: {
        textAreaStyle() {
            return {
                'width': this.width ? this.width : '200px',
                'height': this.height ? this.height: '100px',
                'backgroundColor': '#D3D3D3',
                'border': '1px solid gray',
                'resize': 'none'
            }
        }
    },
    watched: {
        text: function(newValue, oldValue) {
            this.$emit('text', newValue);
        }
    }

}
</script>

<style scoped>
    .Cover {
        margin: 5px;
        padding: 5px;
    }
</style>
