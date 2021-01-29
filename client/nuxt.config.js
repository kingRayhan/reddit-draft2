export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    titleTemplate: "%s - Reddit",
    htmlAttrs: {
      lang: "en"
    },
    meta: [
      { charset: "utf-8" },
      { name: "viewport", content: "width=device-width, initial-scale=1" },
      { hid: "description", name: "description", content: "" }
    ],
    link: [{ rel: "icon", type: "image/x-icon", href: "/favicon.ico" }]
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: ["@/assets/styles/app.scss"],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: ["@nuxtjs/tailwindcss"],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: ["@nuxtjs/axios", "@nuxtjs/auth"],

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {},

  tailwindcss: {
    cssPath: "~/assets/styles/app.scss"
  },

  axios: {
    baseURL: process.env.NUXT_ENV_APP_API
  },

  auth: {
    strategies: {
      local: {
        endpoints: {
          login: { url: "/api/auth/login", method: "post" },
          logout: { url: "/api/auth/logout", method: "post" },
          user: { url: "/api/auth/user", method: "get", propertyName: null }
        }
      }
    },
    redirect: {
      login: "/",
      logout: "/",
      callback: "/",
      home: "/"
    }
  }
};
