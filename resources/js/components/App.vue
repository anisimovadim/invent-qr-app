<template>
        <main-panel></main-panel>
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
            }
        }
    },
    methods:{
        submitForm(){
            console.log(this.inventory);
            axios.post('/api/create/inventory', this.inventory)
                .then(response=>{
                    console.log(response)
                })
                .catch(error=>{
                    console.log(error)
                })
        }
    }

}
</script>

<style scoped>

</style>
