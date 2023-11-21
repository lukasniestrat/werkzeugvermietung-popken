<template>
  <div>
    <div v-if="popupIsOpen" class="popup">
      <div
        v-for="(product, index) in item"
        :key="index"
        class="popup__inner"
      >
        <div v-if="product.image" class="popup__inner__header">
          <img :src="product.image" :alt="product.title" :title="product.title">
        </div>
        <div class="popup__inner__body">
          <h3>
            {{ product.title }}
            <span v-if="product.newArticle" class="badge badge--new">NEU</span>
          </h3>
          <div class="popup__inner__body__category">
            <Tools v-if="product.category === 'Werkzeuge'" :height="14" />
            <Car v-if="product.category === 'Anhänger'" :height="14" />
            <Cocktail v-if="product.category === 'Partyzeltzubehör'" :height="14" />
            <Paper v-if="product.category === 'WC-Wagen'" :height="14" />
            <Tree v-if="product.category === 'Gartengeräte'" :height="14" />
            {{ product.category }}
          </div>
          <div class="popup__inner__body__price">
            Preis: {{ product.price }} / Miettag
            <span v-if="product.description">
              <p>{{ product.description }}</p>
            </span>
          </div>
          <a v-if="product.datasheet" :href="product.datasheet" class="popup__inner__body__datasheet" target="_blank">
            <File color="white" :height="18" />
            <span>Datenblatt</span>
          </a>
        </div>
        <div class="popup__inner__footer">
          <div class="popup__inner__footer--block">
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
          <div class="popup__inner__footer--block">
            <div v-if="product.transport">
              {{ product.transport }}
            </div>
            <div v-else>
              <h4>Probleme beim Transport?</h4>
              <p>Mieten Sie für 10,00 € / Miettag einen Anhänger von uns zum Transport dazu!*</p>
              <i>* Das Angebot gilt nur in Verbindung mit einem Leihgerät welches zum Transport einen Anhänger benötigt. Die Ausleihe eines Anhängers ohne ein Mietgerät ist nicht möglich! </i>
            </div>
          </div>
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
import File from './icons/File.vue'
import Paper from './icons/Paper.vue'
import Plus from './icons/Plus'
import Tools from './icons/Tools.vue'
import Tree from './icons/Tree.vue'

export default {
  components: {
    Car,
    Cocktail,
    File,
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
      this.$store.dispatch('togglePopup')
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
    position: relative;

    &__header {
      @media screen and (max-width: $medium) {
        height: 200px;
      }

      border-radius: 10px 10px 0 0;
      height: 300px;
      overflow: hidden;
      position: relative;
      width: 100%;

      img {
        height: auto;
        left: 50%;
        position: absolute;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
      }
    }

    &__body {
      @media screen and (max-width: $medium) {
        padding: 20px;
      }

      padding: 35px;

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

      &__datasheet {
        align-items: center;
        background-color: $grey;
        color: #fff;
        display: inline-flex;
        font-size: 1rem;
        font-weight: 700;
        padding: 10px 20px;
        border-radius: 5px;
        margin-top: 15px;
        text-align: center;

        svg {
          margin-right: 8px;
        }
      }
    }

    &__footer {
      @media screen and (max-width: $medium) {
        padding: 0px 20px 20px;
      }

      padding: 0px 35px 35px;

      &--block {
        margin-bottom: 25px;

        &:last-child {
          margin-bottom: 0;
        }
      }

      ul {
        display: flex;

        li {
          flex: 1;
          font-size: 0.85rem;
          list-style: none;
        }
      }

      i {
        font-size: 0.65rem;
      }
    }
  }

  &__close {
    background-color: $red;
    border: 0;
    border-radius: 50%;
    color: $light-grey;
    cursor: pointer;
    height: 36px;
    outline: 0;
    position: absolute;
    right: -15px;
    top: -15px;
    transition: all 0.15s ease-in-out;
    width: 36px;

    &:hover {
      background-color: $grey;
    }

    svg {
      transform: rotate(-45deg);
      margin-top: 4px;
      margin-right: 1px;
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
