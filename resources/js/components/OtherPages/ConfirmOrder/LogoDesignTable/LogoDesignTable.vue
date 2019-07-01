<template>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Parameter</th>
                <th scope="col">Choice</th>
            </tr>

            <tr>
                <td>Color</td>
                <td>{{ this.$store.state.logodesign.color.toString() }}</td>
            </tr>

            <tr>
                <td>Files</td>
                <td><img :src="this.$store.state.logodesign.files[0]"></td>
            </tr>

        </thead>
    </table>
</template>

<script>
export default {

}
</script>

<style>

</style>
