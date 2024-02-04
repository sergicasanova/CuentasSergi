<script setup>

import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    movimientos: Object,
});


let baseImage = "https://picsum.photos/200/300?random=";

</script>

<template>
<div>
    <AppLayout title="Movimientos">

    <div class="bg-gradient-to-r from-blue-800 to-blue-400 min-h-screen p-8">
        <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-semibold text-white mb-6">Listado de movimientos</h1>

        <ul class="grid grid-cols-1 md:grid-cols-2  gap-4">
            <li class="bg-white p-6 rounded-lg shadow-md flex" v-for="movimiento in movimientos" :key="movimiento.id">
            <div class="flex-shrink-0">
                <img class="w-24 h-36 object-cover rounded" :src="`${baseImage}${movimiento.id}`" alt="Portada del Llibre">
            </div>
                <div class="ml-4">
                <h2 class="text-xl font-semibold mb-2">{{ movimiento.concepto }}</h2>
                <p class="text-blue-700">{{ movimiento.cantidad }}</p>
                <p class="text-blue-700 font-semibold">{{ movimiento.tipo }} €</p>
            </div>
            </li>
        </ul>
        </div>
    </div>

    </AppLayout>
</div>


</template>
