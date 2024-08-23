<template>
    <div class="modal fade" id="printModal" tabindex="-1" aria-labelledby="printModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="printModalLabel">Выберите кабинеты для печати</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-grid gtp">
                        <div v-for="cabinet in cabinets">
                            <input @change="console.log(selectCabinets)"
                                   :id="`cabinet_${cabinet}`" type="checkbox"
                                   :value="cabinet" class="form-check-input"
                                   v-model="selectCabinets">
                            <label :for="`cabinet_${cabinet}`" class="form-check-label">{{cabinet}}</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark w-100" @click="handlePrint">Распечатать</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';
import {generatePdf} from "../../generate_document.js";
import axios from "axios";
export default {
    name: "PrintModal",
    props:{
        cabinets: Array
    },
    setup(){
        const selectCabinets = ref([]);
        const data = ref([]);

        const getQrCodes = async () => {
            try {
                const response = await axios.post('/api/inventories/qr', {cabinets: selectCabinets.value});
                data.value = response.data;
                console.log(response.data);
            }
            catch (e){
                console.error(e);
            }
            finally {
                await generatePdf(data.value)
            }
        }

        const handlePrint = () => {
            console.log('clickPront')
            getQrCodes();
        }

        return{
            selectCabinets,
            handlePrint
        }
    }
}
</script>

<style scoped>
.gtp{
    grid-template-rows: repeat(4, 1fr); /* Указываем 4 строки */
    grid-auto-flow: column;
    gap: 10px;
}
</style>
