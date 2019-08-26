import Vue from 'vue';

export const store = Vue.observable({
    products: [
        {
            id: 1,
            name: "Paper Bag",
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/Packaging/PaperBag.png",
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
        },
        {
            id: 2,
            name: "Pizza Box",
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/packaging/PizzaBox.png",
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
        },
        {
            id: 3,
            name: "Cookies Box",
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/packaging/CookiesBox.png",
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
        },
        {
            id: 4,
            name: "Noodles Box",
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/packaging/NoodlesBox.png",
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
        },
        {
            id: 5,
            name: "Cup Sleeve",
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/packaging/CupSleeve.png",
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
        },
        {
            id: 6,
            name: "Fries Box",
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/packaging/FriesBox.png",
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
        },
        {
            id: 7,
            name: "Cake Box",
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/packaging/CakeBox.png",
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
        },
        {
            id: 8,
            name: "Perfume Box",
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/packaging/PerfumeBox.png",
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
        },
        {
            id: 9,
            name: "Food Sleeve",
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/packaging/FoodSleeve.png",
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
        },
        {
            id: 10,
            name: "Cup Holder",
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/packaging/CupHolder.png",
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
        },
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
    colorsList: {
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
    ]
})