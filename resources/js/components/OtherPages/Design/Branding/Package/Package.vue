<template>
    <div class="Cover">
        <div class="row">
            <div class="col">
                As much as effective branding design is an art, it's also a clearly defined science. In fact, it's a topic that has been thoroughly studied by countless researchers over the past several decades.
            </div>
        </div>

        <div class="card-group packageCards">
            <Card v-for="card in cards" :key="card.title" :card="card">
                <OrderButton
                :buttonClicked="() => orderButtonClicked(card)"
                />
            </Card>
        </div>
    </div>
</template>

<script>
import Card from '../../../../UI/Card';
import BlackBox from '../../../../UI/BlackBox';
import OrderButton from '../../../../UI/OrderButton';

export default {
    mounted() {
        console.log('Packages', this.packages);
    },
    components: {
        Card,
        BlackBox,
        OrderButton
    },
    data() {
        return {
            cards: [
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
            ]
        }
    },
    computed: {
        packages() {
            let packages = this.cards.map(card => card.title);
            return packages;
        }
    },
    methods: {
        orderButtonClicked(card) {
            let payload = {
                package: card.package,
                price: card.new_price
            };
            if(card.title === this.cards[0].title) {
                this.$store.dispatch('branding/setPackage', payload);
                this.$router.push({
                    name: 'brandinginfo'
                });

            }
            else {
                this.$store.dispatch('logodesign/setPackage', payload);
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
