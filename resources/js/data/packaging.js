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