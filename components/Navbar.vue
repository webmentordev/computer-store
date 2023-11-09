<template>
    <nav class="w-full">
        <div class="max-w-7xl font-semibold m-auto py-2 px-4 flex items-center justify-between">
            <NuxtLink to="/">Home</NuxtLink>
            <ul>
                <NuxtLink class="ml-5" to="/dashboard">Dashbord</NuxtLink>
                <NuxtLink class="ml-5" to="/dashboard/create-product">Create Product</NuxtLink>
            </ul>
        </div>
    </nav>
</template>