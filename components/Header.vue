<template>
  <header class="section header">
    <div class="section__inner section__inner--align-center">
      <div class="header__logo">
        <img src="~/assets/logo.svg" alt="Werkzeugvermietung Popken Logo" title="Werkzeugvermietung Popken Logo">
      </div>
      <nav class="header__nav">
        <ul
          role="menubar"
          itemscope
          itemtype="http://schema.org/SiteNavigationElement"
        >
          <li role="menuitem" class="header__nav__item">
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
          <li role="menuitem" class="header__nav__item">
            <a
              href="#partyzeltzubehoer-wcwagen"
              itemprop="url"
              tabindex="0"
              title="Unser Partyzeltzubehör"
            >
              <Cocktail />
              <span itemprop="name">Partyzeltzubehör</span>
            </a>
          </li>
          <li role="menuitem" class="header__nav__item">
            <a
              href="#partyzubehoer-wcwagen"
              itemprop="url"
              tabindex="0"
              title="Unsere WC Wagen"
            >
              <Paper />
              <span itemprop="name">WC Wagen</span>
            </a>
          </li>
          <li role="menuitem" class="header__nav__item">
            <a
              href="#anhaenger"
              itemprop="url"
              tabindex="0"
              title="Unsere Anhänger"
            >
              <Car />
              <span itemprop="name">Anhänger</span>
            </a>
          </li>
          <li role="menuitem" class="header__nav__item">
            <a
              href="#flyer"
              itemprop="url"
              tabindex="0"
              title="Unser aktueller Flyer"
            >
              <File />
              <span itemprop="name">Flyer</span>
            </a>
          </li>
          <li role="menuitem" class="header__nav__item">
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
        </ul>
      </nav>
      <div class="header__button">
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

export default {
  components: {
    Car,
    Cocktail,
    File,
    Paper,
    Phone,
    Tools
  }
}
</script>

<style lang="scss" scoped>
@import '../assets/styles/variables';

.header {
  padding-bottom: 15px;
  padding-top: 15px;

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
      display: block;
      flex: 3;
      padding: 0;
      position: relative;
      top: 0;
    }

    background-color: #fff;
    display: none;
    height: calc(100% - 100px);
    left: 0;
    padding: 0 35px;
    position: absolute;
    top: 100px;
    width: 100%;

    ul {
      @media screen and (min-width: $large) {
        display: flex;
        justify-content: flex-end;
      }

      &:hover {
        & > li {
          opacity: 0.33;

          &:hover {
            opacity: 1;
          }
        }
      }

      li {
        list-style: none;
        transition: opacity 0.15s ease-in-out;

        a {
          @media screen and (min-width: $large) {
            padding: 5px 20px;
          }

          display: inline-block;
          padding: 10px 0;

          svg {
            display: inline-block;
            margin-right: 4px;
            margin-top: -3px;
            vertical-align: middle;
            width: auto;
          }
        }
      }
    }
  }

  &__button {
    @media screen and (min-width: $large) {
      display: none;
    }

    display: block;

    span {
      background-color: $grey;
      display: block;
      height: 2px;
      margin: 9px 0;
      width: 35px;
    }
  }
}
</style>
