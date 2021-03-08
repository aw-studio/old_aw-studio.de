<template>
  <div class="playground">
    <div class="container h-0 relative" aria-hidden="true">
      <div class="typo-poster">
        <div class="line">
          <div class="typoline typoline1">
            <span class="cursor"></span>
          </div>
        </div>
        <div class="line">
          <div class="typoline typoline2"></div>
        </div>
      </div>

      <div class="controls text-right">
        <input
          class="letters"
          v-model="text"
          :maxlength="8"
          spellcheck="false"
          @blur.prevent="inputblur()"
        />
        <button class="button" @click="reset()">⟲</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      text: "aAwW",
      time: 300,
      line: null
    };
  },
  computed: {
    letters() {
      return "{" + this.text + "}";
    }
  },
  mounted() {
    this.typing();
  },
  methods: {
    typing() {
      let line1 = document.querySelector(".typoline1");
      let line2 = document.querySelector(".typoline2");
      this.line = line1;

      for (var i = 0; i < this.letters.length; i++) {
        console.log();
        if (i >= this.letters.length / 2) {
          this.line = line2;
        }
        this.time = this.time + this.getRandomArbitrary(100, 300);
        this.setLetter(this.letters.charAt(i), this.line, this.time);
        if (i == this.letters.length - 1) {
          setTimeout(() => {
            let cursor = document.querySelector(".cursor");
            cursor.classList.add("blink");
          }, this.time);
        }
      }
    },
    setLetter(letter, line, timeout) {
      let cursor = document.querySelector(".cursor");
      setTimeout(() => {
        cursor.remove();
        let span = document.createElement("span");
        span.classList.add("letter");
        line.append(span);
        span.append(letter);
        line.append(cursor);
      }, timeout);
    },
    reset() {
      let spans = document.querySelectorAll("span.letter");
      spans.forEach(function(span) {
        span.remove();
      });
      let cursor = document.querySelector(".cursor");
      cursor.remove();
      let line1 = document.querySelector(".typoline1");
      line1.append(cursor);
      cursor.classList.remove("blink");
      this.time = 300;
      this.typing();
    },
    getRandomArbitrary(min, max) {
      return Math.random() * (max - min) + min;
    },
    inputblur() {
      window.scrollTo(0, 0);
    }
  }
};
</script>

<style lang="scss" scoped>
$yellow: #fff273;
$yellow_op: rgba(255, 242, 115, 0.4);
$violet: #655aa4;
.playground {
  position: relative;
  width: 100%;
  height: 80vh;
  max-height: 600px;
  @media (max-width: 640px) {
    max-height: 282px;
  }
  box-sizing: border-box;
  overflow-x: hidden;
  background-color: $violet;
  .container {
    height: 100%;
  }
  .typo-poster {
    padding: 80px 0 50px 0;
    position: relative;
    width: 100%;
    margin: auto;
    height: calc(100% - 90px);
    color: $yellow;
    font-size: 250px;
    line-height: 250px;
    @media (max-width: 640px) {
      padding: 20px 0 0px 0;
      margin-bottom: 20px;
      font-size: 120px;
      line-height: 120px;
      height: calc(100% - 80px);
    }
    .line {
      position: relative;
      height: 175px;
      border-top: 1px solid $yellow_op;
      border-bottom: 1px solid $yellow_op;
      margin-bottom: 50px;
      transition: all 0.3s;
      @media (max-width: 640px) {
        height: 77px;
        margin-bottom: 30px;
      }
      &::before {
        content: "";
        position: absolute;
        height: 1px;
        background: $yellow_op;
        width: 100%;
        top: 40px;
        left: 0;
        transition: inherit;
        @media (max-width: 640px) {
          top: 19px;
        }
      }
      &::after {
        content: "";
        position: absolute;
        height: 1px;
        background: $yellow_op;
        width: 100%;
        bottom: 20px;
        left: 0;
        transition: inherit;
        @media (max-width: 640px) {
          bottom: -10px;
        }
      }
      .typoline {
        position: relative;
        transform: translateY(-58px);
        text-align: center;
        font-weight: 400;
        @media (max-width: 640px) {
          transform: translateY(-27px);
        }
      }
      &:hover {
        border-top: 1px solid $yellow;
        border-bottom: 1px solid $yellow;
        &::before {
          background: $yellow;
        }
        &::after {
          background: $yellow;
        }
      }
    }
    .cursor {
      display: inline-block;
      width: 5px;
      background: white;
      height: 175px;
      transform: translateY(20px);
      margin-left: 15px;
      @media (max-width: 640px) {
        height: 75px;
        margin-left: 10px;
        transform: translateY(1px);
      }
    }
    .blink {
      animation-name: blink;
      animation-duration: 0.7s;
      animation-iteration-count: infinite;
    }
  }
  @keyframes blink {
    0% {
      opacity: 1;
    }
    50% {
      opacity: 0;
    }
    100% {
      opacity: 1;
    }
  }

  .controls {
    input.letters {
      border-radius: 0;
      background: transparent;
      color: $yellow;
      border: none;
      border-bottom: 1px solid $yellow_op;
      width: 150px;
      font-size: 30px;
      text-align: center;
      &:focus {
        font-weight: 600;
        outline: none;
      }
    }
    button {
      background: $yellow;
      width: 40px;
      height: 40px;
      color: $violet;
      border: none;
      font-size: 22px;
      &:hover {
        border: 2px solid $yellow;
        color: $violet;
      }
    }
  }
}
</style>
