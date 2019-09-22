import Vue from 'vue';
import VueI18n from 'vue-i18n';

Vue.use(VueI18n);
export const i18n = new VueI18n({
    locale: 'en',   // set locale 
    fallbackLocale: 'en',
    messages: {
        en: {
            logodesign: {
                package1: "Fast Track"
            }
        },
        ar: {
            logodesign: {
                package1: "Arabic Fast Track"
            }
        }
    }
});