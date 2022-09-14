<template>
  <footer id="kontakt" class="footer">
    <div class="section">
      <div class="section__inner">
        <div class="footer__info">
          <Logo />
        </div>
        <div class="footer__info">
          <h2>Service</h2>
          <nav>
            <ul class="service">
              <li>
                <a href="#werkzeuge-garten" title="Unsere Werkzeuge & Garten" tabindex="0">Werkzeuge & Garten</a>
              </li>
              <li>
                <a href="#wcwagen-anhaenger" title="Unsere Anhänger" tabindex="0">Anhänger</a>
              </li>
              <li>
                <a href="#wcwagen-anhaenger" title="Unsere WC Wagen" tabindex="0">WC Wagen</a>
              </li>
              <li>
                <a href="#partyzeltzubehoer" title="Unser Partyzeltzubehör" tabindex="0">Partyzeltzubehör</a>
              </li>
              <li>
                <a href="/produktflyer-2020.pdf" target="_blank" title="Unser aktueller Flyer" tabindex="0">Flyer</a>
              </li>
              <li>
                <a href="#kontakt" title="Nehmen Sie Kontakt zu uns auf" tabindex="0">Kontakt</a>
              </li>
            </ul>
          </nav>
        </div>
        <div class="footer__info">
          <h2>Kontakt</h2>
          <ul>
            <li>Erreichbar: 07:00 - 20:00 Uhr</li>
            <li>
              <div class="footer__info__icon">
                <Phone color="yellow" />
              </div>
              <div class="footer__info__content">
                Tel: <a href="tel:+494941982689" title="Rufen Sie uns an!">0 49 41 / 98 26 89</a>
              </div>
            </li>
            <li>
              <div class="footer__info__icon">
                <Mobile color="yellow" />
              </div>
              <div class="footer__info__content">
                Mobil: <a href="tel:+491709950802" title="Rufen Sie uns an!">0170 / 99 50 80 2</a>
              </div>
            </li>
            <li>
              <div class="footer__info__icon">
                <Mobile color="yellow" />
              </div>
              <div class="footer__info__content">
                Mobil: <a href="tel:+4915258406375" title="Rufen Sie uns an!">0152 / 58 40 63 75</a>
              </div>
            </li>
          </ul>
        </div>
        <div class="footer__info">
          <h2>Adresse & Öffnungszeiten</h2>
          <ul>
            <li>
              <div class="footer__info__icon">
                <MapMarker color="yellow" />
              </div>
              <div class="footer__info__content">
                <a href="https://goo.gl/maps/cEK4DY8CMAXgRJT18" rel="noopener" target="_blank" title="Adresse auf Google Maps anzeigen">Mittelweg 109<br>26624 Südbrookmerland</a>
              </div>
            </li>
            <li>
              <div class="footer__info__icon">
                <Clock color="yellow" />
              </div>
              <div class="footer__info__content">
                Mo. - Fr.:<br>
                07:30 - 10:00 Uhr<br>
                15:00 - 17:00 Uhr<br><br>

                Sa.:<br>
                07:00 - 10:00 Uhr<br>
                15:00 - 17:00 Uhr<br>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="section__inner">
        <div class="footer__impress">
          <div class="footer__impress__copyright">
            © Werkzeugvermietung Popken - Alle Rechte vorbehalten.
          </div>
          <div class="footer__impress__nav">
            <ul>
              <li>
                <a href="/impressum" title="Zum Impressum">Impressum</a>
              </li>
              <li>
                <a href="/datenschutz" title="Zur Datenschutzerklärung">Datenschutz</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
import Clock from './icons/Clock.vue'
import Logo from './Logo.vue'
import MapMarker from './icons/MapMarker.vue'
import Mobile from './icons/Mobile.vue'
import Phone from './icons/Phone.vue'

export default {
  components: {
    Clock,
    Logo,
    MapMarker,
    Mobile,
    Phone
  }
}
</script>

<style lang="scss" scoped>
@import '../assets/styles/variables';

.footer {
  background-color: $grey;
  padding: 50px 0 15px 0;

  &__info {
    @media screen and (min-width: $large) {
      flex: 0 1 calc(25% - 50px);
      margin: 0 25px;
    }

    flex: 0 1 100%;
    margin: 15px 25px;

    &__icon {
      display: inline-block;
      margin-right: 2px;
      text-align: center;
      vertical-align: top;
      width: 25px;
    }

    &__content {
      display: inline-block;
    }

    h2 {
      color: #fff;
      margin-bottom: 20px;
    }

    ul {
      &.service {
        li {
          &::before {
            content: "\2022";
            color: $yellow;
            display: inline-block;
            margin-right: 5px;
          }
        }
      }

      li {
        color: #fff;
        font-size: 0.85rem;
        line-height: 1.5rem;
        list-style: none;
        margin: 8px 0;

        &:last-child {
          margin-bottom: 0;
        }

        a {
          color: #fff;
          font-weight: 700;
          text-decoration: none;
          transition: all 0.15s ease-in-out;

          &:hover {
            opacity: 0.66;
          }
        }
      }
    }
  }

  &__impress {
    color: #fff;
    margin-top: 50px;

    &__copyright,
    &__nav {
      @media screen and (min-width: $large) {
        display: inline-block;
      }

      color: #fff;
      display: block;
      font-size: 0.85rem;

      ul {
        @media screen and (min-width: $large) {
          margin-left: 35px;
          margin-top: 0;
        }

        margin-left: 0;
        margin-top: 15px;

        li {
          @media screen and (min-width: $large) {
            margin-right: 25px;
          }

          display: inline-block;
          list-style: none;
          margin-right: 15px;

          a {
            color: #fff;
          }
        }
      }
    }
  }
}
</style>
