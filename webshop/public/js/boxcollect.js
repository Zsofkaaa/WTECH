document.addEventListener('DOMContentLoaded', function () {
    const submitBtn = document.getElementById('submit-btn');
    const form = document.getElementById('shipping-form');

    submitBtn.addEventListener('click', function (e) {
        const inputs = form.querySelectorAll('input');
        let isValid = true;

        inputs.forEach(input => {
            const pattern = input.getAttribute('pattern');
            const regex = pattern ? new RegExp(pattern) : null;

            if (!input.value || (regex && !regex.test(input.value))) {
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');
                isValid = false;
            } else {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
            }
        });

        if (!isValid) {
            e.preventDefault();
        } else {
            window.location.href = form.getAttribute('data-next-url');
        }
    });
});
