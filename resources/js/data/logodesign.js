import Vue from 'vue';

export const store = Vue.observable({
    en: {
        packages: [
            {
                title: 'FAST TRACK',
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
                title: "BASIC",
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
                title: "ADVANCED",
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
                description: 'Traditional, have feel.',
                file: '/storage/Fonts/Serif.png'
            },
            {
                name: 'Sans Serif',
                description: 'Modern, feel free.',
                file: '/storage/Fonts/SansSerif.png'
            },
            {
                name: 'Script',
                description: 'Cursive, a bit more decorative.',
                file: '/storage/Fonts/Script.png'
            },
            {
                name: 'Display',
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
                title: 'Arabic Fast Track',
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
                title: "BASIC",
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
                title: "ADVANCED",
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
                description: 'Traditional, have feel.',
                file: '/storage/Fonts/Serif.png'
            },
            {
                name: 'Sans Serif',
                description: 'Modern, feel free.',
                file: '/storage/Fonts/SansSerif.png'
            },
            {
                name: 'Script',
                description: 'Cursive, a bit more decorative.',
                file: '/storage/Fonts/Script.png'
            },
            {
                name: 'Display',
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
    }
    
});