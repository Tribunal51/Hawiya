import Vue from 'vue';
import { i18n } from '../plugins/i18n';

export const store = Vue.observable({
    en: {
        packages: [
            {
                title: 'FAST TRACK',
                package: 'Fast Track',
                old_price: 100,
                new_price: 50,
                posts: 1,
                offers: [
                    "Facebook",
                    "Instagram",
                    "Twitter"
                ]
            },
            {
                title: 'BASIC',
                package: 'Basic',
                old_price: 400,
                new_price: 150,
                posts: 4,
                offers: [
                    "Facebook",
                    "Instagram",
                    "Twitter"
                ]
            },
            {
                title: 'ADVANCED',
                package: 'Advanced',
                old_price: 800,
                new_price: 250,
                posts: 8,
                offers: [
                    "Facebook",
                    "Instagram",
                    "Twitter"
                ]
            }
        ]
    },
    ar: {
        packages: [
            {
                title: i18n.messages.ar['Fast Track'],
                package: 'Fast Track',
                old_price: 100,
                new_price: 50,
                posts: 1,
                offers: [
                    "Facebook",
                    "Instagram",
                    "Twitter"
                ]
            },
            {
                title: i18n.messages.ar['Basic'],
                package: 'Basic',
                old_price: 400,
                new_price: 150,
                posts: 4,
                offers: [
                    "Facebook",
                    "Instagram",
                    "Twitter"
                ]
            },
            {
                title: i18n.messages.ar['Advanced'],
                package: 'Advanced',
                old_price: 800,
                new_price: 250,
                posts: 8,
                offers: [
                    "Facebook",
                    "Instagram",
                    "Twitter"
                ]
            }
        ]
    }
    
});