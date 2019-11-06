<i18n>  
    {
        "en": {
            "line1": "As much as effective branding design is an art, it's also a clearly defined science. In fact, it's a topic that has been thoroughly studied by countless researchers over past several decades."
        },
        "ar": {
            "line1": "بقدر ما يكون التصميم الفعال للعلامة التجارية فنًا ، فهو أيضًا علم محدد بوضوح. في الحقيقة ، إنه موضوع تمت دراسته بدقة من قبل عدد لا يحصى من الباحثين على مدار العقود الماضية."
        }
    }
</i18n>

<template>
    <div class="Cover">
        <div class="row">
            <div class="col">
                {{ $t('line1') }}
            </div>
        </div>

        <div class="card-group packageCards">
            <Card v-for="(card, index) in cards" :key="index" :card="card">
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
import { store, getPackages } from '../../../../../data/branding';

export default {
    mounted() {
        console.log('Packages', this.packages);
        getPackages();
    },
    components: {
        Card,
        BlackBox,
        OrderButton
    },
    computed: {
        cards() {
            return store.packages;
        },
        packages() {
            let packages = this.cards.map(card => card.title);
            return packages;
        }
    },
    methods: {
        orderButtonClicked(card) {
            let payload = {
                package: card.title,
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
