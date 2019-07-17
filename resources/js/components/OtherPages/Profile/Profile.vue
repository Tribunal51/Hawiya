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
                                <strong><h5 class="bold">Project Category </h5></strong>
                            </div>
                            <div class="row mb-3 thin">
                                {{ currentItem.category }}
                            </div>
                            <div class="row">
                                <strong><h5 class="bold">Project Details</h5></strong>
                                
                            </div>
                            <div class="row thin">
                                {{ currentItem.details }}
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
            <div class="row">
                <div class="col-md-5 nextItemSection" v-if="nextItem" @click="nextProfile(nextItem)">
                    <h3 class="bold">Next</h3><br />
                    {{ nextItem.title }} | {{ nextItem.category }}
                </div>
                <div class="col-md-7"></div>
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
            currentItem: this.item
        }
    },
    computed: {
        nextItem() {
            if(this.orders) {
                return this.orders.find(order => order.id === this.item.id + 1);
            } 
            else {
                return null;
            }
            
        }
    },
    mounted() {
        console.log('Props',this.item, this.nextItem);
        if(!this.item) {
            this.$router.push('/');
        } else {
            //this.currentItem = this.item;
        }
    },
    methods: {
        nextProfile(nextItem) {
            console.log('nextProfile clicked');
            this.currentItem = {...nextItem};
            // this.$router.go({
            //     name: 'profile',
            //     params: {
            //         item: nextItem,
            //         orders: this.orders
            //     }
            // });
        }
    },
    
}
</script>

<style scoped>
    .Cover {
        font-family: 'LatoRegular', sans-serif;
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
