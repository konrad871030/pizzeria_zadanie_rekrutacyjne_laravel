document.addEventListener('DOMContentLoaded', function () {
    const pizzaSelect = document.getElementById('pizza_type');
    const orderButtons = document.querySelectorAll('.order-button');

    if (!pizzaSelect || orderButtons.length === 0) {
        return;
    }

    orderButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            pizzaSelect.value = button.dataset.pizzaId || '';
        });
    });
});
