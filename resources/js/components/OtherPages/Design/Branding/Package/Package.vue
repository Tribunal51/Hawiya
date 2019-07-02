<template>
    <div class="Cover">
        <div class="card-group packageCards">
            <Card v-for="card in cards" :key="card.title" :card="card">
                <button 
                class="btn btn-secondary" 
                @click="orderButtonClicked(card.title)">ORDER</button>
            </Card>
        </div>
    </div>
</template>

<script>
import Card from '../../../../UI/Card';
export default {
    mounted() {
        this.packages = ['Package 1', 'Package 2', 'Package 3'];
    },
    components: {
        Card
    },
    data() {
        return {
            packages: [],
            cards: [
                {
                    title: 'Package 1',
                    old_price: 150,
                    new_price: 100,
                    offers: {
                        "Offer 1": 10,
                        "Offer 2": 20,
                        "Offer 3": 30,
                        "Offer 4": "test"
                    }
                },
                {
                    title: 'Package 2',
                    old_price: 150,
                    new_price: 100,
                    offers: {
                        "Offer 1":10,
                        "Offer 2":"test",
                        "Offer 3": 30,
                        "Offer 4": 40
                    }
                },
                {
                    title: 'Package 3',
                    old_price: 150,
                    new_price: 100,
                    offers: {
                        "Offer 1":10,
                        "Offer 2":20,
                        "Offer 3":30,
                        "Offer 4":40,
                        "Offer 5":50
                    }
                }
            ]
        }
    },
    methods: {
        orderButtonClicked(title) {

            if(title === 'Package 1') {
                this.$store.dispatch('branding/setPackage', title);
                this.$router.push({
                    name: 'brandinginfo'
                });

            }
            else {
                this.$store.dispatch('logodesign/setPackage', title);
                this.$store.dispatch('logodesign/setBranding');
                this.$router.push({
                    name: 'logotype'
                });
            }
        }

    }

}
</script>

<style scoped>

</style>
