<template>
    <Head title="Login" />
    <main class="grid place-items-center min-h-screen">
        <section class="bg-white p-8 rounded-md border max-w-md mx-auto">
            <h1 class="text-3xl">Login</h1>
            <form @submit.prevent="submit" class="mt-7">
                <div class="mb-3">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="relative mt-2 rounded-md shadow-sm">
                        <input
                            v-model="form.email"  
                            type="text" 
                            name="email" 
                            id="email" 
                            class="block w-full rounded-md border-0 py-1.5 pl-3 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-sm mt-1"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="relative mt-2 rounded-md shadow-sm">
                        <input
                            v-model="form.password" 
                            type="password" 
                            name="password" 
                            id="password" 
                            class="block w-full rounded-md border-0 py-1.5 pl-3 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-sm mt-1"></div>
                    </div>
                </div>
                <div>
                    <button 
                        type="submit" 
                        :disabled="form.processing" 
                        class="rounded-md px-4 py-2 bg-indigo-600 text-sm text-white shadow-sm hover:bg-indigo-500">Login</button>
                </div>
            </form>
        </section>
    </main>
</template>

<script>
export default {
    layout: null
}
</script>

<script setup>
import { useForm } from '@inertiajs/vue3';

let form = useForm({
    'email': '',
    'password': ''
});

let submit = () => {
    form.post('/login');
}
</script>