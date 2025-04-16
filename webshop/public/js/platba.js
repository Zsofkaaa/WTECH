document.addEventListener('DOMContentLoaded', () => {
    const radioCard = document.getElementById('radio-card');
    const radioCash = document.getElementById('radio-cash');
    const cardInputs = document.querySelectorAll('.form-control');
    const submitButton = document.querySelector('.btn-dark');

    function selectPayment(option) {
        radioCard.classList.remove('selected');
        radioCash.classList.remove('selected');
        document.getElementById(`radio-${option}`).classList.add('selected');

        const isCard = option === 'card';

        cardInputs.forEach(input => {
            input.disabled = !isCard;
        });
    }

    window.selectPayment = selectPayment;

    submitButton.addEventListener('click', (e) => {
        if (radioCard.classList.contains('selected')) {
            for (const input of cardInputs) {
                if (input.value.trim() === '') {
                    e.preventDefault();
                    alert('Vyplň všetky údaje o karte.');
                    return;
                }
            }
        }

        window.location.href = '/dakujeme';
    });
});
