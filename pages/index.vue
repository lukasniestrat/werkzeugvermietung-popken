<template>
  <div>
    <AppHeader />
    <AppHero />
  </div>
</template>

<script>
import Header from '~/components/Header.vue'
import Hero from '~/components/Hero.vue'

export default {
  components: {
    AppHeader: Header,
    AppHero: Hero
  }
}
</script>
