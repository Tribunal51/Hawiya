<template>
    <div id="cover">
        
        <div id="info">
            This is some test aligned to the right.
        </div>
        <div class="row">
            <div v-for="(value, key) in options" :key="key" class="col-md"> 
                <router-link class="option" tag="div" :to="value">{{ key }}</router-link>
            </div>
            
            <!-- <div class="col-md"><router-link class="option" to="/logo">Logo Design</router-link></div>
            <div class="col-md"><router-link class="option" to="/branding">Branding</router-link></div>
            <div class="col-md"><router-link class="option" to="/social-media">Social Media</router-link></div>
            <div class="col-md"><router-link class="option" to="/stationary">Stationary</router-link></div>
            <div class="col-md"><router-link class="option" to="/packaging">Packaging</router-link></div>
            <div class="col-md"><router-link class="option" to="/website">Website</router-link></div> -->
            
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            options: {
                'Logo Design': '/design/logo-design/package',
                'Branding': '/branding',
                'Social Media': '/social-media',
                "Stationary": '/stationary',
                "Packaging": '/packaging',
                'Website': '/website',
                'More': '/more'
            }
        }
    }
}
</script>

<style scoped>

    #cover { 
        width: 100%;
        height: 100%;       
        background-size: cover;
        background: url('/storage/Carousel.png') no-repeat;
        background-size: 100%;
    }

    #info {
        height: 85%;
        width: 100%;
        text-align: right;
    }

    #subnav {
        
        width: 100%;
        background-color: red;
        justify-content: space-around;
        text-align: center;
    }

    .option {
        
        text-align: center;
        color: yellow;
        text-decoration: none;
        cursor: pointer;
    }

</style>
