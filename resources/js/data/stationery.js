import Vue from 'vue';

export const store = Vue.observable({
    packages: [
        {
            title: 'FAST TRACK',
            package: 'Fast Track',
            old_price: 150,
            new_price: 100,
            offers: [
                "Letter Head",
                "Business Card",
                "Envelope"
            ]
        },
        {
            title: 'BASIC',
            package: 'Basic',
            old_price: 350,
            new_price: 200,
            offers: [
                "Letter Head",
                "Business Card",
                "Envelope",
                "Folder",
                "Invoice"
            ]
        },
        {
            title: 'ADVANCED',
            package: 'Advanced',
            old_price: 500,
            new_price: 300,
            offers: [
                "Letter Head",
                "Business Card",
                "Envelope",
                "Folder",
                "Invoice",
                "Notebook",
                "Voucher"
            ]
        }
    ]
});