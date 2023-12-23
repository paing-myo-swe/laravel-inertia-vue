<template>
    <section class="p-6 bg-gray-300">
        <header class="flex justify-between">
            <div class="flex">
                <h1 class="font-bold text-lg">My App</h1>
                <p class="ml-4">Welcome Back! {{ $page.props.auth.user.username }}</p>
            </div>
            
            <Nav></Nav>
        </header>
    </section>
    <section class="p-6">
        <div class="max-w-3xl mx-auto">
            <slot></slot>
        </div>
    </section>
</template>

<script setup>
import Nav from '@/Shared/Nav.vue';
</script>