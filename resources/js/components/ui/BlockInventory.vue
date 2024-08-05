<template>
<div class="block">
    {{inventory.number_invent}}
</div>
</template>

<script>
export default {
    name: "BlockInventory",
    props:{
        inventory: Object
    }
}
</script>

<style scoped>

</style>
