<template>
    <div class="clientSection">
        <div class="reportHeader">
            REPORT
        </div>
        <div class="clientContactForm">
            <h5 class="clientFormHeader">CLIENT CONTACT</h5>
            <div class="clientFormField">Name: {{ this.client.name }}</div>
            <div class="clientFormField">Email: {{ this.client.email }}</div>
            <div class="clientFormField">Phone No: {{ this.client.mobile }}</div> 
            <div class="clientFormField">City, State: {{ this.client.address }}</div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        "client"
    ]

}
</script>

<style scoped>

    .clientSection {
        background-color: #FFDB00;
        height: 100%;
        width: 100%;
        word-break: break-all;
    }

    .reportHeader {
        width: 100%;
        padding: 100px 5px 5px 20px;
        font-family: 'LatoBold', sans-serif;
        color: gray;
        font-size: 3.5rem;
        font-weight: 800;
    }

    .clientContactForm {
        width: 100%;
        display: flex;
        flex-flow: column wrap;
        padding: 5px 5px 20px 20px;
    }

    .clientFormHeader {
        font-weight: 600;
        font-size: 1.3rem;
    }

    .clientFormField {
        padding-bottom: 2px;
        font-size: 1.1rem;
    }

</style>