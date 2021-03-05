<template>
    <button @click="toggleNav()" aria-label="Navigation" class="aw-burger">
        <span></span>
        <span></span>
    </button>
</template>

<script>
export default {
    methods: {
        toggleNav() {
            let body = document.querySelector('body');
            body.classList.toggle('aw-nav-open');
            body.classList.add('aw-nav-animating');
            setTimeout(() => {
                body.classList.remove('aw-nav-animating');
            }, 700);
            this.updateBurger();
        },
        updateBurger() {
            let button = document.querySelector('button.aw-burger');
            if (button.classList.contains('rotation')) {
                setTimeout(() => {
                    button.classList.remove('rotation');
                }, 200);
                setTimeout(() => {
                    button.classList.remove('overlap');
                }, 500);
            } else {
                setTimeout(() => {
                    button.classList.add('overlap');
                }, 200);
                setTimeout(() => {
                    button.classList.add('rotation');
                }, 500);
            }
        },
    },
};
</script>

<style lang="scss" scoped>
button {
    width: 40px;
    height: 40px;
    position: relative;
    right: -5px;
    transition: all 0.3s;
    &:focus {
        outline: none;
    }
    &:active {
        transform: scale(0.75);
        span {
            height: 3px;
        }
    }
    span {
        position: absolute;
        width: 30px;
        height: 2px;
        background: white;
        border-radius: 1px;
        transition: all 0.3s;
        left: 5px;
        &:first-child {
            top: 15px;
        }
        &:last-child {
            top: 25px;
        }
    }
    &.overlap {
        span {
            &:first-child {
                top: 20px;
            }
            &:last-child {
                top: 20px;
            }
        }
    }
    &.rotation {
        span {
            &:first-child {
                transform: rotate(45deg);
            }
            &:last-child {
                transform: rotate(-45deg);
            }
        }
    }
}

#app.aw-home {
    button {
        span {
            background: #161616;
        }
    }
}

#app.aw-home.aw--scrolled,
body.aw-nav-open #app.aw-home {
    button {
        span {
            background: white;
        }
    }
}
</style>
