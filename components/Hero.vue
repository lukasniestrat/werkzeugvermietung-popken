<template>
  <section class="hero">
    <div class="section">
      <div class="section__inner section__inner--center">
        <div class="hero__title">
          <h1 itemprop="name">
            Werkzeug-, Geräte- & Partyzeltzubehör J. Popken
          </h1>
          <h2>Ihr Nr. 1 Geräteverleih für Aurich, Emden, Leer und ganz Ostfriesland.</h2>
        </div>
      </div>
      <div v-click-outside="toggleResults" class="section__inner section__inner--small">
        <div class="hero__search">
          <label for="article-search">Suchen Sie nach einem Artikel...</label>
          <input
            id="article-search"
            v-model="search"
            placeholder="Suchen Sie nach einem Artikel..."
            type="text"
            class="search"
            @focus="active = !active"
          >
          <div class="hero__search__icon">
            <Search color="light-grey" />
          </div>
        </div>
        <div v-if="search && active" class="hero__results">
          <div class="hero__results__inner">
            <ul>
              <li
                v-for="(product, index) in filteredProducts"
                :key="index"
                @click="showPopup(product.title, product.category, product.price)"
                v-html="highlight(product.title)"
              />
              <li v-if="filteredProducts.length === 0" class="no-item-found">
                Leider keine Artikel gefunden...
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Search from './icons/Search.vue'

export default {
  components: {
    Search
  },
  props: {
    products: {
      type: Array,
      required: true
    }
  },
  data () {
    return {
      search: '',
      active: false
    }
  },
  computed: {
    filteredProducts () {
      return this.products.filter((product) => {
        const title = product.title.toLowerCase()
        const search = this.search.toLowerCase()

        return title.match(search)
      })
    }
  },
  methods: {
    toggleResults () {
      if (this.active) {
        this.active = !this.active
      }
    },
    showPopup (title, category, price) {
      const currentItem = {
        title,
        category,
        price
      }

      this.$store.dispatch('addItem', currentItem)
      this.$store.dispatch('tooglePopup')
    },
    highlight (string) {
      return string.replace(new RegExp(this.search, 'gi'), (match) => {
        return '<span>' + match + '</span>'
      })
    }
  }
}
</script>

<style lang="scss">
@import '../assets/styles/variables';

.hero {
  @media screen and (min-width: $large) {
    padding: 75px 0;
  }

  background-image: url('~assets/suche_hintergrund.jpg');
  background-size: cover;
  padding: 50px 0;
  width: 100%;

  &__title {
    text-align: center;
    width: 100%;

    h2 {
      color: $light-grey;
      font-size: 1.25rem;
      font-weight: 300;
    }
  }

  &__search {
    @media screen and (min-width: $large) {
      margin-top: 50px;
    }

    margin-top: 25px;
    position: relative;
    width: 100%;

    label {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      z-index: -1;
    }

    &__icon {
      position: absolute;
      right: 25px;
      top: 50%;
      transform: translateY(-50%);
    }
  }

  &__results {
    left: 0;
    padding: 0 25px;
    position: absolute;
    top: 115px;
    width: 100%;
    z-index: 1;

    &__inner {
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 15px 20px rgba(64, 64, 64, 0.25);
      overflow: hidden;

      ul {
        li {
          color: $light-grey;
          cursor: pointer;
          font-size: 1rem;
          height: 55px;
          line-height: 55px;
          padding: 0 25px;
          overflow: hidden;
          transition: all 0.15s ease-in-out;

          span {
            color: $grey;
            font-weight: 700;
          }

          &.no-item-found {
            color: $light-grey;
            cursor: auto;
            font-size: 0.75rem;
          }

          &:hover {
            background-color: #f3f3f3;
          }
        }
      }
    }
  }
}
</style>
