<i18n>
    {
        "en": {
            "Make New Order": "Make New Order",
            "My Orders": "My Orders",
            "Show my Orders": "Show my Orders",
            "Order Number": "Order Number",
            "Category": "Category",
            "Package": "Package",
            "Created At": "Created At",
            "ETA": "ETA",
            "error": "Some error has occured"
        },
        "ar": {
            "Make New Order": "جعل النظام الجديد",
            "My Orders" : "طلباتي",
            "Show my Orders": "أظهر طلبي",
            "Order Number": "رقم الطلب",
            "Category": "الفئة",
            "Package": "صفقة",
            "Created At": "أنشئت في",
            "ETA": "الوقت المتبقي",
            "error": "حدث خطأ ما."
        }
    }
</i18n>

<template>
    <div class="bottomSection">
        <!-- {{ this.authuser }} -->

        
        
        <PendingOrders />
        <h5>{{ $t('Make New Order')}}</h5>
        <Services :differentPage="true" />
        <hr class="blackLine">
        <h5>{{ $t('My Orders') }}</h5>
        <RingLoader v-if="loader.loading" :color="loader.color"></RingLoader>
        <div v-else class="showMyOrders" @click="showOrders=!showOrders">
            {{ $t('Show my Orders') }} <div class="ordersIcon">{{ number(this.orders.length, this) }}</div>
        </div>
        <hr class="blackLine">
        <div v-if="showOrders">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>{{ $t('Order Number') }}</th>
                        <th>{{ $t('Category') }}</th>
                        <th>{{ $t('Package') }}</th>
                        <th>{{ $t('Created At') }}</th>
                        <th>{{ $t('ETA') }}</th>
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
        <div class="alert alert-danger" role="alert" v-if="error !== ''">{{ $t('error')}} {{ error }}</div>
        
    </div>
</template>

<script>
import IntroSection from '../../UI/IntroSection';
import Services from '../../UI/Services'; 
import RingLoader from 'vue-spinner/src/RingLoader';
import PendingOrders from '../../UI/PendingOrders';
export default {
    props: [
        "authuser",
        "verified"
    ],
    components: {
        IntroSection, 
        Services,
        RingLoader,
        PendingOrders
    },
    data() {
        return {
            user: this.authuser,
            showOrders: false,
            orders: [],
            loader: {
                loading: true,
                color: '#FFDB00',
                size: '10'
            },
            error: ''
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
        this.loader.loading = true;
        axios.get('api/orders/getUserOrdersSorted/'+this.user.id)
        .then(res => {
            this.loader.loading = false;
            this.orders = res.data;
            console.log('Response', res.data);
        })
        .catch(error => {
            this.loader.loading = false;
            this.error = error.response;
            console.log(error.response);
        });

        console.log('State', this.$store.state);
    },
    methods: {
        getVuexState() {
            console.log(this.$store.state);
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
        margin-top: -5px;
        font-size: 0.75rem;
        color: #FFDB00;
        font-weight: bold;
        cursor: pointer;
        display: flex;
        align-items: center;
    }

        html[dir="ltr"] .showMyOrders {
            margin-left: 10px;
        }

        html[dir="rtl"] .showMyOrders {
            margin-right: 10px;
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