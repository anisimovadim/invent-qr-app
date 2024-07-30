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
                    <button class="btn btn-dark">Добавить инвентарь +</button>
                    <button class="btn btn-dark">Распечатать всё</button>
                </div>
            </div>
        </div>
    </nav>
</div>
</template>

<script>
export default {
    name: "MainPanel"
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
