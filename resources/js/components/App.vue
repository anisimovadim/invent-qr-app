<template>
    <main-panel></main-panel>
    <div class="container">
        <div class="alert alert-success" v-if="success">{{success}}</div>
        <div class="alert alert-danger" v-if="errorMessage">{{errorMessage}}</div>
    </div>
    <div class="container d-flex justify-content-between">
        <main-page></main-page>
        <panel-invent></panel-invent>
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
            errorMessage:''
        }
    },
    methods:{
        submitForm(){
            console.log(this.inventory);
            axios.post('/api/create/inventory', this.inventory)
                .then(response=>{
                    this.errorMessage=''
                    this.success= response.data
                    setTimeout(()=>{
                        this.success= ''
                    }, 5000)
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
        }
    }

}
</script>

<style scoped>

</style>
