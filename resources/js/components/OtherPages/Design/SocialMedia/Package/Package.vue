<template>
    <div class="Cover">
        <div class="row">
            <div class="col">
                Our social media packages for small business can help you utilize social media marketing and take advantage of the many benefits social networks have to offer to businesses.
            </div>
        </div>      
        <div class="card-group packageCards">
            <Card v-for="card in cards" :card="card" :key="card.title">
                <OrderButton :buttonClicked="() => orderButtonClicked(card)" />
            </Card>
        </div>
    </div>
    
</template>

<script>
import BlackBox from '../../../../UI/BlackBox';
import Card from '../../../../UI/Card';
import OrderButton from '../../../../UI/OrderButton';

export default {
    components: {
        Card,
        BlackBox,
        OrderButton
    },
    mounted() {

    },
    data() {
        return {
            cards: [
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
        }
    },
    methods: {
        orderButtonClicked(card) {
            let payload = {
                package: card.package,
                posts: card.posts,
                price: card.new_price
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
