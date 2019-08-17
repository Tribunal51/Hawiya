<template>
    <div class="Cover">
        
        
        <div class="row" v-for="link in links" :key="link.name">
            <button class="btn sideBarButton" @click="buttonClicked(link.link)">{{ link.name }}</button>
            

        </div>
        
        
    </div>
</template>

<script>
export default {
    data() {
        return {
            showSideBar: false,
            links: [
                {
                    name: 'Logo Design',
                    link: '/design/logo-design/package'
                },
                {
                    name: 'Branding',
                    link: '/design/branding/package'
                },
                {
                    name: 'Social Media',
                    link: '/design/social-media/package'
                },
                {
                    name: 'Stationery',
                    link: '/design/stationery/package'
                },
                {
                    name: 'Packaging',
                    link: '/design/packaging/products'
                },
                {
                    name: 'Promotional',
                    link: '/design/promotional'
                }
            ]
        }
    },
    methods: {
        buttonClicked(link) {
            this.$router.push(link);
        }
    }
}
</script>

<style scoped>
    .Cover {
        width: 200px;
        background-color: #FFDB00;
        border-radius: 50px 0 0 50px;
        height: auto;
        display: flex;
        flex-flow: column;
        justify-content: center;
        align-items: center;
        padding-bottom: 10px;
    }

    

    .sideBarButton {
        width: 125px;
        background: transparent;
        border-bottom: 2px solid white;
        border-top: none;
        border-left: none;
        border-right: none;
    }

    .arrowButton {
        position: relative;
        border: none;
        background: transparent;
    }

</style>
