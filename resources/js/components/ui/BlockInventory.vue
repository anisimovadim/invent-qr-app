<template>
    <td>{{inventory.number_invent}}</td>
    <td>{{inventory.type}}</td>
    <td>{{inventory.model}}</td>
    <td>{{inventory.cabinet}}</td>
</template>

<script>
export default {
    name: "BlockInventory",
    props:{
        inventory: Object
    }
}
</script>

<style>
.info{
    gap: 20px;
}
</style>
<!--{-->
<!--number_invent:101393219,-->
<!--model: 'acer m43',-->
<!--character:'',-->
<!--type:'notebook',-->
<!--cabinet: 104,-->
<!--src_qrcode:''-->
<!--}-->
