<i18n>
	{
		"en": {
        
        },
        "ar": {
            
        }
	}
</i18n>

<template>
  <div class="card clickableCard wrapper" 
	@click="redirectToProfile(item)" 
	@mouseenter="displayOrNot(item, 'enter')" 
	@mouseleave="displayOrNot(item, 'leave')">
    <div class="text-center">
		<template>
			<img class="cardCoverImage" :src="imageToDisplay(item)" alt="Card image cap">
			<!-- <span :class="`badge status badge-${tags[item.category]}`">{{ item.category }}</span> -->
		</template>
      

		<div class="wrapperContent">
				<h2 class="wrapperHeader"> {{ item.title }}</h2>
				<h6 class="wrapperSubtitle">{{ $root.$t(item.category) }}</h6>
		</div>
    <div>
        <!-- <span v-for="(group, index) in item.order_type" :key="index" :class="`badge badge-${tags[group]}`">{{ group }}</span>				 -->
  </div>
</div>
</div>
</template>

<script>
export default {
	mounted() {
		console.log('[item.uploads]', this.item.uploads);
	},
	data() {
		return {
			// list of tags to giving each stack a different color
			tags: {
				language: 'light',
				framework: 'dark',
				frontend: 'success',
				backend: 'danger',
				mobile: 'warning',
				web: 'secondary',
				hybrid: 'info',
				database: 'danger',
				logodesign: 'warning',
				"Logo Design": 'dark',
				"Social Media": 'success',
				"Branding": 'warning',
				"Website": 'danger',
				"Stationary": 'secondary'
			},
			imageStyle: {},
			displayImage: true
		};
	},
	filters: {
		// this filter will can be used to capitalise words
		capitalize: item => {
			return item.toUpperCase();
		}
	},
	props: {
		// this component expects a prop of type object
		item: {
			type: Object,
			required: true
		},
		orders: {
			type: Array,
			required: true
		}
	},
	methods: {
		imageToDisplay(item) {
			if(item.uploads.length <= 0) {
				return null;
			}
			else {
				//let url = "/storage/uploads/";
				let url = item.uploads[0];
				return url;
			}
		},
		displayOrNot(item, status) {
			if(status === 'enter') {
				this.displayImage = false;
			} 
			if(status === 'leave') {
				this.displayImage = true;
			}
		},
		redirectToProfile(item) {
			console.log('Redirect to Profile', item);

			this.$router.push({
				name: 'profile',
				params: {
					item: {...item},
					orders: [...this.orders]
				}
			});			
		}
	}
};
</script>

<style scoped>
	.card {
		/* width: 33.33333%; */
		/* max-width: 500px; */
		/* min-width: 200px; */
		/* height: 300px; */
		/* min-width: 300px;
		min-height: 300px; */
		width: 25%;
		height: auto;
		min-width: 300px;
		min-height: 300px;
		position: relative;
		
	}

	@media (max-width: 500px) {
		.card {
			width: 100%;
		}
	}

	.clickableCard {
		cursor: pointer;
		
	}

	.clickableCard:hover {
		background-color: black;
		opacity: 0.7;
	}

	

	.text-center {
		width: 100%;
		height: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
		/* background-color: red; */
	}	

	.text-center:hover .cardCoverImage{
		opacity: 0.3;
	}


	.wrapperContent {
		opacity: 0;
		position: absolute;
		/* padding: 2px 0px; */
		color: #FFDB00;
		background:transparent;
		text-decoration: none;
		text-align: center;
		transition: opacity 500ms;
		-webkit-transition: opacity 500ms;
    	-moz-transition: opacity 500ms;
    	-o-transition: opacity 500ms;
		
	}

	.wrapper:hover .wrapperContent {
		opacity: 1;
	}

	.wrapperHeader {		
		font-weight: 900;
		font-size: 2rem;
	}

	.wrapperSubtitle {
		font-weight: 100;
		font-size: 1rem;
		font-style: italic;
	}

	.cardCoverImage {
		
		height: 100%;
		width: 100%;
		max-width: 100%;
		-webkit-filter: grayscale(100%);
		filter: grayscale(100%);

	}


	

	
	
	
	

	

</style>

