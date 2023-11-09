export default defineEventHandler(async (event) => {
    const body = await readBody(event);
    const config = useRuntimeConfig();
    console.log(body);
    const data = await $fetch(`${config.api}/api/product/create`, {
      method: "POST",
      headers: {
        "Accept": "application/json"
      },
      body: body
    });
    console.log(data);
    return data;
});