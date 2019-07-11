<template>
    <div id="cover">
        <input type="checkbox" disabled v-model="filePresent" />
        <input 
            type="file" 
            @change="onFileSelected" 
            :multiple="type === 'multiple'" 
            hidden
            :required="required" 
            :id="labelID"
            novalidate /> 
        <label :for="labelID" class="fileUploadLabel">{{ this.fileLabel }} </label>
        <div v-if="showImage">
            <div v-if="loading">
                Loading...
            </div>
            <div v-else>
                <div v-if="files.length > 0">
                    <img 
                    v-for="image in imageDisplays" 
                    :src="image" 
                    :key="image" 
                    class="display" />
                </div>
            </div>
        </div>       
        
         <!-- <input type="submit" value="Upload" /> -->
         <!-- <button @click="buttonClicked" role="button">Click</button> -->
    </div>
</template>

<script>
export default {    
    data() {
        return {
            selectedFile: null,
            files: [],
            imageDisplays: [],
            dataURLs: [],
            loading: false,
            completed: false,
            filePresent: false,
            fileLabel: 'Upload File',
        }
    },
    props: [
        "type",
        "required",
        "hideImage",
        "label"
    ],
    watch: {
        completed: function(newValue, oldValue) {
            if(newValue) {
                console.log('EMIT files', this.files, this.dataURLs);
                this.$emit('files', this.files);
                this.$emit('dataurls', this.dataURLs);
            }
        },
        files: function(newValue, oldValue) {
            //console.log('files changed watch', newValue, newValue.length);
            
            if(newValue.length > 0) {
                this.filePresent = true;
                this.setFileLabel(newValue);
                //newValue.forEach(file => this.setFileLabel(file.name));
                //let filenames = newValue.map(file => file.name);
                
            } else {
                this.filePresent = false;
                this.setFileLabel(null);
            }
        }
    },
    mounted() {
        this.completed = false;
        this.setFileLabel(null);
    },
    computed: {
        showImage() {
            return !this.hideImage;
        },
        labelID() {
            return Math.random();
        }
    },
    methods: {
        onFileSelected(event) {
            //this.selectedFile = event.target.files[0]; 
            console.log(event);
            if(event.type === 'change' && event.target.files.length < 1) {
                this.filePresent = false;
                this.files = [];
                this.dataURLs = [];
                this.$emit('files', null);
                this.$emit('dataurls', null);
            }
            else {
                let self = this;
                this.files = Array.from(event.target.files);
                console.log(this.files);
                
                Array.from(this.files).forEach((file, index) => {
                    var reader = new FileReader();
                    reader.onloadstart = function(event) {
                        self.completed = false;
                        self.loading = true;
                    }
                    reader.onload = function(event) {
                        // self.imageDisplays.push(event.target.result);
                        // self.dataURLs.push(reader.result);
                        if(this.type === 'multiple') {
                            self.imageDisplays.push(event.target.result);
                            self.dataURLs.push(reader.result);
                        }
                        else {
                            self.imageDisplays[0] = event.target.result;
                            self.dataURLs[0] = reader.result;                         
                        }
                        //console.log(reader.result);
                    }
                    
                    reader.onloadend = function(event) {
                        //console.log('OnLoadEnd Event', event);
                        //console.log('SELF FILES LENGTH', self.files.length, 'INDEX', index);
                        // self.$emit('files', self.files);
                        // self.$emit('dataurls', self.dataURLs);

                        if(index === self.files.length - 1) {
                            self.completed = true;
                        }
                        self.loading = false;
                        
                    }
                    reader.readAsDataURL(file);
                });
                console.log('DataURLS',this.dataURLs);
            }
            
            
            
        },
        setFileLabel(files) {
            this.fileLabel = this.label ? this.label : 'Upload File';
            if(files) {
                    Array.from(files).forEach(file => {
                    this.fileLabel += ' [' + file.name + '] ';
                });
            }
        },
        buttonClicked() {
            event.preventDefault();
            console.log(this.dataURLs);
        },
        dataURLtoBlob(dataurl) {
            console.log('Inside dataURLtoBlob');
            var arr = dataurl.split(',');
            var mime = arr[0].match(/:(.*?);/)[1];
            var bstr = atob(arr[1]);
            var n = bstr.length;
            var u8arr = new Uint8Array(n);
            
            while(n--) {
                u8arr[n] = bstr.charCodeAt(n);
            }
            return new Blob([u8arr], {type:mime});

        },
    }

}
</script>

<style scoped>
    .display {
        width: 100px;
        height: 100px;
    }

    .fileUploadLabel {
        font-size: 1rem;
        padding: 5px;
        margin: 5px;
    }
</style>
