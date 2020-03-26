<template>
  <div v-if="specialOffer[0].active === true" class="specialoffer">
    <div class="section">
      <div class="section__inner section__inner--small section__inner--align-center section__inner--justify-center">
        <div class="specialoffer__icon">
          <Bullhorn color="white" />
        </div>
        <div class="specialoffer__text">
          <strong>Aktuelles Angebot:</strong> {{ specialOffer[0].text }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import Bullhorn from './icons/Bullhorn'

export default {
  components: {
    Bullhorn
  },
  data () {
    return {
      specialOffer: [{
        active: false,
        text: 'Aktuell kein Angebot verfügbar'
      }]
    }
  },
  created () {
    axios.get('/data/specialoffer.json').then((response) => {
      this.specialOffer = response.data
    }).catch((error) => {
      throw new Error(`API ${error}`)
    })
  }
}
</script>

<style lang="scss" scoped>
@import '../assets/styles/variables';

.specialoffer {
  background-color: $red;
  color: #fff;
  cursor: pointer;
  font-size: 0.85rem;
  padding: 10px 0;
  text-align: center;
  width: 100%;

  &__icon {
    @media screen and (min-width: $large) {
      flex: 0;
      margin: 0;
    }

    flex: 0 1 100%;
    margin: 0 auto 5px auto;
    transform: rotate(-15deg);
  }

  &__text {
    @media screen and (min-width: $large) {
      margin: 0 0 0 15px;
    }

    margin: 0 auto;
  }

  &__button {
    background-color: #fff;
    border-radius: 5px;
    color: $red;
    font-weight: 700;
    margin-left: 50px;
    padding: 6px 15px;
    transition: all 0.15s ease-in-out;

    &:hover {
      background-color: #fff2f2;
    }
  }
}

</style>
