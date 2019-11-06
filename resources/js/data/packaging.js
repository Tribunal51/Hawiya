import Vue from 'vue';
import { i18n } from '../plugins/i18n';

export const store = Vue.observable({
    products: [],
    loaded: false
});

export async function getProducts() {
    if(!store.loaded) {
        console.log('Inside getProducts');
        let products = [];
        await axios.get('/api/data/products/category/5').then(res => {
            products = [...res.data];
            console.log('Products fetched', products);
            products.forEach((currentProduct, index) => {
                store.products.push({
                    id: index,
                    title: currentProduct.title,
                    size: "Small",
                    color: "Natural",
                    image: currentProduct.image,
                    cost: currentProduct.price,
                    multipliers: [
                        {
                            size: "Small",
                            pricePerItem: 10
                        },
                        {
                            size: "Medium",
                            pricePerItem: 20
                        },
                        {
                            size: "Large",
                            pricePerItem: 30
                        }
                    ]
                });
                i18n.setLocaleMessage('en', { ...i18n.messages.en, [currentProduct.title]: currentProduct.title});
                i18n.setLocaleMessage('ar', { ...i18n.messages.ar, [currentProduct.title]: currentProduct.title_ar});
            });
            console.log('Updated store', store);
            store.loaded = true;
        })
        .catch(error => {
            console.log(error.response);
        });
        
    }
}






// export const store_temp = Vue.observable({
//     products: [
//         {
//             id: 1,
//             name: "Paper Bag",
//             title: {
//                 en: "Paper Bag",
//                 ar: "حقيبة اوراق",
//             },
//             size: "Small",
//             amount: 500,
//             color: "Natural",
//             image: "/storage/Packaging/PaperBag.png",
//             cost: 500,
//             multipliers: [
//                 {
//                     size: "Small",
//                     pricePerItem: 10
//                 },
//                 {
//                     size: "Medium",
//                     pricePerItem: 20
//                 },
//                 {
//                     size: "Large",
//                     pricePerItem: 30
//                 }
//             ]
//         },
//         {
//             id: 2,
//             name: "Pizza Box",
//             title: {
//                 en: "Pizza Box",
//                 ar: "بيتزا بوكس",
//             },
//             size: "Small",
//             amount: 500,
//             color: "Natural",
//             image: "/storage/packaging/PizzaBox.png",
//             cost: 500,
//             multipliers: [
//                 {
//                     size: "Small",
//                     pricePerItem: 10
//                 },
//                 {
//                     size: "Medium",
//                     pricePerItem: 20
//                 },
//                 {
//                     size: "Large",
//                     pricePerItem: 30
//                 }
//             ]
//         },
//         {
//             id: 3,
//             name: "Cookies Box",
//             title: {
//                 en: "Cookies Box",
//                 ar: "صندوق الكوكيز"
//             },
//             size: "Small",
//             amount: 500,
//             color: "Natural",
//             image: "/storage/packaging/CookiesBox.png",
//             cost: 500,
//             multipliers: [
//                 {
//                     size: "Small",
//                     pricePerItem: 10
//                 },
//                 {
//                     size: "Medium",
//                     pricePerItem: 20
//                 },
//                 {
//                     size: "Large",
//                     pricePerItem: 30
//                 }
//             ]
//         },
//         {
//             id: 4,
//             name: "Noodles Box",
//             title: {
//                 en: "Noodles Box",
//                 ar: "صندوق المعكرونة"
//             },
//             size: "Small",
//             amount: 500,
//             color: "Natural",
//             image: "/storage/packaging/NoodlesBox.png",
//             cost: 500,
//             multipliers: [
//                 {
//                     size: "Small",
//                     pricePerItem: 10
//                 },
//                 {
//                     size: "Medium",
//                     pricePerItem: 20
//                 },
//                 {
//                     size: "Large",
//                     pricePerItem: 30
//                 }
//             ]
//         },
//         {
//             id: 5,
//             name: "Cup Sleeve",
//             title: {
//                 en: "Cup Sleeve",
//                 ar: "كأس الأكمام"
//             },
//             size: "Small",
//             amount: 500,
//             color: "Natural",
//             image: "/storage/packaging/CupSleeve.png",
//             cost: 500,
//             multipliers: [
//                 {
//                     size: "Small",
//                     pricePerItem: 10
//                 },
//                 {
//                     size: "Medium",
//                     pricePerItem: 20
//                 },
//                 {
//                     size: "Large",
//                     pricePerItem: 30
//                 }
//             ]
//         },
//         {
//             id: 6,
//             name: "Fries Box",
//             title: {
//                 en: "Fries Box",
//                 ar: "صندوق فرايز",
//             },
//             size: "Small",
//             amount: 500,
//             color: "Natural",
//             image: "/storage/packaging/FriesBox.png",
//             cost: 500,
//             multipliers: [
//                 {
//                     size: "Small",
//                     pricePerItem: 10
//                 },
//                 {
//                     size: "Medium",
//                     pricePerItem: 20
//                 },
//                 {
//                     size: "Large",
//                     pricePerItem: 30
//                 }
//             ]
//         },
//         {
//             id: 7,
//             name: "Cake Box",
//             title: {
//                 en: "Cake Box",
//                 ar: "كعكة مربع",
//             },
//             size: "Small",
//             amount: 500,
//             color: "Natural",
//             image: "/storage/packaging/CakeBox.png",
//             cost: 500,
//             multipliers: [
//                 {
//                     size: "Small",
//                     pricePerItem: 10
//                 },
//                 {
//                     size: "Medium",
//                     pricePerItem: 20
//                 },
//                 {
//                     size: "Large",
//                     pricePerItem: 30
//                 }
//             ]
//         },
//         {
//             id: 8,
//             name: "Perfume Box",
//             title: {
//                 en: "Perfume Box",
//                 ar: "صندوق العطور",
//             },
//             size: "Small",
//             amount: 500,
//             color: "Natural",
//             image: "/storage/packaging/PerfumeBox.png",
//             cost: 500,
//             multipliers: [
//                 {
//                     size: "Small",
//                     pricePerItem: 10
//                 },
//                 {
//                     size: "Medium",
//                     pricePerItem: 20
//                 },
//                 {
//                     size: "Large",
//                     pricePerItem: 30
//                 }
//             ]
//         },
//         {
//             id: 9,
//             name: "Food Sleeve",
//             title: {
//                 en: "Food Sleeve",
//                 ar: "كم الغذاء",
//             },
//             size: "Small",
//             amount: 500,
//             color: "Natural",
//             image: "/storage/packaging/FoodSleeve.png",
//             cost: 500,
//             multipliers: [
//                 {
//                     size: "Small",
//                     pricePerItem: 10
//                 },
//                 {
//                     size: "Medium",
//                     pricePerItem: 20
//                 },
//                 {
//                     size: "Large",
//                     pricePerItem: 30
//                 }
//             ]
//         },
//         {
//             id: 10,
//             name: "Cup Holder",
//             title: {
//                 en: "Cup Holder",
//                 ar: "حامل الكأس"
//             },
//             size: "Small",
//             amount: 500,
//             color: "Natural",
//             image: "/storage/packaging/CupHolder.png",
//             cost: 500,
//             multipliers: [
//                 {
//                     size: "Small",
//                     pricePerItem: 10
//                 },
//                 {
//                     size: "Medium",
//                     pricePerItem: 20
//                 },
//                 {
//                     size: "Large",
//                     pricePerItem: 30
//                 }
//             ]
//         },
//     ],
    
// });