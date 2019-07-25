<template>
    <div class="Cover" v-if="authuser !== -1">
        <div class="headerSection">
            <div class="row">
                <center><slot></slot></center>
            </div>
            <IntroSection :styling="zeroBottomPadding">
                <div class="row">
                    <div class="col-sm-4 hawiyaLogoSection">
                        <img class="hawiyaLogo" src="/storage/icons/yellow-logo.png" />
                    </div>
                    <div class="col-sm-5 userDetailsSection">
                        <h2 class="bold">{{ user.name }}</h2>
                        <h4 class="gray">{{ user.email }}</h4>
                        <h4 class="gray">Edit Profile</h4>
                    </div>
                    <div class="col-sm-3 settingsSection">
                        <img src="/storage/icons/white-settings.png" class="settingsIcon" alt="settingsIcon" />
                    </div>
                </div>
            </IntroSection>
        </div>
        <div class="bottomSection">
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
            zeroBottomPadding: {
                paddingBottom: '0px'
            },
            highTopPadding: {
                paddingTop: '100px'
            },
            
        }
    },
    components: {
        IntroSection,
        Services
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
        
           
    }
}
</script>

<style scoped>
    .headerSection {
        min-height: 40vh;
        background-color: black;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: center;
    }

    .bottomSection {
        min-height: 60vh;
    }

    .userDetailsSection {
        color: white;
        text-align: right;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .hawiyaLogoSection {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: center;
    }

    .hawiyaLogo {
        width: 150px;
        height: 150px;
    }

    @media(min-width: 576px) {
        .hawiyaLogo {
            position: absolute;
            margin-top: 50px;
        }
    }

    .bold {
        font-family: 'LatoBold', sans-serif;
        
    }

    .gray {
        color: gray;
        word-wrap: break-word;
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

    .settingsSection {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .settingsIcon {
        width: 50px;
        height: 50px;
        cursor: pointer;
        padding: 5px;

    }
</style>
