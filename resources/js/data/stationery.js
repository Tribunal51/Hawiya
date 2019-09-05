import Vue from 'vue';

export const store = Vue.observable({
    products: [
        {
            id: 1,
            name: 'A4 Envelope',
            image: '/storage/Stationery/A4Envelope.png',
            cost: 500
        },
        {
            id: 2,
            name: 'Business Card',
            image: '/storage/Stationery/BusinessCard.png',
            cost: 500
        },
        {
            id: 3,
            name: 'CD Cover',
            image: '/storage/Stationery/CDCover.png',
            cost: 500
        }, 
        {
            id: 4,
            name: 'DL Envelope',
            image: '/storage/Stationery/DLEnvelope.png',
            cost: 500
        },
        {
            id: 5,
            name: 'Folder',
            image: '/storage/Stationery/Folder.png',
            cost: 500
        },
        {
            id: 6,
            name: 'Letterhead',
            image: '/storage/Stationery/Letterhead.png',
            cost: 500
        },
        {
            id: 7,
            name: 'Notepad',
            image: '/storage/Stationery/Notepad.png',
            cost: 500
        },
        {
            id: 8,
            name: 'Table Calendar',
            image: '/storage/Stationery/TableCalendar.png',
            cost: 500
        },
        {
            id: 9,
            name: 'Triangle Calendar',
            image: '/storage/Stationery/TriangleCalendar.png',
            cost: 500
        }
    ]
});