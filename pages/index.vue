<template>
  <div>
    <AppHeader />
    <AppHero :products="allProducts" />
    <AppContact />
    <AppTopProducts :products="topProducts" />
    <div id="werkzeuge-garten" class="section section--spacing section--spacing--nosm">
      <div class="section__inner">
        <AppArticleTable :products="tools" headline="Werkzeuge" />
        <AppArticleTable :products="gardenTools" headline="Gartengeräte" />
      </div>
    </div>
    <div id="wcwagen-anhaenger" class="section section--spacing section--spacing--nosm">
      <div class="section__inner">
        <AppArticleTable :products="toilets" headline="WC-Wagen" />
        <AppArticleTable :products="trailer" headline="Anhänger" />
      </div>
    </div>
    <div id="partyzeltzubehoer" class="section section--spacing section--spacing--nosm">
      <div class="section__inner">
        <AppArticleTable :products="partySupplies" headline="Partyzeltzubehör" />
      </div>
    </div>
    <div class="about">
      <div class="section section--spacing">
        <div class="section__inner section__inner">
          <div class="about__text">
            <p>Wir sind Ihr kompetenter Partner wenn es um die Vermietung von <a href="#werkzeuge-garten" title="Zu unseren Werkzeugen">Werkzeugen</a>, <a href="#werkzeuge-garten" title="Zu unseren Werkzeugen">Gartengeräte</a> und <a href="#partyzeltzubehoer-wcwagen" title="Zu unserem Partyzeltzubehör">Partyzeltzubehör</a> geht. Seit mittlerweile 20 Jahren stehen wir für <strong>Qualität</strong>, <strong>Zuverlässigkeit</strong> und <strong>professionelle Fachkompetenz</strong>.</p>
            <p>Außerdem bietet unser großes Sortiment eine kleine Auswahl an <a href="#anhaenger" title="Zu unseren Anhängern">PKW Anhängern</a> und diversen <a href="#partyzeltzubehoer-wcwagen" title="Zu unserem Partyzeltzubehör">Toilettenwagen</a>. Informieren Sie sich gerne und bei Fragen können Sie sich jederzeit bei uns melden.</p>
          </div>
          <div class="about__text">
            <p>Vom kleinen Laminatschneider bis zur 10,5m hohen Arbeitsbühne, ob Minibagger, Radlader, Arbeitsbühnen, Gartenfräsen und vieles mehr – Wir haben was Sie brauchen. Wir sind für Sie da in <strong>Moordorf, Aurich, Wittmund, Wiesmoor, Emden, Hinte, Krummhörn und ganz Ostfriesland.</strong></p>
          </div>
        </div>
      </div>
    </div>
    <AppFooter />
  </div>
</template>

<script>
import Header from '~/components/Header.vue'
import Hero from '~/components/Hero.vue'
import TopProducts from '~/components/TopProducts'
import Contact from '~/components/Contact'
import ArticleTable from '~/components/ArticleTable'
import Footer from '~/components/Footer'

export default {
  components: {
    AppHeader: Header,
    AppHero: Hero,
    AppContact: Contact,
    AppTopProducts: TopProducts,
    AppArticleTable: ArticleTable,
    AppFooter: Footer
  },
  computed: {
    allProducts () {
      return this.$store.getters.allProducts
    },
    topProducts () {
      return this.$store.getters.topProducts
    },
    gardenTools () {
      return this.$store.getters.gardenTools
    },
    partySupplies () {
      return this.$store.getters.partySupplies
    },
    toilets () {
      return this.$store.getters.toilets
    },
    tools () {
      return this.$store.getters.tools
    },
    trailer () {
      return this.$store.getters.trailer
    }
  },
  created () {
    this.$store.dispatch('loadProducts')
  }
}
</script>
