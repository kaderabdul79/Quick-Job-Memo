<template>
    <v-sheet class="text-center py-4 text-h5 title">
        <slot></slot> 
        <span class="botom-line"></span>
    </v-sheet>
</template>

<script setup>

</script>

<style scoped>
.title{
    position: relative;
}
.botom-line{
    position: absolute;
    width: 100px;
    height: 3px;
    background: #00ACC1;
    left: 50%;
    top: 90%;
    transform: translate(-50%,-50%);
}
</style>