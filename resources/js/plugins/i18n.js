import Vue from 'vue';
import VueI18n from 'vue-i18n';

Vue.use(VueI18n);
export const i18n = new VueI18n({
    locale: 'en',   // set locale 
    fallbackLocale: 'en',
    messages: {
        en: {
            "loading": "Loading...",
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
                1: '1',
                2: '2',
                3: '3',
                4: '4',
                5: '5',
                6: '6',
                7: '7',
                8: '8',
                9: '9',
                10: '10',
                50: '50',
                100: '100',
                150: '150',
                200: '200',
                250: '250',
                300: '300',
                350: '350',
                400: '400',
                500: '500',
                600: '600',
                800: '800',
                850: '850',
                990: '990',
                1500: '1500'
                
            }
        },
        ar: {
            "loading": "جار التحميل",
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
            numbers: {
                1: '١',
                2: '٢',
                3: '٣',
                4: '٤',
                5: '٥',
                6: '٦',
                7: '٧',
                8: '٨',
                9: '٩',
                10: '١٠',
                50: '٥٠',
                100: '١٠٠',
                150: '١٥٠',
                200: '٢٠٠',
                250: '٢٥٠',
                300: '٣٠٠',
                350: '٣٥٠',
                400: '٤٠٠',
                500: '٥٠٠',
                600: '٦٠٠',
                800: '٨٠٠',
                850: '٨٥٠',
                990: '٩٩٠',
                1500: '١٥٠٠'
            }
        }
    }
});

let dict = {
    0: '٠',
    1: '١',
    2: '٢',
    3: '٣',
    4: '٤',
    5: '٥',
    6: '٦',
    7: '٧',
    8: '٨',
    9: '٩'
}

export const number = (number,self) => {
    console.log('NUMBER', self);
    return self.$root.$i18n.locale === 'ar' ? number.toString().split("").map(digit => dict[digit]).join("") : number;
}

// const convertNumber = number => {
//     let dict = {
//       1: "١",
//       2: "٢",
//       3: "٣",
//       4: "٤",
//       5: "٥",
//       6: "٦",
//       7: "٧",
//       8: "٨",
//       9: "٩"
//     };
//     const newNumber = number
//       .toString()
//       .split("")
//       .map(digit => {
//         return dict[digit];
//       }).join('');
//     return newNumber;
//   };


