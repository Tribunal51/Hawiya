<template>
    <div class="Cover">
        <BlackBox>
            <h2>Stationery</h2>
        </BlackBox>
        <router-view />
    </div>
</template>

<script>
import BlackBox from '../../../UI/BlackBox';
export default {
    components: {
        BlackBox
    }
}
</script>

<style scoped>
    .Cover {
        font-family: 'LatoRegular', sans-serif;
    }
</style>