<template>
    <nav 
    class="navbar navbar-expand-md navbar-dark bg-dark" 
    :class="navClass"
    :style="navStyle">
        <button class="navbar-toggler" :style="hamburger" type="button" data-toggle="collapse" data-target="#secondaryNavbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="secondaryNavbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <router-link v-for="link in RouterLinks" 
                :style="navItemStyle"
                tag="li"
                class="nav-link"
                :to="link.path"     
                @click.native="linkClicked(link)"  
                event=""        
                :key="link.name">
                    <span id="link">/{{ link.name }}</span>
                </router-link>
                <!-- <router-link :style="this.stylesList" tag="li" class="nav-link" to="/design/logo-design/package">/Logo Design</router-link>
                <router-link :style="this.stylesList" tag="li" class="nav-link" to="/design/branding">/Branding</router-link>
                <router-link :style="this.stylesList" tag="li" class="nav-link" to="/design/social-media">/Social Media</router-link>
                <router-link :style="this.stylesList" tag="li" class="nav-link" to="/design/stationary">/Stationary</router-link>
                <router-link :style="this.stylesList" tag="li" class="nav-link" to="/design/packaging">/Packaging</router-link>
                <router-link :style="this.stylesList" tag="li" class="nav-link" to="/design/website">/Website</router-link> -->


                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li> -->
            </ul>
        </div>
    </nav>
    
</template>

<script>
import VueRouter from 'vue-router';


export default {
    props: [
        "navItemStyle",
        "navStyle",
        "navClass",
        "activeClass",
        "hamburger"
    ],
    data() {
        return {
            RouterLinks: {
                LogoDesign: {
                    name: "Logo Design",
                    path: "/design/logo-design",
                    //route: "/design/logo-design/package"
                },
                Branding: {
                    name: "Branding",
                    path: "/design/branding",
                    //route: "/design/branding/package"
                },
                SocialMedia: {
                    name: "Social Media",
                    path: "/design/social-media",
                    //route: "/design/social-media/package"
                },
                Stationery: {
                    name: "Stationery",
                    path: "/design/stationery",
                    //route: "/design/stationery/package"
                },
                Packaging: {
                    name: "Packaging",
                    path: "/design/packaging",
                    //route: "/design/packaging/products"
                },
                Promotional: {
                    name: "Promotional",
                    path: "/design/promotional",
                    //route: "/design/promotional"
                }
            },
            // RouterLinks: {
            //     "Logo Design": "/design/logo-design",
            //     "Branding": "/design/branding",
            //     "Social Media": "/design/social-media",
            //     "Stationary":"/design/stationary",
            //     "Packaging":"/design/packaging",
            //     "Website":"/design/website"
            // }
        }
    },
    mounted() {
        //console.log('StylesList',this.stylesList);
        console.log(this.navBackground+' !important');
    },
    methods: {
        linkClicked(link) {
            console.log(link);
            
            this.$store.dispatch('resetAllStates');
            this.$router.push(link.route);
           
        }
    }
}
</script>

<style scoped>

    .nav-link {
        cursor: pointer;
    }
    
   .active, .router-link-exact-active, .router-link-active {
       font-family: 'LatoBold', sans-serif !important;
       color: #FFDB00 !important;
   }

    

</style>
