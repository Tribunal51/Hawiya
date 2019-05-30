<template>
  <div id="cover">
    <nav class="navbar-expand-xl custom-background">
        <div class="container">
            <!-- <ul class="navbar-nav py-1 mx-auto">
                <li v-for="(link,key) in navLinks" class="nav-item navLink px-4" :key="key">
                    <button :style="isNavButtonSelected(link.selected)" @click="updateCheckedLinks(key)">{{ link.name }}</button>
                </li>
            </ul> -->
            <ul class="navbar-nav py-1 mx-auto">
                <li v-for="navLink in navLinks" class="nav-item navLink px-4" :key="navLink.type">
                    <button :style="isNavButtonSelected(navLink.type, navLink.selected)" @click="updateCheckedLinks(navLink)">{{ navLink.name }}</button>
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
        
            <div class="d-flex flex-wrap">
                <!-- d-flex flex-wrap classes -->
            <!-- iterate data -->
                
                <ItemCard v-for="(item, index) in filteredData" :key="index" :item="item"></ItemCard>
            </div>
                    
    </section>
    
  </div>
</template>

<script>
import ItemCard from './ItemCard';
import data from './data';

export default {
	name: 'SearchPage',
	components: {
		ItemCard
	},
	computed: {
		selectedFilters: function() {
			


            return this.checkedLinks;
			
		}
	},
	data() {
		return {
			filteredData: [],
            search: '',
            checkedLinks: [],
            navButtonStyle: {}
		};
	},
	methods: {
		getfilteredData: function() {
			this.filteredData = data;
			let filteredDataByfilters = [];
            
            //console.log('CheckedWords',this.checkedWords);
            //console.log('Selectedfilters', this.selectedFilters);

			// first check if filters where selected
			if (this.selectedFilters.length > 0) {
                filteredDataByfilters = this.filteredData
                .filter(obj => this.selectedFilters
                .every(val => obj.stack.indexOf(val) >= 0));
				this.filteredData = filteredDataByfilters;
            } 
            
            
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
            
            if(selectedLink.type === 'all') {
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
            return isSelected || (type === 'all' && this.checkedLinks.length < 1) ? 
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
		this.getfilteredData();
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


    .custom-background {
        background-color: #FFDB00;
    }
</style>