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
import { store } from '../../../../../data/socialmedia';

export default {
    components: {
        Card,
        BlackBox,
        OrderButton
    },
    mounted() {

    },
    computed: {
        cards() {
            return store.packages;
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
