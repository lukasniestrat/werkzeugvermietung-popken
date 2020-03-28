
export default {
  mode: 'universal',
  /*
  ** Headers of the page
  */
  head: {
    title: 'Werkzeug-, Geräte- & Partyzeltzubehör J. Popken',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      {
        hid: 'description',
        name: 'description',
        content: '✓ Werkzeuge ✓ Gartengeräte ✓ Partyzeltzubehör ✓ WC-Wagen ✓ PKW-Anhänger - Wir haben für jeden was dabei, schnell und einfach!'
      },
      { name: 'author', content: 'Werkzeugvermietung Popken' },
      { itemprop: 'copyrightHolder', content: 'Werkzeugvermietung Popken' },
      { itemprop: 'copyrightYear', content: '2019' },
      { itemprop: 'isFamilyFriendly', content: 'true' },
      { itemprop: 'image', content: '/logo.png' },
      { property: 'og:site_name', content:'Werkzeugvermietung Popken' },
      { property: 'og:title', content:'Werkzeug-, Geräte- & Partyzeltzubehör J. Popken' },
      { property: 'og:description', content:'✓ Werkzeuge ✓ Gartengeräte ✓ Partyzeltzubehör ✓ WC-Wagen ✓ PKW-Anhänger - Wir haben für jeden was dabei, schnell und einfach!' },
      { property: 'og:url', content:'https://werkzeugvermietung-popken.de' },
      { property: 'og:image', content:'https://werkzeugvermietung-popken.de/werkzeugvermietung-popken-og.jpg' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.png' },
      { rel: 'canonical', href: 'https://werkzeugvermietung-popken.de' }
    ],
    bodyAttrs: {
      'itemtype': 'http://schema.org/WebPage',
      'itemscope': 'itemscope',
    },
    htmlAttrs: {
      'lang': 'de'
    }
  },
  /*
  ** Customize the progress-bar color
  */
  loading: { color: '#fff' },
  /*
  ** Global CSS
  */
  css: [
    '@/assets/styles/main.scss'
  ],
  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    '@/plugins/clickoutside.js'
  ],
  /*
  ** Nuxt.js dev-modules
  */
  buildModules: [
    // Doc: https://github.com/nuxt-community/eslint-module
    '@nuxtjs/eslint-module',
    // Doc: https://github.com/nuxt-community/stylelint-module
    '@nuxtjs/stylelint-module',
    '@nuxtjs/gtm'
  ],

  gtm: {
    id: 'GTM-KN369N3'
  },
  /*
  ** Nuxt.js modules
  */
  modules: [
    // Doc: https://axios.nuxtjs.org/usage
    '@nuxtjs/axios'
  ],
  /*
  ** Axios module configuration
  ** See https://axios.nuxtjs.org/options
  */
  axios: {
  },
  /*
  ** Build configuration
  */
  build: {
    /*
    ** You can extend webpack config here
    */
    extend (config, ctx) {
    }
  }
}
