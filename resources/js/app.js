require('./bootstrap');
require('./service/component.service');
require('./directives');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vue from 'vue';
import LitImage from '@aw-studio/vue-lit-image';

Vue.use(LitImage, {
    conversions: {
        sm: 300,
        md: 500,
        lg: 900,
        xl: 1400,
    },
});

const app = new Vue({
    el: '#app',
    mounted() {
        require('./service/headline_animation.service');
        require('./service/nav.service');
        require('./service/mainscroll.service');
    },
});

//typed js on home
import Typed from 'typed.js';

if (document.getElementById('typed-de')) {
    var typed = new Typed('#typed-de', {
        strings: [
            'UI/UX-Design ^300',
            'Corporate-Design ^300',
            'individuelle Websites ^300',
            'komplexe Web-Anwendungen ^300',
            'progressive Web-Apps ^300',
            'Open Source Software ^300',
        ],
        typeSpeed: 90,
        backSpeed: 10,
        //fadeOut: true,
        //fadeOutClass: 'typed-fade-out',
        //fadeOutDelay: 300,
        loop: true,
        loopCount: Infinity,
    });
}

if (document.getElementById('typed-en')) {
    var typed = new Typed('#typed-en', {
        strings: [
            'UI/UX design ^300',
            'corporate design ^300',
            'custom websites ^300',
            'complex web applications ^300',
            'progressive web apps ^300',
            'open source software ^300',
        ],
        typeSpeed: 90,
        backSpeed: 10,
        //fadeOut: true,
        //fadeOutClass: 'typed-fade-out',
        //fadeOutDelay: 300,
        loop: true,
        loopCount: Infinity,
    });
}
