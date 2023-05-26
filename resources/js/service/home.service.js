import Typed from "typed.js";

if (document.getElementById("typed-buzzwords")) {
    const buzzwords = document
        .querySelector("#buzzwords")
        .dataset.buzzwords.split(",");
    var typed = new Typed("#typed-buzzwords", {
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
