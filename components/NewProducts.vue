<template>
  <div class="section section--spacing">
    <div class="section__inner">
      <h2>
        <span class="badge badge--new badge--big">NEU</span>
        Unsere neuen Produkte
      </h2>
    </div>
    <div class="section__inner">
      <article
        v-for="(product, index) in products"
        :key="index"
        class="top__article"
        @click="showPopup(
          product.title,
          product.category,
          product.price,
          product.newArticle,
          product.image,
          product.datasheet,
          product.description
        )"
      >
        <div class="top__article__inner">
          <h3 class="top__article__inner__title">
            {{ product.title }}
            <span class="badge badge--new">NEU</span>
          </h3>
          <div class="top__article__inner__category">
            <div class="top__article__inner__category__icon">
              <Car v-if="product.category === 'Anhänger'" color="light-grey" />
              <Cocktail v-if="product.category === 'Partyzeltzubehör'" color="light-grey" />
              <Paper v-if="product.category === 'WC-Wagen'" color="light-grey" />
              <Tools v-if="product.category === 'Werkzeuge'" color="light-grey" />
              <Tree v-if="product.category === 'Gartengeräte'" color="light-grey" />
            </div>
            <span>
              {{ product.category }}
            </span>
          </div>
          <div class="top__article__inner__price">
            {{ product.price }}
          </div>
        </div>
      </article>
    </div>
  </div>
</template>

<script>
import Car from './icons/Car.vue'
import Cocktail from './icons/Cocktail.vue'
import Paper from './icons/Paper.vue'
import Tools from './icons/Tools.vue'
import Tree from './icons/Tree.vue'

export default {
  components: {
    Car,
    Cocktail,
    Paper,
    Tools,
    Tree
  },
  props: {
    products: {
      type: Array,
      required: true
    }
  },
  methods: {
    showPopup (title, category, price, newArticle, image, datasheet, description) {
      const currentItem = {
        title,
        category,
        price,
        newArticle,
        image,
        datasheet,
        description
      }

      this.$store.dispatch('addItem', currentItem)
      this.$store.dispatch('tooglePopup')
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../assets/styles/variables';

.top__article {
  @media screen and (min-width: $large) {
    flex: 0 1 calc(25% - 30px);
  }

  @media screen and (min-width: $medium) and  (max-width: $large) {
    flex: 0 1 calc(50% - 30px);
  }

  background-color: #fff;
  border: 2px solid $middle-grey;
  border-radius: 10px;
  box-shadow: 0 15px 20px rgba(64, 64, 64, 0.25);
  cursor: pointer;
  flex: 0 1 calc(100% - 15px);
  margin: 15px 15px;
  padding: 25px;
  position: relative;
  transition: all 0.15s ease-in-out;

  &:hover {
    background-color: #f3f3f3;
  }

  &__inner {
    display: flex;
    flex-direction: column;
    height: 100%;

    &__title {
      color: $grey;
      font-size: 1.15rem;
      font-weight: 700;
    }

    &__category {
      color: $light-grey;
      font-size: 1rem;
      margin-bottom: 15px;
      margin-top: 10px;

      &__icon {
        display: inline-block;
        margin-right: 4px;
      }
    }

    &__price {
      color: $grey;
      font-size: 1.15rem;
      font-weight: 700;
      margin-top: auto;
    }
  }
}

h2 {
  margin-left: auto;
  margin-right: auto;
}
</style>
