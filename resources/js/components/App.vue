<template>
    <main-panel></main-panel>
    <div class="container">
        <main-page></main-page>
    </div>
</template>

<script>
import MainPage from "./pages/MainPage.vue";
import MainPanel from "./layouts/MainPanel.vue";
export default {
    name: "App",
    components: {MainPage, MainPanel}

}
</script>

<style scoped>

</style>
