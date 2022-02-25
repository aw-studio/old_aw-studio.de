import Typed from 'typed.js';

const buzzwords = document.querySelector('h1').dataset.buzzwords.split(',');

if (document.getElementById('typed-buzzwords')) {
    var typed = new Typed('#typed-buzzwords', {
        strings: buzzwords,
        typeSpeed: 50,
        backSpeed: 20,
        //fadeOut: true,
        //fadeOutClass: 'typed-fade-out',
        //fadeOutDelay: 300,
        loop: true,
        loopCount: Infinity,
    });
}
