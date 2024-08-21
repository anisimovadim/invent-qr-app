<template>
<div class="box flex-grow-1">
    <table class="table">
        <thead>
        <tr>
            <th>Номер инвент.</th>
            <th>Тип</th>
            <th>Модель</th>
            <th>Кабинет</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="inventory in inventories">
            <block-inventory
                :inventory="inventory"
                :select-eye="selectEye"
                @select-inventory="selectInventoryF"
                @click-trash="deleteEmit">
            </block-inventory>
        </tr>
        </tbody>
    </table>
</div>
</template>

<script>
import MainPanel from "../layouts/MainPanel.vue";
import BlockInventory from "../ui/BlockInventory.vue";
export default {
    name: "MainPage",
    emits: ["selectInventoryf", "deleteInventory"],
    components: {MainPanel, BlockInventory},
    props:{
        inventories: Array
    },
    data(){
        return{
            selectEye: 0
        }
    },
    methods:{
        selectInventoryF(number_invent){
            this.selectEye = number_invent;
            this.$emit('selectInventoryf', number_invent);
        },
        selectEyeInvent(id){
        },
        deleteEmit(inventory_id){
            this.$emit('deleteInventory', inventory_id)
        }
    }
}
</script>

<style scoped>
.box{
    padding: 20px;
}
</style>
