// Função para verificar se um elemento está visível na tela
function isElementInViewport(el) {
    var rect = el.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

// Função para adicionar a classe 'active' aos elementos visíveis
function handleScrollAnimations() {
    var elements = document.querySelectorAll('.fade-in-slide-up');
    elements.forEach(function(element) {
        if (isElementInViewport(element)) {
            element.classList.add('ativo');
        }
    });
}

// Verifique quando o usuário faz scroll
window.addEventListener('scroll', handleScrollAnimations);

// Execute a função inicialmente para verificar elementos visíveis na carga da página
window.addEventListener('load', handleScrollAnimations);