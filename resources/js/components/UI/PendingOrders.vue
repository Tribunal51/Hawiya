<template>
    <div v-if="orders.length > 0">
        <h5>Pending Orders</h5>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Category</th> 
                    <th>Price</th> 
                    <th>Payment Link</th>
                </tr>
            </thead>
            <tr v-for="order in orders" :key="order.type">
                <td>{{ order.type }}</td> 
                <td>{{ order.info.price }} </td>
                <td>Link to payment</td>
            </tr>
        </table>
    </div>
    
</template>

<script>
export default {
    data() {
        return {
            order_types: ["logodesign", "branding", "stationery", "packaging", "socialmedia", "promotional"],
            orders_test: []
        }
    },
    computed: {
        orders() {
            let temp = [];
            this.order_types.forEach(type => {
                if(this.$store.state[type].price !== null) {
                    temp.push({
                        type: type, 
                        info: this.$store.state[type]
                    });
                }
            });
            return temp;
        }
    },
    mounted() {
        //this.calculatePendingOrders();
    },
    methods: {
        calculatePendingOrders() {
            let temp = [];
            this.order_types.forEach(type => {
                if(this.$store.state[type].price !== null) {
                    temp.push({
                        type: type, 
                        order: this.$store.state[type]
                    });
                }
            });
            this.orders = temp;
            }
    }
    
}
</script>

<style scoped>

</style>