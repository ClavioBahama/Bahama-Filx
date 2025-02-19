document.addEventListener('DOMContentLoaded', function () {
    // Inicializa o carrossel
    const prevButton = document.querySelector('.carousel-prev');
    const nextButton = document.querySelector('.carousel-next');
    const carouselInner = document.querySelector('.carousel-inner');
    let currentIndex = 0;

    function updateCarousel() {
        const items = document.querySelectorAll('.carousel-item');
        const totalItems = items.length;
        if (currentIndex >= totalItems) {
            currentIndex = 0;
        } else if (currentIndex < 0) {
            currentIndex = totalItems - 1;
        }
        carouselInner.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    nextButton.addEventListener('click', function () {
        currentIndex++;
        updateCarousel();
    });

    prevButton.addEventListener('click', function () {
        currentIndex--;
        updateCarousel();
    });

    // Configurações de Logout
    const logoutButton = document.querySelector('.btn-logout');
    if (logoutButton) {
        logoutButton.addEventListener('click', function () {
            // Adicione a lógica de logout aqui
            alert('Você foi desconectado!');
        });
    }
});




document.getElementById('register-form').addEventListener('submit', function(event) {
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirm-password').value;
    let message = document.getElementById('password-message');

    if (password !== confirmPassword) {
        message.textContent = "As senhas não coincidem!";
        message.style.color = "red";
        event.preventDefault();  // Impede o envio do formulário
    } else {
        message.textContent = "";
    }
});
