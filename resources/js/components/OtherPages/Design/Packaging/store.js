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
    selectedItems: [],
    itemToModify: {}
});

export const removeKeyFromObjectsArray = (products, key) => {
            
    const newProducts = products.map(
        ({
            [key]: _,
            ...otherAttributes
        }) => otherAttributes
    );
    return newProducts;
}

export const mutations = {
    addItem(item) {
        store.selectedItems.push(item);
    },
    addSelectedItems(selectedItems) {
        store.selectedItems = [...selectedItems];
    },
    setItemToModify(item) {
        store.itemToModify = {...item};
    },
    addModifiedItem() {
        store.selectedItems.push(store.itemToModify);
    },
    removeItem(id) {
        store.selectedItems = [...store.selectedItems.filter(item => item.id === id)];
    },
    resetStore() {
        store.selectedItems = [];
        store.itemToModify = {};
    },
    
};