<template>
    <div class="Cover">
        <div class="row mt-2">
            <div class="col-sm">
                <h3>Your Order</h3>
            </div>           
        </div>
        <div class="row" v-for="item in selectedItems" :key="item.title">
            <div class="col-sm-8">
                <h5>{{ $t(item.title) }}</h5>
            </div>
            <div class="col-sm-4">
                <h5>${{ item.price }}</h5>
            </div>
        </div> 
        <div class="row topBottomBorder">
            <div class="col-sm-8">
                <h5>Total:</h5>
            </div>
            <div class="col-sm-4">
                <h5><strong>${{ this.totalPrice }}</strong></h5>
            </div>
        </div> 
    </div>
</template>

<script>
export default {
    props: [
        "items",
    ],
    data() {
        return {
            totalPrice: 0
        }
    },
    computed: {
        selectedItems() {
            return this.items;
        },
    },
    watch: {
        items: function(newValue, oldValue) {
            this.totalPrice = newValue.map(item => item.price).reduce((prev, next) => { return prev + next }, 0);
        }
    }

}
</script>

<style scoped>
    .Cover {
        padding: 20px;
    }
</style>
