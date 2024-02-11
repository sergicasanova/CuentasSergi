<script setup>

import AppLayout from '@/Layouts/AppLayout.vue';
import Modal from './Modal.vue';
import { ref } from 'vue';
import axios from 'axios';

defineProps(['cuentas_bancarias', 'movimientos']);

const showModal = ref(false)

const eliminarMovimiento = async (id) => {
  try {
    await axios.delete(`/movimientos/${id}`);
    console.log('Movimiento eliminado correctamente');
    // Aquí puedes realizar cualquier acción adicional después de eliminar el movimiento, como recargar la lista de movimientos
  } catch (error) {
    console.error('Error al eliminar el movimiento:', error);
  }
};
let baseImage = "https://picsum.photos/200/300?random=";

</script>

<template>
<div>
    <AppLayout title="Movimientos">
        <div class="flex bg-gradient-to-r from-blue-800 to-blue-400 min-h-screen p-8 space-x-4">
            <div class="max-w-7xl mx-auto">
                <h1 class="text-3xl font-semibold text-white mb-6">Listado de movimientos</h1>

                <ul class="grid grid-cols-3 gap-4">
                    <li class="bg-white p-6 rounded-lg shadow-md flex relative" v-for="movimiento in movimientos" :key="movimiento.id">
                        <div class="flex-shrink-0">
                            <img class="w-24 h-36 object-cover rounded" :src="`${baseImage}${movimiento.id}`" alt="Portada del Llibre">
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold mb-2">{{ movimiento.concepto }}</h2>
                            <p class="text-blue-700">{{ movimiento.cantidad }}</p>
                            <p class="text-blue-700 font-semibold">{{ movimiento.tipo }} €</p>
                            <p class="text-blue-700">id cuenta bancaria: {{ movimiento.cuentas_bancarias_id }}</p>
                        </div>
                        <div class="absolute top-0 right-0 mt-2 mr-2">
                            <button @click="eliminarMovimiento(movimiento.id)"><i class="fas fa-trash"></i></button>
                            <button class="ml-2" id="show-modal" @click="showModal = true"><i class="fas fa-edit"></i></button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <Teleport to="body">
            <!-- use the modal component, pass in the prop -->
            <modal :show="showModal" @close="showModal = false">
                <template #header>
                    <h3>custom header</h3>
                </template>
            </modal>
        </Teleport>
    </AppLayout>
</div>


</template>
