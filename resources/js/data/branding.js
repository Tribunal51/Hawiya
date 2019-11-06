import Vue from 'vue';
import { i18n } from '../plugins/i18n';

// export const store_temp = Vue.observable({
//     en: {
//         packages: [
//             {
//                 title: 'Brand Binder : A',
//                 package: 'Brand Binder : A',
//                 old_price: 600,
//                 new_price: 400,
//                 header: 'YOU HAVE LOGO AND YOU NEED ONLY BRANDING',
//                 offers: [
//                     "2 Revisions",
//                     "2 Dedicated Designers",
//                     "48hrs Turnaround Time"
//                 ],
//                 comment: "Planner to Design your logo, Story & Strategy"
//             },
//             {
//                 title: 'Personal Branding Package',
//                 package: 'Personal Branding',
//                 old_price: 850,
//                 new_price: 600,
//                 offers: [
//                     "1 Professional Logo",
//                     "2 Revisions",
//                     "2 Dedicated Designers",
//                     "48hrs Turnaround Time"
//                 ],
//                 comment: "Planner to Design your logo, Story & Strategy"
//             },
//             {
//                 title: 'Premium Branding Package',
//                 package: 'Premium Branding',
//                 old_price: 1500,
//                 new_price: 990,
//                 offers: [
//                     "2 Professional Logo",
//                     "2 Revisions",
//                     "2 Dedicated Designers",
//                     "48hrs Turnaround Time"
//                 ],
//                 comment: "Planner to Design your logo Story & Strategy"
//             }
//         ],
//         features: [
//             "LOGO OR WATERMARK",
//             'DIFFERENT LOGO "LOCKUPS"',
//             "KEY COLORS",
//             "ADDITIONAL COLOR PALETTE OPTIONS",
//             "CORPORATE TYPEFACES",
//             "STANDARD TYPOGRAPHIC TREATMENTS",
//             "CONSISTENT STYLE FOR IMAGES",
//             "HAVE A FULL LIBRARY OF GRAPHIC ELEMENTS"
//         ]
//     },
//     ar: {
//         packages: [
//             {
//                 title: 'براند بيندآر: إ',
//                 package: 'Brand Binder : A',
//                 old_price: 600,
//                 new_price: 400,
//                 header: 'YOU HAVE LOGO AND YOU NEED ONLY BRANDING',
//                 offers: [
//                     "2 Revisions",
//                     "2 Dedicated Designers",
//                     "48hrs Turnaround Time"
//                 ],
//                 comment: "Planner to Design your logo, Story & Strategy"
//             },
//             {
//                 title: 'حزمة العلامات التجارية الشخصية',
//                 package: 'Personal Branding',
//                 old_price: 850,
//                 new_price: 600,
//                 offers: [
//                     "1 Professional Logo",
//                     "2 Revisions",
//                     "2 Dedicated Designers",
//                     "48hrs Turnaround Time"
//                 ],
//                 comment: "Planner to Design your logo, Story & Strategy"
//             },
//             {
//                 title: 'باقة العلامات التجارية المميزة',
//                 package: 'Premium Branding',
//                 old_price: 1500,
//                 new_price: 990,
//                 offers: [
//                     "2 Professional Logo",
//                     "2 Revisions",
//                     "2 Dedicated Designers",
//                     "48hrs Turnaround Time"
//                 ],
//                 comment: "Planner to Design your logo Story & Strategy"
//             }
//         ],
//         features: [
//             "شعار أو علامة مائية",
//             'شعار مختلف "الأقفال"',
//             "الألوان الرئيسية",
//             "خيارات لوح الألوان الإضافية",
//             "أنواع الشركات",
//             "المعالجات الطباعية القياسية",
//             "نمط ثابت للصور",
//             "لديك مكتبة كاملة من العناصر الرسومية"
//         ]
//     }
    
// });

export const store = Vue.observable({
    loaded: false,
    packages: [
        {
            title: '',
            old_price: '',
            new_price: '',
            header: 'branding_package1_header',
            offers: [
                "branding_package1_offer1",
                "branding_package1_offer2",
                "branding_package1_offer3"
            ],
            comment: "branding_package1_comment"
        },
        {
            title: '',
            old_price: '',
            new_price: '',
            offers: [
                "branding_package2_offer1",
                "branding_package2_offer2",
                "branding_package2_offer3",
                "branding_package2_offer4"
            ],
            comment: "branding_package2_comment"
        },
        {
            title: '',
            old_price: 1500,
            new_price: 990,
            offers: [
                "branding_package3_offer1",
                "branding_package3_offer2",
                "branding_package3_offer3",
                "branding_package3_offer4"
            ],
            comment: "branding_package3_comment"
        }
    ],
    features: [
        "branding_feature1",
        "branding_feature2",
        "branding_feature3",
        "branding_feature4",
        "branding_feature5",
        "branding_feature6",
        "branding_feature7",
        "branding_feature8"
    ]
})

export async function getPackages() {
    if(!store.loaded) {

        console.log('Inside getPackages');
        let packages = [];
        await axios.get('/api/data/packages/category/2').then(res => {
            packages = [...res.data];
            console.log('Packages fetched', packages);
            packages.forEach((currentPackage, index) => {
                store.packages[index].title = currentPackage.title;
                i18n.messages.en[currentPackage.title] = currentPackage.title;
                i18n.messages.ar[currentPackage.title] = currentPackage.title_ar;
                store.packages[index].old_price = currentPackage.old_price;
                store.packages[index].new_price = currentPackage.new_price;
                i18n.setLocaleMessage('en', { ...i18n.messages.en, [currentPackage.title]: currentPackage.title});
                i18n.setLocaleMessage('ar', { ...i18n.messages.ar, [currentPackage.title]: currentPackage.title_ar});
            });
            console.log('Updated store', store);
            store.loaded = true;
        })
        .catch(error => {
            console.log(error.response);
        });
        
    }
}