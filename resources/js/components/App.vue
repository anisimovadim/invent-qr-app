<template>
    <main-panel></main-panel>
    <div class="container d-flex justify-content-between">
        <main-page></main-page>
        <panel-invent></panel-invent>
    </div>
</template>

<script>
import MainPage from "./pages/MainPage.vue";
import MainPanel from "./layouts/MainPanel.vue";
import PanelInvent from "./layouts/PanelInvent.vue";
export default {
    name: "App",
    components: {MainPage, MainPanel, PanelInvent}

}
</script>

<style scoped>

</style>
