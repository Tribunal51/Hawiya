<template>
    <div class="headerSection">
        <div class="row">
            <div class="col">
                <center><slot></slot></center>
            </div>
        </div>
        <IntroSection :styling="zeroBottomPadding">
            <div class="row">
                <div class="col-sm-4 hawiyaLogoSection">
                    <img class="hawiyaLogo" src="/storage/icons/yellow-logo.png" />
                </div>
                <div class="col-sm-5 userDetailsSection">
                    <h2 class="userDetail bold">{{ user.name }}</h2>
                    <h4 class="userDetail gray">{{ user.email }}</h4>
                    <h4 class="userDetail gray" v-if="user.mobile">{{ user.mobile }}</h4>
                    <h4 class="userDetail gray">Edit Profile</h4>
                </div>
                <div class="col-sm-3 settingsSection">
                    <img src="/storage/icons/white-settings.png" class="settingsIcon" alt="settingsIcon" @click="settingsIconClicked" />
                </div>
            </div>
        </IntroSection>
    </div>

</template>

<script>
import IntroSection from '../../UI/IntroSection';

export default {
    props: [
        "user"
    ],
    components: {
        IntroSection
    },
    data() {
        return {
            zeroBottomPadding: {
                paddingBottom: '0px'
            },
        }
    },
    methods: {
        settingsIconClicked() {
            this.$router.push({
                name: 'dashboardsettings'
            });
        }
    }
}
</script>

<style scoped>
    .headerSection {
        width: 100%;
        min-height: 40vh;
        background-color: black;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: center;
    }

     .bold {
        font-family: 'LatoBold', sans-serif;
        
    }

    .gray {
        color: gray;
        word-wrap: break-word;
    }

    .userDetailsSection {
        color: white;
        text-align: right;
        display: flex;
        flex-flow: column wrap;
        justify-content: flex-end;
        word-break: break-all;
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

     .settingsSection {
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .settingsIcon {
        width: 50px;
        height: 50px;
        cursor: pointer;
        padding: 5px;

    }

    @media (max-width: 576px) {
        .userDetailsSection {
            align-items: center;
            padding-top: 20px;
        }
    }
</style>