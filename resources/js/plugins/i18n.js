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
            "Promotional": "Promotional"
            
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
            "Promotional": "الترويجية"
            
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


