<template>
    <nav class="ml-6">
        <ul class="flex space-x-4 list-inside">
            <li>
                <NavLink 
                    href="/" 
                    :active="$page.component === 'Home'"
                >
                    Home
                </NavLink>
            </li>
            <li>
                <NavLink 
                    href="/users" 
                    :active="$page.component === 'Users'"
                >
                    Users
                </NavLink>
            </li>
            <li>
                <NavLink 
                    href="/settings"
                    class="text-blue-500 hover:underline"
                    :active="$page.component === 'Settings'"
                >
                    Settings
                </NavLink>
            </li>
        </ul>
    </nav>
</template>

<script setup>
import NavLink from '@/Shared/NavLink.vue';
</script>