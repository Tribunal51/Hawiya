import Vue from 'vue';

export const store = Vue.observable({
    products: [
        {
            id: 1,
            name: "Product 1",
            size: "Small",
            amount: 20,
            color: "Red",
            image: "/storage/Packaging/FriesBox.png",
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
            name: "Product 2",
            size: "Medium",
            amount: 20,
            color: "Green",
            image: "",
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
            name: "Product 3",
            size: "Large",
            amount: 20,
            color: "Blue",
            image: "",
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

        }
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