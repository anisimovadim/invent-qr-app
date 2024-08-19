<template>
    <main-panel></main-panel>
    <div class="container">
        <div class="alert alert-success" v-if="success">{{success}}</div>
        <div class="alert alert-danger" v-if="errorMessage">{{errorMessage}}</div>
    </div>
    <div class="container d-flex justify-content-between">
        <main-page :inventories="inventories"
                   @select-inventoryf="selectInventoryFunc"
                   @delete-inventory="deleteInventoryFunc"></main-page>
        <panel-invent :inventory="selectInventory"></panel-invent>
    </div>
    <modal-block :inventory="inventory" @submit-form="submitForm"></modal-block>
</template>

<script>
import MainPage from "./pages/MainPage.vue";
import MainPanel from "./layouts/MainPanel.vue";
import PanelInvent from "./layouts/PanelInvent.vue";
import ModalBlock from "./ui/ModalBlock.vue";
import axios from "axios";
export default {
    name: "App",
    components: {MainPage, MainPanel, PanelInvent, ModalBlock},
    data(){
        return{
            inventory:{
                number_invent: '',
                type:'',
                model:'',
                character:'',
                status:'no_select',
                cabinet:''
            },
            success:'',
            errorMessage:'',
            inventories:[],
            selectInventory:{}
        }
    },
    mounted() {
        this.getInventories();
    },
    methods:{
        getInventories(){
            axios.get('/api/inventories')
                .then(res=>{
                    this.inventories = res.data
                })
        },
        submitForm(){
            console.log(this.inventory);
            axios.post('/api/create/inventory', this.inventory)
                .then(response=>{
                    this.errorMessage=''
                    this.success= response.data;
                    this.getInventories();
                    setTimeout(()=>{
                        this.success= ''
                    }, 5000);
                    console.log(response)
                })
                .catch(error=>{
                    this.success='';
                    this.errorMessage = 'Инвентарь с таким номером уже существует!';
                    setTimeout(()=>{
                        this.errorMessage= ''
                    }, 5000)
                    console.log(error)
                })
        },
        selectInventoryFunc(number_invent){
            this.selectInventory = this.inventories.find(el=>el.number_invent===number_invent);
            console.log(this.selectInventory)
        },
        deleteInventoryFunc(inventory_id){
            console.log(inventory_id)
            axios.post('/api/delete/inventory', {id:inventory_id})
                .then(res=>{
                    this.success = res.data;
                    this.getInventories();
                    setTimeout(()=>{
                        this.success= ''
                    }, 5000);
                })
                .catch(err=>{
                    this.errorMessage = err.data;
                    setTimeout(()=>{
                        this.errorMessage= ''
                    }, 5000)
                })
        }
    }

}
</script>

<style scoped>

</style>
