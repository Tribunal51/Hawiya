import Vue from 'vue';
import { i18n } from '../plugins/i18n.js';
import axios from 'axios';

export const store = Vue.observable({
    loaded: false,
    packages: [
        {
            title: '',
            old_price: '',
            new_price: '',
            offers: [
                "logodesign_package1_offer1",
                "logodesign_package1_offer2",
                "logodesign_package1_offer3",
                "logodesign_package1_offer4"
            ]
        },
        {
            title: '',
            old_price: '',
            new_price: '',
            offers: [
                "logodesign_package2_offer1",
                "logodesign_package2_offer2",
                "logodesign_package2_offer3",
                "logodesign_package2_offer4"
            ]
        },
        {
            title: '',
            old_price: '',
            new_price: '',
            offers: [
                "logodesign_package3_offer1",
                "logodesign_package3_offer2",
                "logodesign_package3_offer3",
                "logodesign_package3_offer4"
            ]
        }

    ],
    logotypes: [
        {
            title: 'Combination Mark',
            file: '/storage/logotype/combination-mark.png'
        },
        {
            title: 'Emblem',
            file: '/storage/logotype/emblem.png'
        },
        {
            title: 'Letterform',
            file: '/storage/logotype/letterform.png'
        },
        {   
            title: 'Pictorial mark',
            file: '/storage/logotype/pictorial-mark.png'
        },
        {
            title: 'Signature',
            file: '/storage/logotype/signature.png'
        },
        {
            title: 'WordMark',
            file: '/storage/logotype/wordmark.png'
        },
        {
            title: 'Abstract mark',
            file: '/storage/logotype/abstract-mark.png'
        },
        {
            title: 'Typography',
            file: '/storage/logotype/typography.png'
        }
    ],
    colors: {
        Red: "red",
        Violet: "violet",
        DarkViolet: "darkviolet",
        Purple: "purple",
        Blue: "blue",
        LightBlue: "lightblue",
        Green: "green",
        LightGreen: "lightgreen",
        Yellow: "yellow",
        Orange: "orange",
        OrangeRed: "orangered",
        Brown: "brown",
        Black: "black"
    },
    fonts: [
        {
            name: 'Serif',
            description: 'serif_description',
            file: '/storage/Fonts/Serif.png'
        },
        {
            name: 'Sans Serif',
            description: 'sans_serif_description',
            file: '/storage/Fonts/SansSerif.png'
        },
        {
            name: 'Script',
            description: 'script_description',
            file: '/storage/Fonts/Script.png'
        },
        {
            name: 'Display',
            description: 'display_description',
            file: '/storage/Fonts/Display.png'
        }
    ],
    styles: {
        modern_classic: 0,
        mature_youthful: 0,
        feminine_masculine: 0,
        playful_sophisticated: 0,
        economical_luxury: 0,
        geometric_organic: 0,
        abstract_literal: 0
    },
    form: {
        brand: "",
        tagline: "",
        business_field: "",
        description: "",
        subject: ""
    }
});


export async function getPackages() {
    if(!store.loaded) {
        console.log('Inside getPackages');
        let packages = [];
        await axios.get('/api/data/packages/category/1').then(res => {
            packages = [...res.data];
            console.log('Inside AXIOS GET');
            store.loaded = true;
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