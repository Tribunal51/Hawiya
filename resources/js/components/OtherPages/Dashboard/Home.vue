<template>
    <div class="bottomSection">
        <!-- {{ this.authuser }} -->
        <RingLoader :loading="loader.loading" :color="loader.color"></RingLoader>
        
        <IntroSection :styling="highTopPadding">
            <h5>Make New Order</h5>
            <Services :differentPage="true" />
            <hr class="blackLine">
            <h5>My Orders</h5>
            <div class="showMyOrders" @click="showOrders=!showOrders">
                Show my Orders <div class="ordersIcon">{{ this.orders.length }}</div>
            </div>
            <hr class="blackLine">
            <div v-if="showOrders">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Order Number</th>
                            <th>Category</th>
                            <th>Package</th>
                            <th>Created At</th>
                            <th>ETA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="order in orders" :key="order.created_at + order.id">
                            <td>{{ order | modify }}</td>
                            <td>{{ order.type | capitalize}}</td>
                            <td>{{ order.package }}</td>
                            <td>{{ order.created_at }}</td>
                            <td> 10 hours</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </IntroSection>
    </div>
</template>

<script>
import IntroSection from '../../UI/IntroSection';
import Services from '../../UI/Services'; 
import RingLoader from 'vue-spinner/src/RingLoader';

export default {
    props: [
        "authuser",
        "verified"
    ],
    components: {
        IntroSection, 
        Services,
        RingLoader
    },
    data() {
        return {
            user: this.authuser,
            showOrders: false,
            highTopPadding: {
                paddingTop: '100px'
            },
            orders: [],
            loader: {
                loading: true,
                color: '#FFDB00',
                size: '10'
            }
        }
    },
    filters: {
        capitalize: category => category.charAt(0).toUpperCase() + category.slice(1),
        modify: order => order.type.slice(0,2).toUpperCase() + '-' + order.id               
    },
    mounted() {
        console.log('User',this.user.id);
        let data = {
            "user_id": this.user.id
        };
        console.log(data);
        axios.get('http://hawiya.net/api/orders/getUserOrdersSorted/'+this.user.id)
        .then(res => {
            this.orders = res.data;
            console.log(res.data);
        })
        .catch(error => console.log(error.response));
    }

}
</script>

<style scoped>
    .bottomSection {
        min-height: 60vh;
    }

    .blackLine {
        background-color: black;
    }

    .showMyOrders {
        margin-left: 10px;
        margin-top: -5px;
        font-size: 0.75rem;
        color: #FFDB00;
        font-weight: bold;
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    .ordersIcon {
        margin: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        background-color: #FFDB00;
        color: black;
        font-family: 'LatoBold', sans-serif;
    }
</style>