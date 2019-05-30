<template>
  <div class="card p-3">
    <div class="text-center">
      <img class="img-fluid" :src="item.logo" width="100" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">{{ item.name | capitalize }}</h5>
      </div>
      <div>
        <span v-for="(group, index) in item.order_type" :key="index" :class="`badge badge-${tags[group]}`">{{ group }}</span>				
				
      </div>      
    </div>
  </div>
</template>

<script>
export default {
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

