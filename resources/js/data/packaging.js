import Vue from 'vue';

export const store = Vue.observable({
    products: [
        {
            id: 1,
            name: "Paper Bag",
            title: {
                en: "Paper Bag",
                ar: "حقيبة اوراق",
            },
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/Packaging/PaperBag.png",
            cost: 500,
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
            title: {
                en: "Pizza Box",
                ar: "بيتزا بوكس",
            },
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/packaging/PizzaBox.png",
            cost: 500,
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
            title: {
                en: "Cookies Box",
                ar: "صندوق الكوكيز"
            },
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/packaging/CookiesBox.png",
            cost: 500,
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
            title: {
                en: "Noodles Box",
                ar: "صندوق المعكرونة"
            },
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/packaging/NoodlesBox.png",
            cost: 500,
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
            title: {
                en: "Cup Sleeve",
                ar: "كأس الأكمام"
            },
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/packaging/CupSleeve.png",
            cost: 500,
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
            title: {
                en: "Fries Box",
                ar: "صندوق فرايز",
            },
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/packaging/FriesBox.png",
            cost: 500,
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
            title: {
                en: "Cake Box",
                ar: "كعكة مربع",
            },
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/packaging/CakeBox.png",
            cost: 500,
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
            title: {
                en: "Perfume Box",
                ar: "صندوق العطور",
            },
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/packaging/PerfumeBox.png",
            cost: 500,
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
            title: {
                en: "Food Sleeve",
                ar: "كم الغذاء",
            },
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/packaging/FoodSleeve.png",
            cost: 500,
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
            title: {
                en: "Cup Holder",
                ar: "حامل الكأس"
            },
            size: "Small",
            amount: 500,
            color: "Natural",
            image: "/storage/packaging/CupHolder.png",
            cost: 500,
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
    
})