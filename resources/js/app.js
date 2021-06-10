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
