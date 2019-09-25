<i18n>
    {
        "en": {
            "Project Category": "Project Category",
            "Project Details": "Project Details",
            "Previous": "< Previous",
            "Next": "Next >"
        },
        "ar": {
            "Project Category": "فئة المشروع",
            "Project Details": "تفاصيل المشروع",
            "Previous": "<السابق",
            "Next": "التالي>"
        }
    }
</i18n>

<template>
    <div class="Cover" v-if="currentItem">
        <div class="CoverImageSection">
            <img class="CoverImage" :src="currentItem.uploads[0]" :alt="currentItem.title" />
        </div>
        <IntroSection>
            <div class="row mt-4">
                <div class="col-md-5">
                    <BlackBox>
                        <strong><h3 class="bold">{{ currentItem.title }}</h3></strong>
                    </BlackBox>
                    <BlackBox />
                    <div class="row">
                        <div class="col-md">
                            <div class="row">
                                <div class="col">
                                    <strong><h5 class="bold">{{ $t('Project Category') }} </h5></strong>
                                </div>
                            </div>
                            <div class="row mb-3 thin">
                                <div class="col">
                                    {{ $root.$t(currentItem.category) }} 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <strong><h5 class="bold">{{ $t('Project Details') }}</h5></strong>
                                </div>
                            </div>
                            <div class="row thin">
                                <div class="col">
                                    {{ currentItem.details }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 flex-container-wrap-column">
                    <img 
                    class="ProfileImage" 
                    v-for="image in currentItem.uploads" 
                    :key="image" 
                    :src="image"
                    alt="No Image found" />
                </div>
            </div>    
            <div class="row container">
                <div class="col-md-3"></div>
                <div class="col-md-3 nextItemSection">
                    <div v-if="prevItem" @click="nextProfile(prevItem)">
                        <h3 class="bold">{{ $t('Previous') }}</h3><br />
                        {{ prevItem.title }} | {{ $root.$t(prevItem.category) }}
                    </div>  
                </div>  
                <div class="col-md-3 nextItemSection">                      
                    <div v-if="nextItem" @click="nextProfile(nextItem)">
                        <h3 class="bold">{{ $t('Next') }}</h3><br />
                        {{ nextItem.title }} | {{ $root.$t(nextItem.category) }}
                    </div>              
                </div>
                <div class="col-md-3"></div>
            </div>   
        </IntroSection>
        
        
    </div>
</template>

<script>
import IntroSection from '../../UI/IntroSection';
import BlackBox from '../../UI/BlackBox';

export default {
    components: {
        IntroSection,
        BlackBox
    },
    props: [
        "item",
        "orders"
    ],
    data() {
        return {
            currentItem: null,
            nextItem: null,
            prevItem: null
        }
    },
    computed: {
        // nextItem() {            
        //     if(this.orders) {               
        //         return this.orders.find(order => order.id === (this.item.id + 1));            
        //     } 
        //     else {
        //         return null;
        //     }           
        // }
    },
    mounted() {
        console.log('Props',this.item, this.nextItem);
        if(!this.item) {
            this.$router.push('/');
        } else {
            this.currentItem = this.item;
            this.setPrevNextItems();
            

        }
    },
    methods: {
        nextProfile(nextItem) {
            console.log('nextProfile clicked');
            this.currentItem = {...nextItem};
            this.setPrevNextItems();
            // this.$router.go({
            //     name: 'profile',
            //     params: {
            //         item: nextItem,
            //         orders: this.orders
            //     }
            // });
        },
        setPrevNextItems() {
            if(this.orders && this.orders.length > 0) {
                let index = this.orders.findIndex(order => this.currentItem.id === order.id);

                if(index !== this.orders.length - 1) {
                    this.nextItem = this.orders[index + 1];
                    //this.nextItem = this.orders.find(order => order.id === this.currentItem.id + 1);
                } else {
                    this.nextItem = null;
                }

                if(index === 0) {
                    this.prevItem = null;
                }
                else {
                    this.prevItem = this.orders[index-1];
                }

                // if(this.currentItem.id === 0) {
                //     this.prevItem = null;
                // }
                // else {
                //     this.prevItem = this.orders.find(order => order.id === this.currentItem.id - 1);
                // }
            }
            else {
                this.currentItem = null;
                this.nextItem = null;
                this.prevItem = null;
            }
            // if(this.orders && this.orders.indexOf(this.currentItem) !== this.orders.length - 1) {
            //     this.nextItem = this.orders.find(order => order.id === this.currentItem.id + 1);
            // } else {
            //     this.nextItem = null;
            // }
        },
        
    },
    watch: {
       
    }
    
}
</script>

<style scoped>
    .Cover {
        font-family: 'LatoRegular', sans-serif;
        height: 100%;
        position: relative;
    }

    .bold {
        font-family: 'LatoBold', sans-serif;
    }

    
    
    .CoverImageSection {
        width: 100%;
        min-height: 10vh;
    }

    .CoverImage {
        width: 100%;
        height: auto;
        max-height: 80vh;
    }

    .flex-container-wrap-column {
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
    }

    .ProfileImage {
        width: 100%;
        height: auto;
        margin-bottom: 5px;
    }

    .nextItemSection {
        cursor: pointer;
    }
</style>
