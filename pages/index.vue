<template>
  <div>
    <AppHeader />
    <AppHero :products="allProducts" />
    <AppContact />
    <AppTopProducts :products="topProducts" />
  </div>
</template>

<script>
import Header from '~/components/Header.vue'
import Hero from '~/components/Hero.vue'
import TopProducts from '~/components/TopProducts'
import Contact from '~/components/Contact'

export default {
  components: {
    AppHeader: Header,
    AppHero: Hero,
    AppContact: Contact,
    AppTopProducts: TopProducts
  },
  computed: {
    allProducts () {
      return this.$store.getters.allProducts
    },
    topProducts () {
      return this.$store.getters.topProducts
    }
  },
  created () {
    this.$store.dispatch('loadProducts')
  }
}
</script>
