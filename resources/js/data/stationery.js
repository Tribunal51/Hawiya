import Vue from 'vue';

export const store = Vue.observable({
    products: [
        {
            id: 1,
            name: 'A4 Envelope',
            title: {
                en: "A4 Envelope",
                ar: "مغلف A4"
            },
            image: '/storage/Stationery/A4Envelope.png',
            cost: 500
        },
        {
            id: 2,
            name: 'Business Card',
            title: {
                en: "Business Card",
                ar: "بطاقة العمل",
            },
            image: '/storage/Stationery/BusinessCard.png',
            cost: 500
        },
        {
            id: 3,
            name: 'CD Cover',
            title: {
                en: 'CD Cover',
                ar: 'غلاف اسطوانة',
            },
            image: '/storage/Stationery/CDCover.png',
            cost: 500
        }, 
        {
            id: 4,
            name: 'DL Envelope',
            title: {
                en: 'DL Envelope',
                ar: 'مغلف DL'
            },
            image: '/storage/Stationery/DLEnvelope.png',
            cost: 500
        },
        {
            id: 5,
            name: 'Folder',
            title: {
                en: 'Folder', 
                ar: 'مجلد',
            },
            image: '/storage/Stationery/Folder.png',
            cost: 500
        },
        {
            id: 6,
            name: 'Letterhead',
            title: {
                en: 'Letterhead',
                ar: 'ترويسة'
            },
            image: '/storage/Stationery/Letterhead.png',
            cost: 500
        },
        {
            id: 7,
            name: 'Notepad',
            title: {
                en: 'Notepad',
                ar: 'المفكرة',
            },
            image: '/storage/Stationery/Notepad.png',
            cost: 500
        },
        {
            id: 8,
            name: 'Table Calendar',
            title: {
                en: 'Table Calendar', 
                ar: 'تقويم الجدول',
            },
            image: '/storage/Stationery/TableCalendar.png',
            cost: 500
        },
        {
            id: 9,
            name: 'Triangle Calendar',
            title: {
                en: 'Triangle Calendar',
                ar: 'مثلث التقويم',
            },
            image: '/storage/Stationery/TriangleCalendar.png',
            cost: 500
        }
    ]
    
});