<template>
  <div class="card p-3">
    <div class="text-center">
      <img class="img-fluid" :src="imageToDisplay(item)" :style="displayOrNot(item)" width="100" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">{{ item.title }}</h5>
				<h6 class="card-body">{{ item.category || capitalize }}</h6>
      </div>
      <div>
        <!-- <span v-for="(group, index) in item.order_type" :key="index" :class="`badge badge-${tags[group]}`">{{ group }}</span>				 -->
				<span :class="`badge badge-${tags[item.category]}`">{{ item.category }}</span>
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
			}
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
		}
	},
	methods: {
		imageToDisplay(item) {
			if(item.uploads.length <= 0) {
				return null;
			}
			else {
				let url = "/storage/uploads/";
				let filename = item.uploads[0].filename;
				return (url+filename);
			}
		},
		displayOrNot(item) {
			if(item.uploads.length <= 0) {
				return "display: none";
			}
		}
	}
};
</script>

<style scoped>
	.card {
		width: 33.33333%;
		
	}

	@media (max-width: 500px) {
		.card {
			width: 200px;
		}
	}
	

	

</style>

