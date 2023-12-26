<template>
    <Head title="Create New User" />
    <div>
        <h1 class="text-3xl font bold">Create New User</h1>

        <form @submit.prevent="submit" class="mt-7 max-w-md mx-auto">
            <div class="mb-3">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    <input
                        v-model="form.name" 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="block w-full rounded-md border-0 py-1.5 pl-3 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <div v-if="form.errors.name" v-text="$page.props.errors.name" class="text-red-500 text-sm mt-1"></div>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    <input
                        v-model="form.email"  
                        type="text" 
                        name="email" 
                        id="email" 
                        class="block w-full rounded-md border-0 py-1.5 pl-3 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <div v-if="form.errors.email" v-text="$page.props.errors.email" class="text-red-500 text-sm mt-1"></div>
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
                        <div v-if="form.errors.password" v-text="$page.props.errors.password" class="text-red-500 text-sm mt-1"></div>
                </div>
            </div>
            <div>
                <button 
                    type="submit" 
                    :disabled="form.processing" 
                    class="rounded-md px-4 py-2 bg-indigo-600 text-sm text-white shadow-sm hover:bg-indigo-500">Submit</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

let form = useForm({
    name: '',
    email: '',
    password: ''
});

let submit = () => {
    form.post('/users');
}

</script>