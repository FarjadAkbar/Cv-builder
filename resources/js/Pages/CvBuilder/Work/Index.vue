<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import DialogModal from '@/Components/DialogModal.vue';


const confirmingDeletion = ref(false);

const form = useForm({
    id: null
});

defineProps({
    work: Object
})


const confirmDeletion = (id) => {
    form.id = id;
    confirmingDeletion.value = true;
};


const deleteData = () => {
    form.delete(route('work.destroy', form.id), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
    });
};


const closeModal = () => {
    confirmingDeletion.value = false;
};
</script>

<template>
    <AppLayout title="Work">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Work
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-bold">Your Work History</h3>
                        <Link :href="route('work.create')">
                        <PrimaryButton>
                            Add Work
                        </PrimaryButton>
                        </Link>
                    </div>


                    <table class="w-full text-sm mt-5 text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Company
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Position
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Year
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-if="work.length > 0" v-for="wrk in work" :key="wrk.id">
                                <td class="px-6 py-4">
                                    {{ wrk.company_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ wrk.position }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ wrk.year }}
                                </td>
                                <td class="px-6 py-4">
                                    <Link :href="route('work.edit', wrk.id)"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</Link>
                                    <button type="button" @click="confirmDeletion(wrk.id)"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Delete</button>
                                </td>
                            </tr>
                            <tr v-else>
                                <td class="px-6 py-4 text-center" colspan="4">No data found</td>
                            </tr>
                        </tbody>
                    </table>

                    ​
                </div>
            </div>
        </div>

        
            <!-- Delete Work Confirmation Modal -->
            <DialogModal :show="confirmingDeletion" @close="closeModal">
                <template #title>
                    Delete Work
                </template>

                <template #content>
                    Are you sure you want to delete this? 
                </template>

                <template #footer>
                    <SecondaryButton @click="closeModal">
                        Cancel
                    </SecondaryButton>

                    <DangerButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteData"
                    >
                        Delete
                    </DangerButton>
                </template>
            </DialogModal>
    </AppLayout>
</template>
