<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    degree: '',
    institute: '',
    year: ''
});

const submit = () => {
    form.post(route('education.store'), {
        onFinish: () => form.reset(),
    });
};

</script>

<template>
    <AppLayout title="Add Education">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Education
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between gap-5">
                    <div class="bg-white w-4/5 overflow-hidden shadow-xl sm:rounded-lg p-10">
                        <form @submit.prevent="submit">
                            <div class="flex justify-center flex-wrap gap-4">
                                <div class="w-[50%]">
                                    <InputLabel for="degree" value="Degree" />
                                    <TextInput id="degree" v-model="form.degree" type="text"
                                        class="mt-1 block w-full" required autofocus autocomplete="degree" />
                                    <InputError class="mt-2" :message="form.errors.degree" />
                                </div>

                                <div class="w-[48%]">
                                    <InputLabel for="year" value="Year" />
                                    <TextInput id="year" v-model="form.year" type="number" min="1" class="mt-1 block w-full"
                                        required autocomplete="year" />
                                    <InputError class="mt-2" :message="form.errors.year" />
                                </div>
                                
                                <div class="w-full">
                                    <InputLabel for="institute" value="Institute" />
                                    <TextInput id="institute" v-model="form.institute" type="text" class="mt-1 block w-full"
                                        required autofocus autocomplete="institute" />
                                    <InputError class="mt-2" :message="form.errors.institute" />
                                </div>
                            </div>


                            <div class="flex items-center justify-end mt-4">

                                <PrimaryButton :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    Create
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
