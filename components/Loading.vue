<template>
  <div>
    <transition name="fade">
      <div class="loading">
        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
          <circle cx="50" cy="50" r="45" />
        </svg>
      </div>
    </transition>
  </div>
</template>

<style lang="scss" scoped>
@import '../assets/styles/variables';

.loading {
  height: 25px;
  left: 50%;
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  width: 25px;

  svg {
    animation: 2s linear infinite svg-animation;
    max-width: 25px;

    circle {
      animation: 1.4s ease-in-out infinite both circle-animation;
      display: block;
      fill: transparent;
      stroke: $grey;
      stroke-linecap: round;
      stroke-dasharray: 283;
      stroke-dashoffset: 280;
      stroke-width: 10px;
      transform-origin: 50% 50%;
    }
  }

  @keyframes svg-animation {
    0% {
      transform: rotateZ(0deg);
    }

    100% {
      transform: rotateZ(360deg)
    }
  }

  @keyframes circle-animation {
    0%,
    25% {
      stroke-dashoffset: 280;
      transform: rotate(0);
    }

    50%,
    75% {
      stroke-dashoffset: 75;
      transform: rotate(45deg);
    }

    100% {
      stroke-dashoffset: 280;
      transform: rotate(360deg);
    }
  }
}
</style>
