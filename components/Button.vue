<template>
    <button type="submit" class="w-full py-4 px-3 bg-black rounded-lg text-white font-semibold">{{ text }}</button>
</template>

<script setup>
    defineProps(['text'])
</script>