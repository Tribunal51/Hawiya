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
        await axios.get('/api/data/products/category/6').then(res => {
            products = [...res.data];
            console.log('Products fetched', products);
            products.forEach((currentProduct, index) => {
                store.products.push({
                    id: index,
                    title: currentProduct.title,
                    cost: currentProduct.price
                });
                i18n.setLocaleMessage('en', { ...i18n.messages.en, [currentProduct.title]: currentProduct.title});
                i18n.setLocaleMessage('ar', { ...i18n.messages.ar, [currentProduct.title]: currentProduct.title_ar});
                console.log(i18n.messages.en);
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
//     items: [
//         {
//             name: 'Roll Up',
//             cost: 10
//         },
//         {
//             name: 'T-Shirt',
//             cost: 20
//         },
//         {
//             name: 'Flyer',
//             cost: 15
//         },
//         {
//             name: 'Book Cover',
//             cost: 25
//         },
//         {
//             name: 'Profile',
//             cost: 23
//         },
//         {
//             name: 'Pop up',
//             cost: 20
//         },
//         {
//             name: 'Sticker',
//             cost: 29
//         },
//         {
//             name: 'Notepad',
//             cost: 30
//         },
//         {
//             name: 'Cap',
//             cost: 35
//         },
//         {
//             name: 'Brochure',
//             cost: 32
//         }
//     ]
// })