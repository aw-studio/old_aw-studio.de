<template>
    <div class="playground" aria-hidden="true">
        <canvas id="glcanvas" tabindex="1"></canvas>
        <div class="touch-me"><span>drag me!</span></div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {};
    },
    mounted() {},
    methods: {},
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
    background-color: #000;
    background-image: url('/images/playground4.jpg');
    background-size: cover;
    background-position: center;
    @media (max-width: 640px) {
        max-height: 300px;
    }
    @media (max-width: 768px) {
        canvas#glcanvas,
        .touch-me {
            display: none;
        }
    }
    canvas#glcanvas {
        position: absolute;
        top: -20%;
        left: 0;
        height: 120% !important;
        width: 100%;
    }
    &:hover {
        .touch-me {
            opacity: 0;
            pointer-events: none;
        }
    }
    .touch-me {
        transition: all 0.3s;
        opacity: 1;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

        span {
            display: block;
            padding: 0 10px 0 10px;
            background: #35ffff;
            font-size: 30px;
            color: black;
            animation-name: pulse;
            animation-duration: 1s;
            animation-iteration-count: infinite;
        }
    }
    @keyframes pulse {
        0% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
        100% {
            opacity: 1;
        }
    }
}
</style>
