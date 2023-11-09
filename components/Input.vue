<template>
    <input
    class="w-full bg-white rounded-lg border border-gray-300 focus:border-black focus:ring-4 focus:ring-black/10 text-base outline-none text-gray-700 p-2 px-3 leading-8 mb-2 transition-colors duration-200 ease-in-out"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
    />
</template>

<script setup>
    defineProps(['modelValue'])
    defineEmits(['update:modelValue'])
</script>