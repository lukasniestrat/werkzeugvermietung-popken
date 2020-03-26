<template>
  <div>
    <div v-if="popupIsOpen" class="popup">
      <div class="popup__inner">
        <div
          v-for="(product, index) in item"
          :key="index"
          class="popup__inner__header"
        >
          <h3>{{ product.title }}</h3>
          <div class="popup__inner__header__category">
            <Tools v-if="product.category === 'Werkzeuge'" :height="14" />
            <Car v-if="product.category === 'Anhänger'" :height="14" />
            <Cocktail v-if="product.category === 'Partyzeltzubehör'" :height="14" />
            <Paper v-if="product.category === 'WC-Wagen'" :height="14" />
            <Tree v-if="product.category === 'Gartengeräte'" :height="14" />
            {{ product.category }}
          </div>
          <div class="popup__inner__header__price">
            Preis: {{ product.price }}
          </div>
        </div>
        <div class="popup__inner__content">
          <h4>Sie wollen diesen Artikel ausleihen?</h4>
          <p>Kein Problem! Rufen Sie uns einfach an</p>
          <ul>
            <li>
              Tel: <strong>0 49 41 / 98 26 89</strong><br>
              Erreichbar: 07:00 - 20:00 Uhr
            </li>
            <li>
              Mobil: <strong>0170 / 99 50 80 2</strong><br>
              Mobil: <strong>0152 / 58 40 63 75</strong>
            </li>
          </ul>
        </div>
        <button class="popup__close" @click="closePopup">
          <Plus color="white" :height="18" />
        </button>
      </div>
    </div>
    <div v-if="popupIsOpen" class="shade" @click="closePopup" />
  </div>
</template>

<script>
import Car from './icons/Car.vue'
import Cocktail from './icons/Cocktail.vue'
import Paper from './icons/Paper.vue'
import Plus from './icons/Plus'
import Tools from './icons/Tools.vue'
import Tree from './icons/Tree.vue'

export default {
  components: {
    Car,
    Cocktail,
    Paper,
    Plus,
    Tools,
    Tree
  },
  computed: {
    popupIsOpen () {
      return this.$store.getters.openPopup
    },
    item () {
      return this.$store.getters.popupItem
    }
  },
  methods: {
    closePopup () {
      this.$store.dispatch('tooglePopup')
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../assets/styles/variables';

.popup {
  @media screen and (min-width: $large) {
    max-width: 550px;
  }

  background-color: #fff;
  border-radius: 10px;
  position: fixed;
  left: 50%;
  max-width: 90%;
  top: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
  z-index: 999;

  &__inner {
    padding: 50px;
    position: relative;

    &__header {
      h3 {
        margin-bottom: 15px;
      }

      &__category {
        font-size: 0.85rem;

        svg {
          margin-top: 1px;
          margin-right: 3px;
          vertical-align: top;
        }
      }

      &__price {
        font-size: 1rem;
        font-weight: 700;
        margin-top: 15px;
      }
    }

    &__content {
      margin-top: 30px;

      ul {
        display: flex;

        li {
          flex: 1;
          font-size: 0.85rem;
          list-style: none;
        }
      }
    }
  }

  &__close {
    background-color: $light-grey;
    border: 0;
    border-radius: 50%;
    color: #ffffff;
    cursor: pointer;
    height: 35px;
    outline: 0;
    position: absolute;
    right: -15px;
    top: -15px;
    transition: all 0.15s ease-in-out;
    width: 35px;

    &:hover {
      background-color: $grey;
    }

    svg {
      transform: rotate(-45deg);
    }
  }
}

.shade {
  background-color: rgba(0, 0, 0, 0.75);
  height: 100%;
  left: 0;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 99;
}
</style>
