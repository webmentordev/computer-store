// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  modules: [
    '@nuxtjs/tailwindcss',
    'nuxt-icon'
  ],
  runtimeConfig:{
    "api": process.env.API,
    public: {
      "api": process.env.API,
    }
  },
  app:{
    head: {
      title: "PC House — Computer Store",
      charset: 'utf-8',
      viewport: 'width=device-width, initial-scale=1',
      meta: [
        {
          name: "description",
          content: "Purchase PC parts at cheap price in Pakistan with 2 Business Days delivery time at over pakistan!"
        }
      ]
    }
  },
  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {},
    },
  },
})
