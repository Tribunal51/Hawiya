<template>
    <div class="Cover">
        <IntroSection>
            <div class="row">
                <div class="col-md">
                    <BlackBox />
                    <div class="flex-container">
                        <button 
                            class="btn btn-outline-warning flexItem" 
                            v-for="service in services" 
                            :key="service.name"
                            @click="buttonClicked(service.link)">
                            <strong>{{ service.name }}</strong>
                        </button>
                    </div>
                    
                </div>
                <div class="col-md">
                    <BlackBox>
                        <h5>Interested?</h5>
                    </BlackBox>
                    <div class="row">
                        <h3>Let us build an outstanding brand for you.</h3> 
                        <StartHere />
                    </div>
                </div>
            </div>
        </IntroSection>
    </div>
</template>

<script>
import IntroSection from './IntroSection';
import BlackBox from './BlackBox';
import StartHere from './StartHere';

export default {
    components: {
        IntroSection,
        BlackBox,
        StartHere
    },
    props: [
        "differentPage"
    ],
    data() {
        return {
            services: [
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
            this.$store.dispatch('resetAllStates');
            this.$router.push(link);
            if(this.differentPage) {
               location.reload();
            }
        }
    }
}
</script>

<style scoped>
    .Cover {
        border-top: 5px solid #FFDB00;
        background-color: #E9E9E9;
    }

    .flex-container {
        display: flex;
        /* justify-content: center; */
        flex-wrap: wrap;

    }

    .flexItem {
        /* width: 30%; */
        width: 150px;
        margin: 2px;
        border-radius: 0%;
        border: 2px solid #FFDB00;
        font-family: 'LatoBold', sans-serif;
        color: black;
        font-size: 1.1rem;
    }

    

</style>
