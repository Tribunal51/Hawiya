<template>
    <div class="Cover">
        <BlackBox>
            <h2>Promotional</h2>
        </BlackBox>
        <div class="flex-container">
            <Item v-for="item in items" :key="item.name">
                <label :for="item.name">
                    <input type="checkbox" v-model="selectedItems" :value="item" :id="item.name" /><br />
                    Name: {{ item.name }}<br />
                    Price: {{ item.price}}
                
                </label>
            </Item>
        </div>
        <div>
            <h4>Price: ${{totalPrice}}</h4>
        </div>
        <v-btn color="primary" @click="buttonClicked" :disabled="selectedItems.length < 1">Click</v-btn>
    </div>
</template>

<script>
import BlackBox from '../../../UI/BlackBox';
import Item from './Item';

export default {
    components: {
        BlackBox,
        Item
    },
    data() {
        return {
            selectedItems: [],
            items: [
                {
                    name: 'Item 1',
                    price: 10
                },
                {
                    name: 'Item 2',
                    price: 20
                },
                {
                    name: 'Item 3',
                    price: 30
                },
                {
                    name: 'Item 4',
                    price: 40
                }
            ],
            totalPrice: 0
        }
    },
    methods: {
        buttonClicked() {
            console.log('Price', this.totalPrice);
            let items = this.selectedItems.map(itemObject => itemObject.name);
            this.$store.dispatch('promotional/setItems', {
                items: items,
                price: this.totalPrice
            });

            console.log(this.$store.state.promotional);
            let data = {
                user_id: 1,
                items: items
            }
            console.log('Data to send', data);
            // axios.post('http://hawiya.net/api/orders/promotional', data)
            // .then(response => console.log(response.data))
            // .catch(error => console.log(error.response));
        }
    },
    watch: {
        selectedItems: function(newValue) {
            this.totalPrice = this.selectedItems.map(item => item.price).reduce((prev,next) => {
                    return prev + next;
                },0);
            console.log('SelectedItems', this.selectedItems, 'TotalPrice', this.totalPrice);
        }
    }

}
</script>

<style scoped>
    .Cover {
        font-family: 'LatoRegular', sans-serif;
    }

    .flex-container {
        display: flex;
        flex-wrap: wrap;
    }

</style>
