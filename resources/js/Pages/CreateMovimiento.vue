<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const form = useForm({
  concepto: '',
  cantidad: 0,
  tipo: 'gasto',
  cuentas_bancarias_id: 1,
});

defineProps(['cuentas_bancarias', 'movimientos']);
</script>

<template>
    <AppLayout title="CreateMovimientos">
  <div class="bg-gradient-to-r from-blue-800 text-white min-h-screen flex items-center justify-center">
    <div class="max-w-md mx-auto p-8 bg-black rounded shadow-lg">
      <h1 class="text-3xl font-bold mb-6">Crear un movimiento</h1>

      <form @submit.prevent="form.post('/movimientos')" class="space-y-4 from-blue-800" >
        <div>
          <label for="concepto" class="block text-lg mb-2">Concepto</label>
          <input
            type="text"
            v-model="form.concepto"
            placeholder="Concepto"
            id="concepto"
            class="w-full px-4 py-2 border rounded bg-blue-800 text-white"
          />
          <div v-if="form.errors.concepto" class="text-red-500 mt-2">
            {{ form.errors.concepto }}
          </div>
        </div>

        <div>
          <label for="cantidad" class="block text-lg mb-2">Cantidad</label>
          <input
            type="text"
            v-model="form.cantidad"
            placeholder="Cantidad"
            id="cantidad"
            class="w-full px-4 py-2 border rounded bg-blue-800 text-black"
          />
          <div v-if="form.errors.cantidad" class="text-red-500 mt-2">
            {{ form.errors.cantidad }}
          </div>
        </div>

        <div>
          <label for="tipo" class="block text-lg mb-2">Tipo</label>
          <select
            v-model="form.tipo"
            id="tipo"
            class="w-full px-4 py-2 border rounded bg-blue-800 text-black"
          >
            <option value="gasto">Gasto</option>
            <option value="ingreso">Ingreso</option>
          </select>
          <div v-if="form.errors.tipo" class="text-red-500 mt-2">
            {{ form.errors.tipo }}
          </div>
        </div>

        <div>
          <label for="cuentas_bancarias_id" class="block text-lg mb-2">Cuenta Bancaria</label>
          <select
            v-model="form.cuentas_bancarias_id"
            id="cuentas_bancarias_id"
            class="w-full px-4 py-2 border rounded bg-blue-800 text-black"
          >
            <option v-for="cuenta in cuentas_bancarias" :key="cuenta.id" :value="cuenta.id">
             {{ cuenta.nombre_cuenta }}
            </option>
          </select>
        </div>

        <button type="submit" :disabled="form.processing" class="w-full px-4 py-2 bg-blue-500 text-black rounded">
          Agregar Movimiento
        </button>
      </form>

    </div>
  </div>
</AppLayout>
</template>
