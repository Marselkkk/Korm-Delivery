// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2025-07-15',
  devtools: { enabled: true },

  runtimeConfig: {
    public: {
      apiBase: 'http://31.58.46.72/api'
    }
  },

  css: [
    '~/assets/styles/main.css',
  ],
  vite: {
    css: {
      preprocessorOptions: {
        scss: {
          additionalData: `
            @import "@/assets/styles/base/kit.scss";
            @import "@/assets/styles/base/mixins.scss";
            @import "@/assets/styles/containers/media.scss";
          `,
        },
      },
    },
  },
})
