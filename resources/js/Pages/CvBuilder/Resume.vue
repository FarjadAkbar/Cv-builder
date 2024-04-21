<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
    data: Object
})

</script>

<template>
    <AppLayout title="My Resume">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                My Resume
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                    <div class="flex justify-end mb-3">
                        <a href="/pdf-download">
                        <PrimaryButton class="shadow-lg">
                            Download
                        </PrimaryButton>
                        </a>
                    </div>
                    <div class="bg-[#f1f1f1] p-5 text-center">
                        <h1 class="text-4xl">Curriculum Vitae</h1>
                        <h2 class="text-2xl">{{ data['basicInfo'].first_name }} {{ data['basicInfo'].last_name }}</h2>
                        <p><small>{{ data['basicInfo'].profession }}</small></p>
                    </div>
                    <div>
                        <section class="px-1 py-3 border-b">
                            <h3 class="text-xl font-bold">Contact Information</h3>
                            <p class="text-sm leading-6">Address: {{ data['basicInfo'].address }}, {{
                                data['basicInfo'].division
                                }}, {{ data['basicInfo'].post_code }}</p>
                            <p class="text-sm leading-6">Email: {{ data['basicInfo'].email }}</p>
                            <p class="text-sm leading-6">Website: {{ data['basicInfo'].website }}</p>
                            <p class="text-sm leading-6">Phone: {{ data['basicInfo'].phone }}</p>
                        </section>
                        <section class="px-1 py-3 border-b">
                            <h3 class="text-xl font-bold">Objective</h3>
                            <p class="text-sm leading-6">{{ data['objective'].career_object }}</p>
                        </section>
                        <section class="px-1 py-3">
                            <h3 class="text-xl font-bold">Education</h3>
                            <table>
                                <tr style="background-color: #f1f1f1;">
                                    <th scope="col">Degree / Diploma</th>
                                    <th scope="col">Institue</th>
                                    <th scope="col">Year</th>
                                </tr>
                                <tr v-for="edu in data['educations']">
                                    <td>{{ edu.degree }}</td>
                                    <td>{{ edu.institute }}</td>
                                    <td>{{ edu.year }}</td>
                                </tr>
                            </table>
                        </section>
                        <section class="px-1 py-3">
                            <h3 class="text-xl font-bold">Work Experience</h3>
                            <table>
                                <tr style="background-color: #f1f1f1;">
                                    <th>Company Name</th>
                                    <th>Position</th>
                                    <th>Year</th>
                                </tr>
                                <tr v-for="wrk in data['works']">
                                    <td>{{ wrk.company_name }}</td>
                                    <td>{{ wrk.position }}</td>
                                    <td>{{ wrk.year }}</td>
                                </tr>
                            </table>
                        </section>
                        <section class="px-1 py-3">
                            <h3 class="text-xl font-bold">Professional Qualification</h3>
                            <table>
                                <tr style="background-color: #f1f1f1;">
                                    <th>Title</th>
                                    <th>Regulated Body</th>
                                    <th>Year</th>
                                </tr>
                                <tr v-for="cer in data['certificates']">
                                    <td>{{ cer.certificate_name }}</td>
                                    <td>{{ cer.about }}</td>
                                    <td>{{ cer.year }}</td>
                                </tr>
                            </table>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 5px;
}

th,
td {
    font-size: 0.9em;
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
</style>