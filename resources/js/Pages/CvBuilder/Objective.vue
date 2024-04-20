<script setup>
import { defineProps, computed } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputArea from '@/Components/InputArea.vue';


const props = defineProps({
    objective: Object
})

const { career_object } = props.objective ?? {};
const form = useForm({
    career_object: career_object ?? ''
});

const submit = () => {
    form.post(route('objective.store'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <AppLayout title="Objective">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Objective
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between gap-5">
 
                    <div class="bg-white w-4/5 overflow-hidden shadow-xl sm:rounded-lg p-10">
                        <form @submit.prevent="submit">
                            <div class="flex justify-center flex-wrap gap-4">
                                <div class="w-full">
                                    <InputLabel for="career_object" value="Career Object" />
                                    <InputArea id="career_object" v-model="form.career_object" type="text"
                                        class="mt-1 block w-full" required autofocus autocomplete="career_object" />
                                    <InputError class="mt-2" :message="form.errors.career_object" />
                                </div>
                            </div>


                            <div class="flex items-center justify-end mt-4">

                                <PrimaryButton class="me-2" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    Next
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>

                    <div class="w-1/5">
                        <img src="/img/cv.jpg" alt="" srcset="">
                        <h5 class="text-md text-gray-400 mt-2 font-bold text-center">This is a Demo Resume.</h5>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
