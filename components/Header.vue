<template>
  <header class="section header" :class="{'header--fixed': menuOpen}">
    <div class="section__inner section__inner--align-center">
      <div class="header__logo">
        <a href="/" title="Zur Startseite">
          <img src="~/assets/logo.svg" alt="Werkzeugvermietung Popken Logo" title="Werkzeugvermietung Popken Logo">
        </a>
      </div>
      <nav class="header__nav" :class="{'header__nav--open': menuOpen}">
        <ul
          class="header__nav__main"
          role="menubar"
          itemscope
          itemtype="http://schema.org/SiteNavigationElement"
        >
          <li role="menuitem" class="header__nav__main__item" @click="openMenu">
            <a
              href="#werkzeuge-garten"
              itemprop="url"
              tabindex="0"
              title="Unsere Werkzeuge & Garten"
            >
              <Tools />
              <span itemprop="name">Werkzeuge & Garten</span>
            </a>
          </li>
          <li role="menuitem" class="header__nav__main__item" @click="openMenu">
            <a
              href="#wcwagen-anhaenger"
              itemprop="url"
              tabindex="0"
              title="Unsere WC Wagen"
            >
              <Paper />
              <span itemprop="name">WC Wagen</span>
            </a>
          </li>
          <li role="menuitem" class="header__nav__main__item" @click="openMenu">
            <a
              href="#wcwagen-anhaenger"
              itemprop="url"
              tabindex="0"
              title="Unsere Anhänger"
            >
              <Car />
              <span itemprop="name">Anhänger</span>
            </a>
          </li>
          <li role="menuitem" class="header__nav__main__item" @click="openMenu">
            <a
              href="#partyzeltzubehoer"
              itemprop="url"
              tabindex="0"
              title="Unser Partyzeltzubehör"
            >
              <Cocktail />
              <span itemprop="name">Partyzeltzubehör</span>
            </a>
          </li>
          <li role="menuitem" class="header__nav__main__item" @click="openMenu">
            <a
              href="/produktflyer-2020.pdf"
              itemprop="url"
              tabindex="0"
              target="_blank"
              title="Unser aktueller Flyer"
            >
              <File />
              <span itemprop="name">Flyer</span>
            </a>
          </li>
          <li role="menuitem" class="header__nav__main__item" @click="openMenu">
            <a
              href="https://hoppsala-huepfburgen.de/"
              itemprop="url"
              tabindex="0"
              target="_blank"
              title="Hoppsala Hüpfburgen"
            >
              <Fort />
              <span itemprop="name">Hüpfburgen</span>
            </a>
          </li>
          <li role="menuitem" class=" header__nav__main__item" @click="openMenu">
            <a
              href="#kontakt"
              itemprop="url"
              tabindex="0"
              title="Nehmen Sie Kontakt zu uns auf"
            >
              <Phone />
              <span itemprop="name">Kontakt</span>
            </a>
          </li>
          <li class="header__nav__main__item header__nav__main__item--hidden-lg">
            <ul class="header__nav__sub">
              <li class="header__nav__sub__item">
                <a href="tel:+494941982689" tabindex="0" title="Rufen Sie uns an!">Tel.: 0 49 41 / 98 26 89</a>
                <br>
                Erreichbar: 07:00 - 20:00 Uhr
              </li>
              <li class="header__nav__sub__item">
                Mobil: <a href="tel:+491709950802" title="Rufen Sie uns an!">0170 / 99 50 80 2</a>
                <br>
                Mobil: <a href="tel:+4915258406375" title="Rufen Sie uns an!">0152 / 58 40 63 75</a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <div
        class="header__button"
        :class="{'header__button--open': menuOpen}"
        @click="openMenu"
      >
        <span />
        <span />
        <span />
      </div>
    </div>
  </header>
</template>

<script>
import Car from './icons/Car.vue'
import Cocktail from './icons/Cocktail.vue'
import File from './icons/File.vue'
import Paper from './icons/Paper.vue'
import Phone from './icons/Phone.vue'
import Tools from './icons/Tools.vue'
import Fort from './icons/Fort.vue'

export default {
  components: {
    Car,
    Cocktail,
    File,
    Paper,
    Phone,
    Tools,
    Fort
  },
  computed: {
    menuOpen () {
      return this.$store.getters.openMenu
    }
  },
  methods: {
    openMenu () {
      if (window.innerWidth <= 960) {
        this.$store.dispatch('toggleMenu')
      }
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../assets/styles/variables';

.header {
  background-color: #fff;
  padding-bottom: 15px;
  padding-top: 15px;

  &--fixed {
    position: fixed;
    z-index: 9;
  }

  &__logo {
    flex: 1;

    img {
      @media screen and (min-width: $large) {
        max-width: 200px;
      }

      height: auto;
      max-width: 150px;
    }
  }

  &__nav {
    @media screen and (min-width: $large) {
      border: 0;
      display: block;
      flex: 3;
      height: 100%;
      left: 0;
      padding: 0;
      position: relative;
      top: 0;
    }

    background-color: #fff;
    border-top: 1px solid $middle-grey;
    height: calc(100vh - 100px);
    left: -100vw;
    padding: 0 35px;
    position: absolute;
    top: 85px;
    transition: all 0.3s ease-in-out;
    width: 100%;
    z-index: 1;

    &--open {
      left: 0;
    }

    &__main {
      @media screen and (min-width: $large) {
        display: flex;
        justify-content: flex-end;
      }

      &:hover {
        & > li:not(.header__nav__main__item--hidden-lg) {
          opacity: 0.33;

          &:hover {
            opacity: 1;
          }
        }
      }

      &__item {
        list-style: none;
        transition: opacity 0.15s ease-in-out;

        a {
          @media screen and (min-width: $large) {
            font-size: 1rem;
            padding: 5px 15px;
          }

          display: inline-block;
          font-size: 1.25rem;
          padding: 15px 0;

          svg {
            display: inline-block;
            margin-right: 4px;
            margin-top: -3px;
            vertical-align: middle;
            width: auto;
          }
        }

        &--hidden-lg {
          @media screen and (min-width: $large) {
            display: none;
          }
        }
      }
    }

    &__sub {
      bottom: 0;
      position: absolute;

      &__item {
        font-size: 0.85rem;
        list-style: none;
        padding-bottom: 15px;

        a {
          font-size: 0.85rem;
          padding: 0;
          vertical-align: top;
        }
      }
    }
  }

  // menu mobile button
  &__button {
    @media screen and (min-width: $large) {
      display: none;
    }

    cursor: pointer;
    display: block;
    height: 25px;
    position: relative;
    width: 35px;

    &--open {
      span {
        &:nth-child(1) {
          top: 50% !important;
          transform: rotate(-45deg);
        }

        &:nth-child(2) {
          opacity: 0;
        }

        &:nth-child(3) {
          top: 50% !important;
          transform: rotate(45deg);
        }
      }
    }

    span {
      background-color: $grey;
      display: block;
      height: 2px;
      left: 0;
      position: absolute;
      transition: all 0.15s ease-in-out;
      width: 100%;

      &:nth-child(1) {
        top: 0;
      }

      &:nth-child(2) {
        top: 50%;
        transform: translateY(-50%);
      }

      &:nth-child(3) {
        bottom: 0;
      }
    }
  }
}
</style>
