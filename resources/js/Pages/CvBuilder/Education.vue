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
    <AppLayout title="Education">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Education
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                    <h1
                        class="mb-10 text-center text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                        Hello, <span
                            class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">
                            {{ $page.props.auth.user.name }}</span>
                    </h1>

                    <form @submit.prevent="submit">
                        <div class="flex flex-wrap gap-4">
                            <div>
                                <InputLabel for="degree" value="Degree" />
                                <TextInput id="degree" v-model="form.degree" type="text" class="mt-1 block w-full"
                                    required autofocus autocomplete="degree" />
                                <InputError class="mt-2" :message="form.errors.degree" />
                            </div>

                            <div>
                                <InputLabel for="year" value="Year" />
                                <TextInput id="year" v-model="form.year" type="number" min="1950"
                                    class="mt-1 block w-full" required autocomplete="year" />
                                <InputError class="mt-2" :message="form.errors.year" />
                            </div>
                        </div>


                        <div class="flex flex-wrap gap-4 mt-4">
                            <div>
                                <InputLabel for="institute" value="Institute" />
                                <TextInput id="institute" v-model="form.institute" type="text" class="mt-1 block w-full"
                                    required autofocus autocomplete="institute" />
                                <InputError class="mt-2" :message="form.errors.degree" />
                            </div>
                        </div>


                        <div class="flex items-center justify-end mt-4">

                            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">
                                Next
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
