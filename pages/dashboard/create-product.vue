<template>
    <section class="w-full h-[90vh] flex items-center justify-center">
        <div class="max-w-lg py-6 px-4 m-auto w-full">
            <h2 class="mb-2 font-semibold text-3xl">Create Product</h2>
            <form @submit.prevent="create" method="post" enctype="multipart/form-data">
                <div class="w-full mb-2">
                    <Input type="text" v-model="title" placeholder="Product Title" required />
                    <!-- <Error text="Product title required!" /> -->
                </div>

                <div class="w-full mb-2">
                    <Input type="text" v-model="seo" placeholder="SEO" required />
                    <!-- <Error text="Product seo required!" /> -->
                </div>

                <div class="w-full mb-2">
                    <Input type="text" v-model="description" placeholder="Description" required />
                    <!-- <Error text="Product description required!" /> -->
                </div>

                <div class="w-full mb-2">
                    <Input type="number" step="0.01" v-model="price" placeholder="Price" required />
                    <!-- <Error text="Product price required!" /> -->
                </div>

                <div class="w-full mb-2">
                    <Input type="file" step="0.01" @change="update" accept="image/*" required />
                    <!-- <Error text="Product price required!" /> -->
                </div>

                <Button text="Create Product" />

            </form>
        </div>
    </section>
</template>

<script setup>
    const title = ref("");
    const seo = ref("");
    const description = ref("");
    const price = ref(0.0);
    const content = ref("asdasdas");
    const image = ref(null);


    function update(event){
        image.value = event.target.files[0];
    }

    async function create(){
        await $fetch('/api/create-product', {
            method: "POST",
            headers: {
                'Accept': 'application/json'
            },
            body: {
                title: title.value,
                seo: title.seo,
                description: description.value,
                price: price.value,
                content: content.value,
                image: image.value,
            }
        });
    }

</script>