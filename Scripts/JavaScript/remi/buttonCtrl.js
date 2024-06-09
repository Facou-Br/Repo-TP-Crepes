function incrementTotal(change) {
    let cartInput = document.querySelector('.panier.input');
    if (cartInput) {
        let currentCount = parseInt(cartInput.value);
        cartInput.value = currentCount + change;
    }
}

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.increment').forEach(button => {
        button.addEventListener('click', function () {
            let input = this.previousElementSibling;
            input.value = parseInt(input.value) + 1;
            incrementTotal(+1);
        });
    });

    document.querySelectorAll('.decrement').forEach(button => {
        button.addEventListener('click', function () {
            let input = this.nextElementSibling;
            if (parseInt(input.value) > 0) {
                input.value = parseInt(input.value) - 1;
                incrementTotal(-1);
            }
        });
    });
});