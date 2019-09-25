<template>
    <label class="Cover" :for="product.name">       
         
        <!-- <label :style="imageStyle" :for="product.name">          
            <slot name="edit"></slot>                
        </label> -->

        <!-- <div :style="imageStyle">
            <slot name="edit"></slot>
        </div> -->

        <div class="imageSection">
            <slot name="edit"></slot>
            <img :src="product.image" :alt="product.name" class="product-image" />
        </div>


        <!-- <div class="label">
            <slot></slot>  
            <label class="checkBoxLabel labelContainer" :for="product.name">
                <div class="name">{{ product.name }}</div>
                <div class="cost"> ${{ product.cost }}</div>
            </label>
           
        </div> -->


        <slot></slot>
        <div class="checkBoxLabel labelContainer" :for="product.name">           
            <div class="name">{{ product.name }}</div> 
            <div class="cost">${{ product.cost }}</div>
        </div>

        <!-- <div class="label">
            <slot></slot>
            <slot name="label"></slot>
        </div> -->

        <!-- <div class="test">
            <div class="test1"></div>
            <div class="test2"></div>
        </div> -->

        
        
        
    </label>
</template>

<script>
export default {
    props: [
        "product"
    ],
    computed: {
        imageStyle() {
            return {
                'height': '80%',
                'width': '100%',
                'cursor': 'pointer',
                // 'background':'url('+this.product.image+') no-repeat center'
            };
        }
    },
    methods: {

    }

}
</script>

<style scoped>
    .Cover {
        /* width: 200px; */
        /* height: 200px; */
        width: 30vh;
        min-height: 30vh;
        margin: 10px;
        border: 1px solid #FFDB00;
        /* position: relative; */
        display: flex;
        flex-direction: column;
        /* background-color: red; */
    }

    
    
    /* @media (max-width: 400px) {
        .Cover {
            width: 200px;
        }
    }

    @media (min-width: 401px) and (max-width: 600px) {
        .Cover {
            width: 50%;
        }
    }

    @media (min-width: 601px) and (max-width: 800px) {
        .Cover {
            width: 30%;
        }
    }

    @media (min-width: 801px) and (max-width: 1300px) {
        .Cover {
            width: 20%;

        }
    } */

    /* @media (min-width: 1301px) {
        .Cover {
            width: 18%;
            min-height: 10%;
        }
    } */

    .product-image {
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .imageSection {
        height: 30vh;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .label {
        /* min-height: 30px; */
        width: 100%;
        background-color: lightgray;
        /* text-align: center; */
    }
    
    .labelContainer {
        width: 100%;
        display: flex;
        align-items: center;
        /* background-color: red; */
        background-color: lightgray;
    }

    .name {
        
        width: 70%;
    }

    .cost {
        width: 30%;
        font-family: 'LatoBlack', sans-serif;
        font-weight: 800;
        /* background-color: green; */
    }

    .test {
        width: 100%;
        
        background-color: green;
    }

    .test1 {
        height: 200px;

    }

    .test2 {
        
        height: 100px;
        background-color: white;
    }
</style>
