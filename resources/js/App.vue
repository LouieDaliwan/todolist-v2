<script setup>
import SideBar from './Nav/Sidebar.vue';
</script>

<template>
    <div class="flex container-2xl bg-slate-900 h-screen">
        <SideBar></SideBar>

        <router-view></router-view>
    </div>
</template>



