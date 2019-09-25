<i18n>
    {
        "en": {
            
        },
        "ar": {
            
        }
    }
</i18n>

<template>
  <div id="cover">
    <div v-if="loading" class="loadingSection">
        <RingLoader color="#FFDB00"></RingLoader>
    </div>
    <nav v-else class="navbar-expand-md custom-background">
        
        <div class="container">
            <ul class="navbar-nav">
                <li v-for="navLink in navLinks" class="nav-item navLink mx-auto my-auto" :key="navLink.type">
                    <button :style="isNavButtonSelected(navLink.type, navLink.selected)" @click="updateCheckedLinks(navLink)">/{{ $root.$t(navLink.name) }}</button>
                </li>
            </ul>
        </div>                        
    </nav>

    <div class="search-wrapper">
			<!-- the search bar form -->
        <!-- <form v-on:submit="getfilteredData">
            <div class="form-row">
            <div class="col-10">
                <input type="text" class="form-control" placeholder="Enter key word  ..." v-model="search" v-on:keyup="getfilteredData">
            </div>

            <div class="col-2">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </div>
            </div>
        </form> -->

        <!-- check boxes -->
        <!-- <div id="checkboxes">
            <div v-for="(stack,index) in stacks" :key="index" class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" :value="stack.value" v-model="checkedWords" v-on:change="getfilteredData">
                <label class="form-check-label">
                    {{ stack.value }}
                </label>
            </div>
        </div> -->
        <!-- end of checkboxes -->
	</div>
	
    
    <section class="list">
        
            <div class="flex-container">
                <!-- d-flex flex-wrap classes -->
            <!-- iterate data -->
                
                <ItemCard 
                    v-for="order in filteredData" 
                    :key="order.id" 
                    :item="order"
                    :orders="orders"
                    ></ItemCard>
            </div>
                    
    </section>
    
  </div>
</template>

<script>
import ItemCard from './ItemCard';
import data from './data';
import axios from 'axios';
import RingLoader from 'vue-spinner/src/RingLoader.vue';

export default {
	name: 'SearchPage',
	components: {
        ItemCard,
        RingLoader
	},
	computed: {
		selectedFilters: function() {
            return this.checkedLinks;
		}
	},
	data() {
		return {
            orders: [],
			filteredData: [],
            search: '',
            checkedLinks: [],
            navLinks: [],
            navButtonStyle: {},
            loading: true
		};
    },
	methods: {
		getfilteredData: function() {
            
            this.filteredData = [...this.orders];
            console.log('Filtered Data before', this.filteredData);
			let filteredDataByfilters = [];
            
            //console.log('CheckedWords',this.checkedWords);
            // console.log('Selectedfilters', this.selectedFilters);

			// first check if filters where selected
			if (this.selectedFilters.length > 0) {
                filteredDataByfilters = this.filteredData
                .filter(obj => this.selectedFilters
                .every(val => obj.category === val));
				this.filteredData = filteredDataByfilters;
            } 
            console.log('Filtered data After', this.filteredData);
            console.log('Selected Filters', this.selectedFilters);
            
            // then filter according to keyword, for now this only affects the name attribute of each data
            let filteredDataBySearch = [];
			if (this.search !== '') {
				filteredDataBySearch = this.filteredData.filter(obj => obj.name.indexOf(this.search.toLowerCase()) >= 0);
				this.filteredData = filteredDataBySearch;
			}
        },
        updateCheckedLinks(selectedLink) {
            // console.log('navLinks', this.navLinks, link);
            let selectedLinkIndex = this.navLinks.findIndex(navLink => navLink.type === selectedLink.type);
            this.navLinks[selectedLinkIndex].selected = true;
        
            for(var index in this.navLinks) {
                if(this.navLinks[index].type !== selectedLink.type) {
                    this.navLinks[index].selected = false;
                }
            }
            
            if(selectedLink.type === 'All') {
                this.checkedLinks = [];
                this.getfilteredData();
            }
            else {
                if(this.checkedLinks.length < 1) {
                    this.checkedLinks.push(selectedLink.type);
                } else {
                    this.checkedLinks[0] = selectedLink.type;
                }
                // console.log('CheckedLink',this.checkedLinks);
                this.getfilteredData();
            }
            this.navButtonStyle['color'] = 'white';          
        },   
        isNavButtonSelected(type, isSelected) {
            return isSelected || (type === 'All' && this.checkedLinks.length < 1) ? 
            {   
                'backgroundColor':'transparent',
                'border':'none',
                'backgroundColor': 'white',
                'color': 'black'
            } :
            {
                'backgroundColor':'transparent',
                'border':'none'
            }
            
        }     
	},
	mounted() {
        
        this.orders = data;
        //axios.get('http://hawiya.net/api/orders/getAllOrders')
        axios.get('/api/profiles')
        .then(res => {           
            this.orders = res.data.slice(0);
            this.getfilteredData();
            
            let uniqueWords = [];
            // uniqueWords.push(orders.filter((x,i,a) => a.indexOf(x) === i).type);
            // console.log('Unique words', uniqueWords);
            
            uniqueWords = [...new Set(this.orders.map(order => order.category))];
            console.log('Unique Words', uniqueWords);
            let navLinks = [];

            // Assigning navLinks dynamically
            navLinks = uniqueWords.map(uniqueWord => {
                return {
                    type: uniqueWord,
                    name: uniqueWord.charAt(0).toUpperCase() + uniqueWord.slice(1),
                    selected: false,
                    
                }
            });
            navLinks.unshift({
                type: 'All',
                name: 'All',
                selected: false
            });

            // Assigning navLinks statically
            // navLinks = [
            //     {
            //         type: 'All',
            //         name: 'All',
            //         selected: false
            //     },
            //     {
            //         type: 'Logo Design',
            //         name: '/Logo Design',
            //         selected: false
            //     },
            //     {
            //         type: 'Branding',
            //         name: '/Branding',
            //         selected: false
            //     }, 
            //     {
            //         type: 'Social Media',
            //         name: '/Social Media',
            //         selected: false
            //     },
            //     {
            //         type: 'Stationery',
            //         name: '/Stationery',
            //         selected: false
            //     }, 
            //     {
            //         type: 'Website',
            //         name: '/Website',
            //         selected: false
            //     }
            // ];
            

            console.log('navLinks', navLinks);
            this.navLinks = navLinks;
            
            
            
            // for(var key in orders[0]) {
            //     console.log('X',key);
            // }




            
            this.loading = false;
            return res.data;

        })
        .catch(error => console.log('Error', error.response));
        
    }
    
};
</script>


<style scoped>

    #cover {
        width: 100% !important;


    }
    .list {
        height: 60vh !important;
        overflow-y: auto;
    }

    .flex-container {
        display: flex;
        flex-flow: row wrap;
    }


    .custom-background {
        background-color: #FFDB00;
    }

    .loadingSection {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        
    }
</style>