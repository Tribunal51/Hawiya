import Vue from 'vue';
import { i18n } from '../plugins/i18n';

export const store_temp = Vue.observable({
    en: {
        packages: [
            {
                title: 'FAST TRACK',
                package: 'Fast Track',
                old_price: 100,
                new_price: 50,
                posts: 1,
                offers: [
                    "Facebook",
                    "Instagram",
                    "Twitter"
                ]
            },
            {
                title: 'BASIC',
                package: 'Basic',
                old_price: 400,
                new_price: 150,
                posts: 4,
                offers: [
                    "Facebook",
                    "Instagram",
                    "Twitter"
                ]
            },
            {
                title: 'ADVANCED',
                package: 'Advanced',
                old_price: 800,
                new_price: 250,
                posts: 8,
                offers: [
                    "Facebook",
                    "Instagram",
                    "Twitter"
                ]
            }
        ]
    },
    ar: {
        packages: [
            {
                title: i18n.messages.ar['Fast Track'],
                package: 'Fast Track',
                old_price: 100,
                new_price: 50,
                posts: 1,
                offers: [
                    "Facebook",
                    "Instagram",
                    "Twitter"
                ]
            },
            {
                title: i18n.messages.ar['Basic'],
                package: 'Basic',
                old_price: 400,
                new_price: 150,
                posts: 4,
                offers: [
                    "Facebook",
                    "Instagram",
                    "Twitter"
                ]
            },
            {
                title: i18n.messages.ar['Advanced'],
                package: 'Advanced',
                old_price: 800,
                new_price: 250,
                posts: 8,
                offers: [
                    "Facebook",
                    "Instagram",
                    "Twitter"
                ]
            }
        ]
    }
    
});

export const store = Vue.observable({
    loaded: false,
    packages: [
        {
            title: '',
            old_price: '',
            new_price: '',
            posts: '',
            offers: [
                "Facebook",
                "Instagram",
                "Twitter"
            ]
        },
        {
            title: '',
            old_price: '',
            new_price: '',
            posts: '',
            offers: [
                "Facebook",
                "Instagram",
                "Twitter"
            ]
        },
        {
            title: '',
            package: '',
            old_price: '',
            new_price: '',
            posts: '',
            offers: [
                "Facebook",
                "Instagram",
                "Twitter"
            ]
        }
    ]
});

export async function getPackages() {
    if(!store.loaded) {
        console.log('Inside getPackages');
        let packages = [];
        await axios.get('/api/data/packages/category/3').then(res => {
            packages = [...res.data];
            console.log('Packages fetched', packages);
            packages.forEach((currentPackage, index) => {
                store.packages[index].title = currentPackage.title;
                i18n.messages.en[currentPackage.title] = currentPackage.title;
                i18n.messages.ar[currentPackage.title] = currentPackage.title_ar;
                store.packages[index].old_price = currentPackage.old_price;
                store.packages[index].new_price = currentPackage.new_price;
                store.packages[index].posts = currentPackage.posts;
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