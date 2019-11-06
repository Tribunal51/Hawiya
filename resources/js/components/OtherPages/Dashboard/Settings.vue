<i18n>
    {
        "en": {
            "title": "Settings"
        },
        "ar": {
            "title": "الإعدادات"
        }
    }
</i18n>

<template>
    <div class="Cover">
        <h5>{{ $t('title') }}</h5>
        <div class="list-group-section">
            <div class="list-group">
                <button @click="buttonClicked(setting.link)" class="list-group-item listButton" v-for="setting in settings" :key="setting.id">{{ setting.title[$root.$i18n.locale] }}</button>
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
                    title: {
                        en: 'Update User Information',
                        ar: 'تحديث معلومات المستخدم'
                    },
                    icon: '',
                    link: 'updateUserInfo'
                },
                {   
                    id: 2,
                    title: {
                        en: 'Update Password',
                        ar: 'تطوير كلمة السر'
                    },
                    icon: '',
                    link: 'updateUserPassword'
                },
                {
                    id: 3,
                    title: {
                        en: 'Support / Register an Issue',
                        ar: 'الدعم / تسجيل مشكلة'
                    },
                    icon: '',
                    link: 'userSupport'
                },
                {
                    id: 4,
                    title: {
                        en: 'Frequently Asked Questions',
                        ar: 'أسئلة مكررة'
                    },
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
        font-size: 1rem;
        font-weight: 300;
    }

        html[dir="ltr"] .listButton {
            text-align: left;
        }

        html[dir="rtl"] .listButton {
            text-align: right;
        }
</style>