// Adiciona uma classe ao body quando a página é rolada
window.addEventListener('scroll', function() {
    var body = document.querySelector('body');
    if (window.scrollY == 0) {
      body.classList.add('hide-scroll');
    } else {
      body.classList.remove('hide-scroll');
    }
});
  