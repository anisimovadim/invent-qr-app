<template>
<div class="block">
    {{inventory.name}}
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
