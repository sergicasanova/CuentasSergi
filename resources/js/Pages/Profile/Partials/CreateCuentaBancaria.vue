<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const cuentasInput = ref(null);

const form = useForm({
    iban: '',
    nombre_cuenta: '',
    entidad: '',
    saldo: '',
});

const updateCuentasBancarias = () => {
    form.post(route('cuentasbancarias.store'), {
        errorBag: 'updateCuentas',
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.iban) {
                form.reset('iban');
                cuentasInput.value.focus();
            }

            // Puedes manejar otros errores aquí si es necesario
        },
    });
};
</script>

<template>
    <FormSection @submitted="updateCuentasBancarias">
        <template #title>
            Introduce tus cuentas bancarias
        </template>

        <template #description>
            Añade tus cuentas bancarias para gestionar tus finanzas.
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="iban" value="IBAN" />
                <TextInput
                    id="iban"
                    ref="cuentasInput"
                    v-model="form.iban"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.iban" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="nombre_cuenta" value="Nombre de Cuenta" />
                <TextInput
                    id="nombre_cuenta"
                    v-model="form.nombre_cuenta"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.nombre_cuenta" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="entidad" value="Entidad" />
                <TextInput
                    id="entidad"
                    v-model="form.entidad"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.entidad" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="saldo" value="Saldo" />
                <TextInput
                    id="saldo"
                    v-model="form.saldo"
                    class="mt-1 block w-full"
                />
                <InputError :message="form.errors.saldo" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Saved.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </PrimaryButton>
        </template>
    </FormSection>
</template>
