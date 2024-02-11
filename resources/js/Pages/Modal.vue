<script setup>
const props = defineProps({
  show: Boolean
})
</script>

<template>
  <Transition name="modal">
    <div v-if="show" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transition-opacity">
        <div class="modal-container bg-white w-80 md:w-96 p-6 rounded-lg shadow-lg">
            <div class="modal-header">
                <slot name="header">default header</slot>
            </div>

            <div class="modal-body">
                <form @submit.prevent="submitForm">
                    <div class="mb-4">
                        <label for="concepto" class="block text-sm font-medium text-gray-700">Concepto:</label>
                        <input type="text" id="concepto" v-model="concepto" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="mb-4">
                        <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad:</label>
                        <input type="number" id="cantidad" v-model="cantidad" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="mb-4">
                        <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo:</label>
                        <select id="tipo" v-model="tipo" class="mt-1 p-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="gasto">Gasto</option>
                            <option value="ingreso">Ingreso</option>
                        </select>
                    </div>
                    <button type="submit" class="modal-default-button bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">Guardar</button>
                </form>
            </div>

            <div class="modal-footer flex justify-end space-x-4">
                <slot name="footer">
                    <button class="modal-default-button bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none" @click="$emit('close')">Cancelar</button>
                </slot>
            </div>
        </div>
    </div>
  </Transition>
</template>

<style>
/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter-from, .modal-leave-to {
  opacity: 0;
}

.modal-enter-from .modal-container, .modal-leave-to .modal-container {
  @apply transform scale-110;
}
</style>
