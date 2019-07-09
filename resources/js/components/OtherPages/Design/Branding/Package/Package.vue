<template>
    <div class="Cover">
        <BlackBox>
            As much as effective branding design is an art, it's also a clearly defined science. In fact, it's a topic that has been thoroughly studied by countless researchers over the past several decades.
        </BlackBox>
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
import BlackBox from '../../../../UI/BlackBox';
export default {
    mounted() {
        this.packages = ['Package 1', 'Package 2', 'Package 3'];
    },
    components: {
        Card,
        BlackBox
    },
    data() {
        return {
            packages: [],
            cards: [
                {
                    title: 'Brand Binder : A',
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
                    old_price: 1500,
                    new_price: 990,
                    offers: [
                        "2 Professional Logo",
                        "2 Revisions",
                        "2 Dedicated Designers",
                        "48hrs Turnaround Time"
                    ]
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
