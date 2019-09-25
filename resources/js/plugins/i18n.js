import Vue from 'vue';
import VueI18n from 'vue-i18n';

Vue.use(VueI18n);
export const i18n = new VueI18n({
    locale: 'en',   // set locale 
    fallbackLocale: 'en',
    messages: {
        en: {
            "All": "All",
            "Logo Design": "Logo Design",
            "Branding": "Branding",
            "Stationery": "Stationery",
            "Packaging": "Packaging",
            "Social Media": "Social Media",
            "Website": "Website",
            "Promotional": "Promotional",
            "Fast Track": "Fast Track",
            "Basic": "Basic",
            "Advanced": "Advanced",
            "Brand Binder : A": "Brand Binder: A",
            "Premium Branding": "Premium Branding Package",
            "Personal Branding": "Personal Branding Package",
            numbers: {
                100: '100',
                150: '150',
                200: '200',
                300: '300',
                350: '350',
                400: '400',
                500: '500',
                600: '600',
                850: '850',
                990: '990',
                1500: '1500'
                
            }
        },
        ar: {
            "All": "الكل",
            "Logo Design": "تصميم شعار",
            "Branding": "العلامات التجارية",
            "Stationery": "ادوات مكتبيه",
            "Packaging": "التعبئة والتغليف",
            "Social Media": "وسائل التواصل الاجتماعي",
            "Website": "موقع الكتروني",
            "Promotional": "الترويجية",
            "Fast Track": "فاست تراثك",
            "Basic": "باسيث",
            "Advanced": "ادفانثآد",
            "Brand Binder : A": "براند بيندآر: إ",
            "Premium Branding": "العلامة التجارية المميزة",
            "Personal Branding": "العلامة التجارية الشخصية",
            prices: {
                100: '١٠٠',
                150: '١٥٠',
                200: '٢٠٠',
                300: '٣٠٠',
                350: '٣٥٠',
                400: '٤٠٠',
                500: '٥٠٠',
                600: '٦٠٠',
                850: '٨٥٠',
                990: '٩٩٠',
                1500: '١٥٠٠'
            }
        }
    }
});


