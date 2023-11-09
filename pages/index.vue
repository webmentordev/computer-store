<template>
    <section class="w-full">
        <Icon name="uil:facebook" color="black" />
        <h2 v-if="string">{{ string }}</h2>
        <button class="p-3 inline-block px-5 bg-black text-white ml-3 mt-5" @click="callIt">Call It</button>
        <button class="p-3 inline-block px-5 bg-black text-white ml-3 mt-5" @click="loginHandler">Login</button>
    </section>
</template>

<script setup>
    import axios from 'axios';
    axios.defaults.withCredentials = true;
    axios.defaults.baseURL = useRuntimeConfig().public.api;

    const string = ref(null);
    const email = ref("ahmer@gmail.com");
    const password = ref("password");

    const callIt = async () => {
        const data = await $fetch('http://127.0.0.1:8000/');
        string.value = data.Laravel;
        console.log(data);

        
    }

    async function loginHandler(){
        const { data, error } = await useFetch('http://localhost:8000/api/login', {
            method: 'POST',
            credentials: 'include',
            headers: {
                'Accept': "application/json"
            },
            body: {
                email: email.value,
                password: password.value
            }
        });
        console.log([data.value, error.message]);
    }
</script>