<template>
    <div class="modal fade" id="createInventoryModal" tabindex="-1" aria-labelledby="createInventoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createInventoryModalLabel">Добавить инвентарь</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form @submit.prevent="$emit('submitForm')">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="number_invent" class="form-label">Номер инвентаря</label>
                            <input type="text" v-model="inventory.number_invent" id="type" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Введите тип</label>
                            <input type="text" placeholder="Например: ноутбук" v-model="inventory.type" id="type" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="model" class="form-label">Введите модель</label>
                            <input type="text" placeholder="Например: Acer m342t" v-model="inventory.model" id="model" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="character" class="form-label">Описание инвентаря</label>
                            <textarea name="character" id="character" v-model="inventory.character" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <select name="status" id="status" class="form-select" v-model="inventory.status">
                                <option value="no_select" selected disabled>Укажите состояние инвентаря</option>
                                <option value="good">Рабочее</option>
                                <option value="bad">Не рабочее</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cabinet" class="form-label">Укажите номер здания школы</label>
                            <input type="number" placeholder="1 или 2" v-model="inventory.number_building" id="cabinet" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="cabinet" class="form-label">Укажите кабинет для выдачи</label>
                            <input type="number" placeholder="Например: 220 или оставьте пустым" v-model="inventory.cabinet" id="cabinet" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="cabinet" class="form-label">Выдается кому</label>
                            <input type="text" placeholder="Иванов И.И." v-model="inventory.whome" id="cabinet" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-dark w-100">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ModalBlock",
    props:{
        inventory: Object
    }
}
</script>

<style scoped>

</style>
