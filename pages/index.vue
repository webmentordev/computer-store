<template>
    <section class="w-full">
        <Icon name="uil:facebook" color="black" />
        <h2 v-if="string">{{ string }}</h2>
        <button class="p-3 inline-block px-5 bg-black text-white ml-3 mt-5" @click="callIt">Call It</button>
    </section>
</template>

<script setup>
    const string = ref(null);
    const callIt = async () => {
        const data = await $fetch('http://127.0.0.1:8000/');
        string.value = data.Laravel;
        console.log(data.Laravel);
    }
</script>