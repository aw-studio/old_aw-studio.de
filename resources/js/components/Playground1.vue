<template>
  <div class="playground" aria-hidden="true">
    <div class="container h-0 relative"></div>
    <video
      src="/videos/playground-1.mp4"
      muted
      autoplay
      loop
      playsinline
      poster="/videos/playground-1.jpg"
    ></video>
  </div>
</template>

<script>
export default {
  data: function() {
    return {};
  },
  mounted() {},
  methods: {}
};
</script>

<style lang="scss" scoped>
.playground {
  position: relative;
  width: 100%;
  height: 80vh;
  max-height: 600px;
  box-sizing: border-box;
  overflow-x: hidden;
  background-color: #ffb550;
  @media (max-width: 640px) {
    max-height: 400px;
    height: auto;
    max-height: 600px;
  }
  video {
    height: 100%;
    width: auto;
    margin: auto;
    @media (max-width: 640px) {
      height: auto;
      height: auto;
      max-height: 600px;
    }
  }
}
</style>
