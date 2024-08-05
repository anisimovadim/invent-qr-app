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
            <block-inventory :inventory="inventory"></block-inventory>
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
    components: {MainPanel, BlockInventory},
    data(){
        return{
            inventories: [
                {
                    number_invent:101393219,
                    model: 'acer m43',
                    character:'',
                    type:'notebook',
                    cabinet: 104,
                    src_qrcode:''
                }
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
