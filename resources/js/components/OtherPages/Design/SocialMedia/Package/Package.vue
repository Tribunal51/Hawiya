<template>
    <div class="Cover">
        <BlackBox>
            Our social media packages for small business can help you utilize social media marketing and take advantage of the many benefits social networks have to offer to businesses.
        </BlackBox>
        <div class="card-group packageCards">
            <Card v-for="card in cards" :card="card" :key="card.title">
                <button @click="orderButtonClicked(card)" class="btn btn-secondary">ORDER</button>
            </Card>
        </div>
    </div>
    
</template>

<script>
import BlackBox from '../../../../UI/BlackBox';
import Card from '../../../../UI/Card';
export default {
    components: {
        Card,
        BlackBox
    },
    mounted() {

    },
    data() {
        return {
            cards: [
                {
                    title: 'FAST TRACK',
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
