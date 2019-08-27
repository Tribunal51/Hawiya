import Vue from 'vue';

export const store = Vue.observable({
    packages: [
        {
            title: 'Brand Binder : A',
            package: 'Brand Binder : A',
            old_price: 600,
            new_price: 400,
            header: 'YOU HAVE LOGO AND YOU NEED ONLY BRANDING',
            offers: [
                "2 Revisions",
                "2 Dedicated Designers",
                "48hrs Turnaround Time"
            ],
            comment: "Planner to Design your logo, Story & Strategy"
        },
        {
            title: 'Personal Branding Package',
            package: 'Personal Branding',
            old_price: 850,
            new_price: 600,
            offers: [
                "1 Professional Logo",
                "2 Revisions",
                "2 Dedicated Designers",
                "48hrs Turnaround Time"
            ],
            comment: "Planner to Design your logo, Story & Strategy"
        },
        {
            title: 'Premium Branding Package',
            package: 'Premium Branding',
            old_price: 1500,
            new_price: 990,
            offers: [
                "2 Professional Logo",
                "2 Revisions",
                "2 Dedicated Designers",
                "48hrs Turnaround Time"
            ],
            comment: "Planner to Design your logo Story & Strategy"
        }
    ],
    features: [
        "LOGO OR WATERMARK",
        'DIFFERENT LOGO "LOCKUPS"',
        "KEY COLORS",
        "ADDITIONAL COLOR PALETTE OPTIONS",
        "CORPORATE TYPEFACES",
        "STANDARD TYPOGRAPHIC TREATMENTS",
        "CONSISTENT STYLE FOR IMAGES",
        "HAVE A FULL LIBRARY OF GRAPHIC ELEMENTS"
    ]
});