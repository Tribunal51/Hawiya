<template>
    <div class="Cover">
        <slot></slot>       
    </div>
</template>

<script>
export default {
    props: [
        "product"
    ],
    methods: {
        
    }

}
</script>

<style scoped>
    .Cover {
        width: 200px;
        min-height: 200px;
        margin: 10px;
        padding: 20px;
        border: 1px solid gray;
    }

</style>
