<template>
<div class="panel shadow">
    <div class="qrcode">
        <img :src="inventory['src_qrcode']" alt="">
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
</style>
