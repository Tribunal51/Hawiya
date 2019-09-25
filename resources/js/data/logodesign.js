import Vue from 'vue';
import { i18n } from '../plugins/i18n.js';

export const store = Vue.observable({
    en: {
        packages: [
            {
                title: i18n.messages.en['Fast Track'],
                package: 'Fast Track',
                old_price: 150,
                new_price: 100,
                offers: [
                    "2 Logo Concepts",
                    "2 Revisions",
                    "2 Dedicated Designers",
                    "48hrs Turnaround Time"
                ]
            },
            {
                title: i18n.messages['Basic'],
                package: 'Basic',
                old_price: 200,
                new_price: 350,
                offers: [
                    "4 Logo Concepts",
                    "4 Revisions",
                    "2 Dedicated Designers",
                    "48hrs Turnaround Time"
                ]
            },
            {
                title: i18n.messages.en['Advanced'],
                package: 'Advanced',
                old_price: 300,
                new_price: 500,
                offers: [
                    "6 Logo Concepts",
                    "6 Revisions",
                    "2 Dedicated Designers",
                    "48hrs Turnaround Time"
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
                title: 'Serif',
                description: 'Traditional, have feel.',
                file: '/storage/Fonts/Serif.png'
            },
            {
                name: 'Sans Serif',
                title: 'Sans Serif',
                description: 'Modern, feel free.',
                file: '/storage/Fonts/SansSerif.png'
            },
            {
                name: 'Script',
                title: 'Script',
                description: 'Cursive, a bit more decorative.',
                file: '/storage/Fonts/Script.png'
            },
            {
                name: 'Display',
                title: 'Display',
                description: 'Decorative, good as a design focal point.',
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
    },
    ar: {
        packages: [
            {
                title: i18n.messages.ar['Fast Track'],
                package: 'Fast Track',
                old_price: 150,
                new_price: 100,
                offers: [
                    "٢ مفاهيم الشعار",
                    "٢ التنقيحات",
                    "٢ المصممين المتفانين",
                    "٤٨ ساعات تحول الوقت"
                ]
            },
            {
                title: i18n.messages.ar['Basic'],
                package: 'Basic',
                old_price: 200,
                new_price: 350,
                offers: [
                    "4 Logo Concepts",
                    "4 Revisions",
                    "2 Dedicated Designers",
                    "48hrs Turnaround Time"
                ]
            },
            {
                title: i18n.messages.ar['Advanced'],
                package: 'Advanced',
                old_price: 300,
                new_price: 500,
                offers: [
                    "6 Logo Concepts",
                    "6 Revisions",
                    "2 Dedicated Designers",
                    "48hrs Turnaround Time"
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
                title: 'سآريف',
                description: 'التقليدية ، ويشعر.',
                file: '/storage/Fonts/Serif.png'
            },
            {
                name: 'Sans Serif',
                title: 'سانس سآريف',
                description: 'الحديث ، لا تتردد.',
                file: '/storage/Fonts/SansSerif.png'
            },
            {
                name: 'Script',
                title: 'سثريبت',
                description: 'مخطوطة ، وأكثر قليلا الزخرفية.',
                file: '/storage/Fonts/Script.png'
            },
            {
                name: 'Display',
                title: 'ديسبلاي',
                description: 'ديكور ، وحسن كنقطة محورية التصميم.',
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
    }
    
});