<template>
  <div class="playground" aria-hidden="true">
    <div class="container h-0 relative"></div>
    <video
      id="video-playground-3"
      src="/videos/playground-3.mp4"
      muted
      playsinline
      class="hidden lg:block"
      poster="/videos/playground-3.jpg"
    ></video>

    <video
      id="video-playground-3-mobile"
      src="/videos/playground-3.mp4"
      muted
      playsinline
      autoplay
      loop
      poster="/videos/playground-3.jpg"
      class="lg:hidden"
    ></video>
  </div>
</template>

<script>
export default {
  data: function() {
    return {};
  },
  mounted() {
    let main = document.querySelector("main");
    main.addEventListener("scroll", this.onMainScroll);
  },
  methods: {
    onMainScroll() {
      let main = document.querySelector("main");
      let video = document.querySelector("#video-playground-3");

      let calculatedVideoTime = main.scrollTop / 500;
      if (calculatedVideoTime > video.duration - 0.1) {
        calculatedVideoTime = video.duration - 0.1;
      }

      video.currentTime = calculatedVideoTime;
    }
  }
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
  background-color: #01033f;
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
