<template>
    <div class="Cover">
        <div class="headerSection">
            <IntroSection :styling="zeroBottomPadding">
                <div class="row">
                    <div class="col-sm-4 hawiyaLogoSection"></div>
                    <div class="col-sm-4 userDetailsSection">
                        <h2 class="bold">{{ user.name }}</h2>
                        <h4 class="gray">{{ user.email }}</h4>
                        <h4 class="gray">Edit Profile</h4>
                    </div>
                    <div class="col-sm-4">

                    </div>
                </div>
            </IntroSection>
        </div>
        <div class="bottomSection">
            <!-- {{ this.authuser }} -->
            <IntroSection :styling="highTopPadding">
                <h5>Make New Order</h5>
                <hr class="blackLine">
                <h5>My Orders</h5>
                <div class="showMyOrders">
                    Show my Orders
                </div>
                <hr class="blackLine">
            </IntroSection>
        </div>
    </div>
</template>

<script>
import IntroSection from '../../UI/IntroSection';

export default {
    props: [
        "authuser",
        "verified"
    ],
    data() {
        return {
            user: this.authuser,
            zeroBottomPadding: {
                paddingBottom: '0px'
            },
            highTopPadding: {
                paddingTop: '100px'
            }
        }
    },
    components: {
        IntroSection
    },
    mounted() {
        console.log(this.authuser);
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
    }

    .bottomSection {
        min-height: 60vh;
    }

    .userDetailsSection {
        color: white;
        text-align: right;
    }

    .bold {
        font-family: 'LatoBold', sans-serif;
    }

    .gray {
        color: gray;
    }

    .blackLine {
        background-color: black;
    }

    .showMyOrders {
        margin-left: 10px;
        margin-top: -15px;
        font-size: 0.75rem;
        color: #FFDB00;
        font-weight: bold;
    }
</style>
