<template>
  <div>
    <AppHeader />
    <AppHero :products="allProducts" />
    <AppTopProducts :products="topProducts" />
  </div>
</template>

<script>
import Header from '~/components/Header.vue'
import Hero from '~/components/Hero.vue'
import TopProducts from '~/components/TopProducts'

export default {
  components: {
    AppHeader: Header,
    AppHero: Hero,
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
