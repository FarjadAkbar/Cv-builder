<script setup>
import { defineProps, computed } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';


const props = defineProps({
    basicInfo: Object
})

const { first_name, last_name, email, phone, profession, website, post_code, division, address } = props.basicInfo ?? {};
const form = useForm({
    first_name: first_name ?? '',
    last_name: last_name ?? '',
    email: email ?? '',
    phone: phone ?? '',
    profession: profession ?? '',
    website: website ?? '',
    post_code: post_code ?? '',
    division: division ?? '',
    address: address ?? ''
});

const submit = () => {
    form.post(route('basic-info.store'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <AppLayout title="Basic Info">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Basic Info
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between">
 
                    <div class="bg-white w-8/12 overflow-hidden shadow-xl sm:rounded-lg p-10">
                        <form @submit.prevent="submit">
                            <div class="flex justify-center flex-wrap gap-4">
                                <div class="w-[48%]">
                                    <InputLabel for="first_name" value="First Name" />
                                    <TextInput id="first_name" v-model="form.first_name" type="text"
                                        class="mt-1 block w-full" required autofocus autocomplete="first_name" />
                                    <InputError class="mt-2" :message="form.errors.first_name" />
                                </div>
                                <div class="w-[48%]">
                                    <InputLabel for="last_name" value="Last Name" />
                                    <TextInput id="last_name" v-model="form.last_name" type="text" class="mt-1 block w-full"
                                        required autofocus autocomplete="last_name" />
                                    <InputError class="mt-2" :message="form.errors.first_name" />
                                </div>
                                <div class="w-[48%]">
                                    <InputLabel for="email" value="Email" />
                                    <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full"
                                        required autocomplete="email" />
                                    <InputError class="mt-2" :message="form.errors.email" />
                                </div>

                                <div class="w-[48%]">
                                    <InputLabel for="phone" value="Phone Number" />
                                    <TextInput id="phone" v-model="form.phone" type="text" class="mt-1 block w-full"
                                        required autocomplete="phone" />
                                    <InputError class="mt-2" :message="form.errors.phone" />
                                </div>

                                <div class="w-[48%]">
                                    <InputLabel for="profession" value="Profession" />
                                    <TextInput id="profession" v-model="form.profession" type="text"
                                        class="mt-1 block w-full" required autocomplete="profession" />
                                    <InputError class="mt-2" :message="form.errors.profession" />
                                </div>

                                <div class="w-[48%]">
                                    <InputLabel for="website" value="Website" />
                                    <TextInput id="website" v-model="form.website" type="text" class="mt-1 block w-full"
                                        required autocomplete="website" />
                                    <InputError class="mt-2" :message="form.errors.website" />
                                </div>
                            
                                <div class="w-[48%]">
                                    <InputLabel for="address" value="Address" />
                                    <TextInput id="address" v-model="form.address" type="text" class="mt-1 block w-full"
                                        required autocomplete="address" />
                                    <InputError class="mt-2" :message="form.errors.address" />
                                </div>

                                <div class="w-[22%] mr-1">
                                    <InputLabel for="post_code" value="Post Code" />
                                    <TextInput id="post_code" v-model="form.post_code" type="number" min="1" class="mt-1 block w-full"
                                        required autocomplete="post_code" />
                                    <InputError class="mt-2" :message="form.errors.post_code" />
                                </div>

                                <div class="w-[24%]">
                                    <InputLabel for="division" value="Division" />
                                    <TextInput id="division" v-model="form.division" type="text" class="mt-1 block w-full"
                                        required autocomplete="division" />
                                    <InputError class="mt-2" :message="form.errors.division" />
                                </div>
                                
                            </div>


                            <div class="flex items-center justify-end mt-4">

                                <PrimaryButton class="me-1" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    Next
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>

                    <div class="w-1/5">
                        <img src="/img/cv.png" alt="" srcset="">
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
