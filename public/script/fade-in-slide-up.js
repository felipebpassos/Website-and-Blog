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

// Função para adicionar a classe 'active' aos elementos visíveis com 0.5s de atraso
function handleScrollAnimationsWithDelay() {
    var elements = document.querySelectorAll('.fade-in-slide-up-delay');
    elements.forEach(function(element) {
        setTimeout(function() {
            if (isElementInViewport(element)) {
                element.classList.add('ativo');
            }
        }, 500); // 0.3 segundos de atraso
    });
}

// Função para adicionar a classe 'active' aos elementos visíveis com 1s de atraso
function handleScrollAnimationsWithLongDelay() {
    var elements = document.querySelectorAll('.fade-in-slide-up-long-delay');
    elements.forEach(function(element) {
        setTimeout(function() {
            if (isElementInViewport(element)) {
                element.classList.add('ativo');
            }
        }, 1000); // 0.6 segundo de atraso
    });
}

// Execute a função inicialmente para verificar elementos visíveis na carga da página
window.addEventListener('load', handleScrollAnimationsWithLongDelay);

// Execute a função inicialmente para verificar elementos visíveis na carga da página
window.addEventListener('load', handleScrollAnimationsWithDelay);

// Execute a função inicialmente para verificar elementos visíveis na carga da página
window.addEventListener('scroll', handleScrollAnimationsWithLongDelay);

// Execute a função inicialmente para verificar elementos visíveis na carga da página
window.addEventListener('scroll', handleScrollAnimationsWithDelay);