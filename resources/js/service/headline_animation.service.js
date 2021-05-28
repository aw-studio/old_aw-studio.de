const updateHeadlines = () => {
    let headlines = document.querySelectorAll('.h1');
    headlines.forEach((headline) => {
        if (isInViewport(headline)) {
            headline.classList.add('aw--animate');
        } else {
            headline.classList.remove('aw--animate');
        }
    });
};

function isInViewport(elem) {
    var bounding = elem.getBoundingClientRect();
    return bounding.top < window.innerHeight * 0.7;
}

let main = document.querySelector('main');

main.addEventListener('scroll', () => {
    updateHeadlines();
});

setTimeout(function () {
    updateHeadlines();
}, 200);
