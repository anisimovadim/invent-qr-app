<template>
<div class="box flex-grow-1">
    <block-inventory v-for="inventory in inventories" :inventory="inventory"></block-inventory>
</div>
</template>

<script>
import MainPanel from "../layouts/MainPanel.vue";
import BlockInventory from "../ui/BlockInventory.vue";
export default {
    name: "MainPage",
    components: {MainPanel, BlockInventory},
    data(){
        return{
            inventories: [
                {name: 'testName', number_invent:101393219}
            ]
        }
    }
}
</script>

<style scoped>
.box{
    padding: 20px;
}
</style>
