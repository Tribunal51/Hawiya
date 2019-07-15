<template>
    <div class="Cover">
        Cost: {{ cost }}
    </div>
</template>

<script>
export default {
    data() {
        return {
            
        }
    },
    computed: {
        selectedProducts() {
            return this.products;
        },
        cost() {
            return this.products.length;
        }
    },
    props: [
        "products"
    ]

}
</script>

<style scoped>

</style>
