<template>
  <div class="products">
    <div
      class="products__accordionheader"
      @click="openAccordion"
    >
      <div class="products__accordionheader__category">
        <Car v-if="headline === 'Anhänger'" color="grey" :height="20" />
        <Cocktail v-if="headline === 'Partyzeltzubehör'" color="grey" :height="20" />
        <Paper v-if="headline === 'WC-Wagen'" color="grey" :height="20" />
        <Tools v-if="headline === 'Werkzeuge'" color="grey" :height="20" />
        <Tree v-if="headline === 'Gartengeräte'" color="grey" :height="20" />
      </div>
      <h2>{{ headline }}</h2>
      <div class="products__accordionheader__icon">
        <Plus v-if="!accordionOpen" color="grey" />
        <Minus v-if="accordionOpen" color="grey" />
      </div>
    </div>
    <div
      v-if="headline === 'Partyzeltzubehör'"
      class="products__accordionheader__notice"
    >
      Hinweis: Die Preise für das Partyzeltzubehör gelten jeweils für 3 Tage.
    </div>
    <div
      class="products__accordionbody"
      :class="{'products__accordionbody--open': accordionOpen || showAllProducts}"
    >
      <div class="products__accordionbody__header">
        <div class="products__accordionbody__header__title">
          Name
        </div>
        <div class="products__accordionbody__header__price">
          Preis
        </div>
      </div>
      <div class="products__accordionbody__search">
        <label :for="headline.toLowerCase()">{{ headline }} durchsuchen...</label>
        <input
          :id="headline.toLowerCase()"
          v-model="search"
          :placeholder="`${ headline } durchsuchen...`"
          type="text"
          class="search search--small"
        >
        <div class="products__accordionbody__search__icon">
          <Search color="light-grey" />
        </div>
      </div>
      <ul class="products__accordionbody__table">
        <li v-for="product in filteredProducts" :key="product.id">
          <div class="products__accordionbody__table__title">
            {{ product.title }}
          </div>
          <div class="products__accordionbody__table__price">
            {{ product.price }}
          </div>
        </li>
      </ul>
      <div
        v-if="products.length >= 15 && !search"
        class="products__accordionbody__shade"
        :class="{'products__accordionbody__shade--open': showAllProducts}"
        @click="showAll"
      >
        <Plus v-if="!showAllProducts" color="grey" :height="13" />
        <Minus v-else color="grey" :height="13" />
        <span v-if="!showAllProducts">Alle Artikel {{ products.length }} anzeigen</span>
        <span v-else>Weniger Artikel anzeigen</span>
      </div>
      <div
        v-if="headline === 'Anhänger'"
        class="products__accordionheader__notice products__accordionheader__notice--spacing"
      >
        Preise für Halbtagsmieten auf Anfrage.
      </div>
    </div>
  </div>
</template>

<script>
import Car from './icons/Car.vue'
import Cocktail from './icons/Cocktail.vue'
import Minus from './icons/Minus.vue'
import Paper from './icons/Paper.vue'
import Plus from './icons/Plus.vue'
import Search from './icons/Search.vue'
import Tools from './icons/Tools.vue'
import Tree from './icons/Tree.vue'

export default {
  components: {
    Car,
    Cocktail,
    Minus,
    Paper,
    Plus,
    Search,
    Tools,
    Tree
  },
  props: {
    headline: {
      type: String,
      required: false,
      default: 'Produkte'
    },
    products: {
      type: Array,
      required: true
    }
  },
  data () {
    return {
      search: '',
      accordionOpen: false,
      showAllProducts: false
    }
  },
  computed: {
    sortedArray () {
      return this.products.slice().sort((a, b) => a.title.localeCompare(b.title))
    },
    filteredProducts () {
      return this.sortedArray.filter((product) => {
        const title = product.title.toLowerCase()
        const search = this.search.toLowerCase()

        return title.match(search)
      })
    }
  },
  methods: {
    openAccordion () {
      if (window.innerWidth <= 960) {
        this.accordionOpen = !this.accordionOpen
      }
    },
    showAll () {
      if (window.innerWidth > 960) {
        this.showAllProducts = !this.showAllProducts
      }
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../assets/styles/variables';

.products {
  @media screen and (min-width: $large) {
    flex: 0 1 calc(50% - 30px);
  }

  flex: 0 1 calc(100% - 15px);
  margin: 10px 15px;

  &__accordionheader {
    @media screen and (min-width: $large) {
      background-color: #fff;
      cursor: default;
      justify-content: center;
    }

    align-items: center;
    background-color: #efefef;
    cursor: pointer;
    display: flex;
    padding: 15px 25px;
    position: relative;

    &__category {
      @media screen and (min-width: $large) {
        text-align: right;
      }
    }

    h2 {
      cursor: text;
      display: inline-block;
      margin-bottom: 0;
      margin-left: 10px;
      text-align: left;
    }

    &__icon {
      @media screen and (min-width: $large) {
        display: none;
      }

      display: block;
      margin-left: auto;
    }

    &__notice {
      font-size: 0.85rem;
      margin-bottom: 15px;
      text-align: center;

      &--spacing {
        margin-top: 10px;
      }
    }
  }

  &__accordionbody {
    @media screen and (min-width: $large) {
      max-height: 400px;
    }

    max-height: 0;
    overflow: hidden;
    position: relative;
    transition: all 0.5s ease-in-out;

    &--open {
      max-height: 100%;
      overflow: visible;
    }

    &__header {
      background-color: $grey;
      color: #fff;
      padding: 8px 15px;
      display: flex;

      &__title,
      &__price {
        flex: 1;
        font-weight: 700;
      }

      &__title {
        text-align: left;
      }

      &__price {
        text-align: right;
      }
    }

    &__search {
      margin: 10px 0;
      padding: 0;
      position: relative;

      label {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        z-index: -1;
      }

      &__icon {
        position: absolute;
        top: 15px;
        right: 15px;
      }
    }

    &__table {
      li {
        color: $grey;
        cursor: pointer;
        display: flex;
        list-style: none;
        padding: 8px 15px;
        transition: all 0.15s ease-in-out;

        &:nth-child(odd) {
          background-color: #efefef;

          &:hover {
            background-color: #e0e0e0;
          }
        }

        &:nth-child(even) {
          background-color: #fff;

          &:hover {
            background-color: #d6d6d6;
          }
        }
      }

      &__title {
        flex: 2;
        text-align: left;
      }

      &__price {
        flex: 1;
        font-weight: 700;
        text-align: right;
      }
    }

    &__shade {
      @media screen and (min-width: $large) {
        visibility: visible;
      }

      background: rgb(255, 255, 255);
      background: linear-gradient(0deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 100%);
      bottom: 0;
      color: $grey;
      cursor: pointer;
      font-weight: 700;
      padding: 75px 0 0 0;
      position: absolute;
      text-align: center;
      visibility: hidden;
      width: 100%;

      &--open {
        background: transparent;
        padding: 0;
        bottom: -25px;
      }

      svg {
        margin-right: 3px;
      }
    }
  }
}
</style>
