<template>
    <div class="Cover" v-if="authuser !== -1">
        
        <HeaderPanel :user="user" />
        <div class="bottomSection">
            <button @click="buttonClicked()">Click</button>
            <router-view />
            <!-- {{ this.authuser }} -->
            <IntroSection :styling="highTopPadding">
                <h5>Make New Order</h5>
                <Services :differentPage="true" />
                <hr class="blackLine">
                <h5>My Orders</h5>
                <div class="showMyOrders" @click="showOrders=!showOrders">
                    Show my Orders
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
    </div>
</template>

<script>
import HeaderPanel from './HeaderPanel.vue';
import IntroSection from '../../UI/IntroSection';
import Services from '../../UI/Services';

export default {
    props: [
        "authuser",
        "verified"
    ],
    data() {
        return {
            user: this.authuser,
            showOrders: false,
            orders: [],
            highTopPadding: {
                paddingTop: '100px'
            },
            
        }
    },
    components: {
        IntroSection,
        Services,
        HeaderPanel
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
    },
    filters: {
        capitalize: category => category.charAt(0).toUpperCase() + category.slice(1),
        modify: order => order.type.slice(0,2).toUpperCase() + '-' + order.id
        
           
    },
    methods: {
        buttonClicked() {
            this.$router.push('/home/settings');
        }
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
    }

</style>


