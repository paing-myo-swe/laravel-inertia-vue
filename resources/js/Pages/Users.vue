<template>
    <h1 class="text-3xl font-bold">
        Users
    </h1>
    <div style="margin-top: 500px;">
        <p>The current time is {{  time }}</p>
        <Link href="/users" preserve-scroll>Refresh</Link>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    time: String,
});
</script>