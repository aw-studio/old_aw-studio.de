const main = document.querySelector('main');
const app = document.querySelector('#app');

main.onscroll = function () {
    if (main.scrollTop > 0) {
        app.classList.add('aw--scrolled');
    } else {
        app.classList.remove('aw--scrolled');
    }
};
