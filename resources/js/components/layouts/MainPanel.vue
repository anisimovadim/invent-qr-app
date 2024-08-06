<template>
<div>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <div class="w-100 grid-box">
                <div class="grid-box1">
                    <input type="text" class="form-control" placeholder="Поиск">
                    <select name="" id="" class="form-select">
                        <option disabled selected>Фильтрация</option>
                        <option>Фильтрация2</option>
                    </select>
                </div>
                <div class="grid-box2">
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#createInventoryModal">Добавить инвентарь +</button>
                    <button class="btn btn-light">Печать</button>
                </div>
            </div>
        </div>
    </nav>
</div>
</template>

<script>
import ModalBlock from "../ui/ModalBlock.vue";
export default {
    name: "MainPanel",
    components:{ModalBlock}
}
</script>

<style scoped>
.grid-box1{
    display: flex;
    gap: 20px;
}
.grid-box{
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 20px;
}
.grid-box2{
    display: flex;
    gap: 20px;
}
</style>
