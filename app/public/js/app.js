document.addEventListener('DOMContentLoaded', function () {
    const queueCountElement = document.getElementById('queue-count');
    const waitingTimeElement = document.getElementById('waiting-time');
    const pizzaSelect = document.getElementById('pizza_type');
    const orderButtons = document.querySelectorAll('.order-button');

    function updateQueueBadges() {
        if (!queueCountElement || !waitingTimeElement) {
            return;
        }

        fetch('/queue-status', {
            headers: {
                'Accept': 'application/json',
            },
        })
            .then(function (response) {
                if (!response.ok) {
                    throw new Error('Nie udało się pobrać statusu kolejki.');
                }

                return response.json();
            })
            .then(function (data) {
                queueCountElement.textContent = data.queue_count ?? 0;
                waitingTimeElement.textContent = data.waiting_time ?? 0;
            })
            .catch(function (error) {
                console.error(error);
            });
    }

    if (pizzaSelect && orderButtons.length > 0) {
        orderButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                pizzaSelect.value = button.dataset.pizzaId || '';
            });
        });
    }

    updateQueueBadges();
    setInterval(updateQueueBadges, 10000);
});
