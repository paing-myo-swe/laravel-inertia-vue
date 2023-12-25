<template>
    <Head title="Users" />
    <div class="flex justify-between mb-6">
        <div class="flex items-center">
            <h1 class="text-3xl font-bold">
                Users
            </h1>
            <Link href="/users/create" class="text-blue-500 ml-2 text-sm">New User</Link>
        </div>
        <input type="text" placeholder="Search..." class="border px-3 rounded-lg" v-model="search"/>
    </div>
    <div class="mt-5">
        <ul role="list" class="divide-y divide-gray-100">
            <li v-for="user in users.data" :key="user.id" class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ user.name }}</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <Link :href="`users/${user.id}/edit`" class="text-sm leading-6 text-gray-900">Edit</Link>
                </div>
            </li>
        </ul>
    </div>

    <Pagination :links="users.links" class="mt-6"></Pagination>
</template>

<script setup>
import Pagination from '@/Shared/Pagination.vue';
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3'

let props = defineProps({
    users: Object,
    filters: Object,
});

let search = ref(props.filters.search);

watch(search, value => {
    router.get('/users', { 'search': value }, {
        replace: true,
        preserveState: true,
    });
});

</script>