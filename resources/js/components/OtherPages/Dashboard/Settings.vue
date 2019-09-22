<template>
    <div class="Cover">
        <h5>Settings</h5>
        <div class="list-group-section">
            <div class="list-group">
                <button @click="buttonClicked(setting.link)" class="list-group-item listButton" v-for="setting in settings" :key="setting.title">{{ setting.title }}</button>
                <!-- <router-link v-for="setting in settings" :key="setting.title" tag="button" class="list-group-item" :to="setting.link">{{ setting.title }}</router-link> -->
                <!-- <li v-for="setting in settings" :key="setting.title" class="list-group-item">{{ setting.title }}</li> -->
            </div>
        </div>
    </div>
</template>

<script>

export default {
    
    data() {
        return {
            settings: [
                {
                    id: 1,
                    title: 'Update User Information',
                    icon: '',
                    link: 'updateUserInfo'
                },
                {   
                    id: 2,
                    title: 'Update Password',
                    icon: '',
                    link: 'updateUserPassword'
                },
                {
                    id: 2,
                    title: 'Support / Register an Issue',
                    icon: '',
                    link: 'userSupport'
                },
                {
                    id: 3,
                    title: 'Frequently Asked Questions',
                    icon: '',
                    link: ''
                }
            ]
        }
    },
    methods: {
        buttonClicked(link) {
            this.$router.push({
                name: link
            });
        }
    }

}
</script>

<style scoped>
    .list-group-section {
        width: 100%;

    }

    .listButton {
        text-align: left;
        font-size: 1rem;
        font-weight: 300;
    }
</style>