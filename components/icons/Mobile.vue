<template>
  <svg
    aria-hidden="true"
    focusable="false"
    :height="height"
    role="img"
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 320 512"
  >
    <path
      :class="color"
      d="M272 0H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h224c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zM160 480c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z"
    />
  </svg>
</template>

<script>
export default {
  props: {
    color: {
      type: String,
      default: 'grey',
      required: false
    },
    height: {
      type: Number,
      default: 16,
      required: false
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../../assets/styles/variables';

.yellow {
  fill: $yellow;
}

.grey {
  fill: $grey;
}

.light-grey {
  fill: $light-grey;
}
</style>
