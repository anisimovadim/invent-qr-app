<template>
<div class="panel shadow">

        <div class="qrcode" v-if="inventory['src_qrcode']">
            <img :src="inventory['src_qrcode']" alt="">
        </div>
        <div class="info p-5">
            <p v-if="inventory.whome"><b>Кому выдан:</b> {{inventory.whome}}</p>
            <p v-if="inventory.cabinet"><b>Здание №{{inventory.number_building}} Кабинет: </b>{{inventory.cabinet}}</p>
            <p v-if="inventory.character"><b>Характеристика: </b>{{inventory.character}}</p>
        </div>

</div>
</template>

<script>
export default {
    name: "PanelInvent",
    props:{
        inventory: Object
    }
}
</script>

<style scoped>
.panel{
    width: 500px;
}
.qrcode{
    max-width: 250px;
    margin: auto;
}
img{
    width: 100%;
}
</style>
