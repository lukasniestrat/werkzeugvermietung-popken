<template>
  <div class="section top-article">
    <div class="section__inner">
      <h2>
        <Star color="grey" :height="20" />
        Unsere Top-Produkte
      </h2>
    </div>
    <div class="section__inner">
      <article
        v-for="(product, index) in products"
        :key="index"
        class="top__article"
      >
        <div class="top__article__inner">
          <h3 class="top__article__inner__title">
            {{ product.title }}
          </h3>
          <div class="top__article__inner__category">
            <div class="top__article__inner__category__icon">
              <Car v-if="product.category === 'Anhänger'" color="light-grey" />
              <Cocktail v-if="product.category === 'Partyzubehör'" color="light-grey" />
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
        <div class="top__article__star">
          <Star color="yellow" :height="20" />
        </div>
      </article>
    </div>
  </div>
</template>

<script>
import Car from './icons/Car.vue'
import Cocktail from './icons/Cocktail.vue'
import Paper from './icons/Paper.vue'
import Star from './icons/Star.vue'
import Tools from './icons/Tools.vue'
import Tree from './icons/Tree.vue'

export default {
  components: {
    Car,
    Cocktail,
    Paper,
    Star,
    Tools,
    Tree
  },
  props: {
    products: {
      type: Array,
      required: true
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../assets/styles/variables';

.top-article {
  padding-bottom: 75px;
  padding-top: 75px;
}

.section__inner {
  flex-flow: row wrap;
}

.top__article {
  @media screen and (min-width: $large) {
    flex: 0 1 calc(25% - 30px);
  }

  border-radius: 10px;
  box-shadow: 0 15px 20px rgba(64, 64, 64, 0.25);
  cursor: pointer;
  flex: 0 1 calc(100% - 30px);
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

  &__star {
    bottom: 10px;
    position: absolute;
    right: 10px;
  }
}
</style>
