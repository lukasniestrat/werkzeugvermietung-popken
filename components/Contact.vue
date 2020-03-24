<template>
  <section class="contact">
    <div class="section">
      <div class="section__inner">
        <div class="contact__info">
          <div class="contact__info__icon">
            <Phone color="yellow" :height="25" />
          </div>
          <div class="contact__info__content">
            Tel: <a href="tel:+494941982689" title="Rufen Sie uns an!">0 49 41 / 98 26 89</a>
            <br>
            Erreichbar: 07:00 - 20:00 Uhr
          </div>
        </div>
        <div class="contact__info">
          <div class="contact__info__icon">
            <Mobile color="yellow" :height="25" />
          </div>
          <div class="contact__info__content">
            Mobil: <a href="tel:+491709950802" title="Rufen Sie uns an!">0170 / 99 50 80 2</a>
            <br>
            Mobil: <a href="tel:+4915258406375" title="Rufen Sie uns an!">0152 / 58 40 63 75</a>
          </div>
        </div>
        <div class="contact__info">
          <div class="contact__info__icon">
            <MapMarker color="yellow" :height="25" />
          </div>
          <div class="contact__info__content">
            <a href="https://goo.gl/maps/cEK4DY8CMAXgRJT18" target="_blank" title="Adresse auf Google Maps anzeigen">
              Mittelweg 109<br>26624 Südbrookmerland
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import MapMarker from './icons/MapMarker'
import Mobile from './icons/Mobile'
import Phone from './icons/Phone'

export default {
  components: {
    MapMarker,
    Mobile,
    Phone
  }
}
</script>

<style lang="scss" scoped>
@import '../assets/styles/variables';

.contact {
  background-color: $grey;
  padding: 15px 0;

  &__info {
    @media screen and (min-width: $large) {
      flex: 0 1 33%;
      margin-bottom: 0;
      text-align: center;
    }

    color: #fff;
    flex: 0 1 100%;
    font-size: 0.85rem;
    margin-bottom: 15px;
    text-align: left;

    &:last-child {
      margin-bottom: 0;
    }

    &__icon,
    &__content {
      display: inline-block;
      vertical-align: middle;
    }

    &__icon {
      margin-right: 10px;
      text-align: center;
      width: 25px;
    }

    &__content {
      line-height: 1.75em;
      text-align: left;

      a {
        color: #fff;
        font-weight: 700;
        text-decoration: none;
      }
    }
  }
}
</style>
