<template>
    <div class="Cover">
        <div class="row">
            <div class="col">
                We bring you premium stationery design solutions that will help you put your brands in the limelight. Experienced designers and consultants are always at your disposal to make things happen exactly the way you want, or even better!
            </div>
        </div>
        <div class="card-group packageCards">
            <Card v-for="card in cards" :key="card.name" :card="card">
                <OrderButton :buttonClicked="() => buttonClicked(card)" />
            </Card>
        </div>
    </div>

</template> 

<script>
import Card from '../../../../UI/Card';
import BlackBox from '../../../../UI/BlackBox';
import OrderButton from '../../../../UI/OrderButton';

export default {
    components: {
        Card,
        BlackBox,
        OrderButton
    },
    data() {
        return {
            cards: [
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
        }
    },
    methods: {
        buttonClicked(card) {
            let payload = {
                package: card.package,
                price: card.new_price
            };
            this.$store.dispatch('stationery/setPackage', payload);
            this.$router.push({
                name: 'stationeryinfo'
            });
        }
    }
}
</script>

<style scoped>

</style>