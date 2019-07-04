<template>
    <div class="Cover">
        <div class="card-group packageCards">
            <Card v-for="card in cards" :card="card" :key="card.title">
                <button @click="orderButtonClicked(card)" class="btn btn-secondary">ORDER</button>
            </Card>
        </div>
    </div>
    
</template>

<script>
import Card from '../../../../UI/Card';
export default {
    components: {
        Card
    },
    mounted() {

    },
    data() {
        return {
            cards: [
                {
                    title: 'Package 1',
                    old_price: 200,
                    new_price: 100,
                    posts: 1,
                    offers: {
                        'Offer 1': 10,
                        'Offer 2': 20,
                        'Offer 3': 30,
                        'Offer 4': 40
                    }
                },
                {
                    title: 'Package 2',
                    old_price: 200,
                    new_price: 100,
                    posts: 4,
                    offers: {
                        'Offer 1': 10,
                        'Offer 2': 20,
                        'Offer 3': 30,
                        'Offer 4': 40
                    }
                },
                {
                    title: 'Package 3',
                    old_price: 200,
                    new_price: 100,
                    posts: 7,
                    offers: {
                        'Offer 1': 10,
                        'Offer 2': 20,
                        'Offer 3': 30,
                        'Offer 4': 40
                    }
                }
            ]
        }
    },
    methods: {
        orderButtonClicked(card) {
            let payload = {
                packageTitle: card.title,
                posts: card.posts
            };
            this.$store.dispatch('socialmedia/setPackage', payload);
            this.$router.push({
                name: 'socialmediainfo'
            });
        }
    }

}
</script>

<style scoped>

</style>
