<template>
    <div class="Cover">
        <div class="row mt-2">
            <div class="col-sm">
                <h3>Your Order</h3>
            </div>           
        </div>
        <div class="row" v-for="item in selectedItems" :key="item.name">
            <div class="col-sm-8">
                <h5>{{ item.name }}</h5>
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
        "totalPrice"
    ],
    computed: {
        selectedItems() {
            return this.items;
        },
    }

}
</script>

<style scoped>
    .Cover {
        padding: 20px;
    }
</style>
