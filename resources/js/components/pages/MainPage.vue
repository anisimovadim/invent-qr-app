<template>
<div class="box">
    <block-inventory></block-inventory>
</div>
</template>

<script>
import MainPanel from "../layouts/MainPanel.vue";
import BlockInventory from "../ui/BlockInventory.vue";
export default {
    name: "MainPage",
    components: {MainPanel, BlockInventory}
}
</script>

<style scoped>
.box{
    padding: 20px;
}
</style>
