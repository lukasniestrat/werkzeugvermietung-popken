<template>
  <svg
    aria-hidden="true"
    focusable="false"
    :height="height"
    role="img"
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 448 512"
  >
    <path
      :class="color"
      d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"
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
