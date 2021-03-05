const nav = document.querySelector("#aw-nav");

nav.onscroll = function() {
  if (nav.scrollTop > 0) {
    nav.classList.add("aw--scrolled");
  } else {
    nav.classList.remove("aw--scrolled");
  }
};
