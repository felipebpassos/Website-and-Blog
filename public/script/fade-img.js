window.addEventListener('scroll', function() {
    var image = document.getElementById('imagem-fade');
    var section = document.querySelector('.apresentacao-principal');
    var sectionHeight = section.offsetHeight; // Altura da seção
    var scrollPosition = window.scrollY; // Posição atual do scroll

    // Calcula a opacidade com base na posição do scroll
    var opacity = 1 - 1.3*(scrollPosition / sectionHeight);
    
    // Define a opacidade da imagem
    image.style.opacity = opacity;

    // Adiciona a classe para fade-out quando a opacidade é menor que 0
    if (opacity < 0) {
        image.classList.add('fade-out');
    } else {
        image.classList.remove('fade-out');
    }
});
