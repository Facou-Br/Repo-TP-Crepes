const decrement = document.getElementsByClassName('decrement');
const increment = document.getElementsByClassName('increment');
const inputs = document.getElementsByClassName('input');

for(let i = 0; i < decrement.length; i++) {
    decrement[i].addEventListener('click', () => {
        inputs[i].value = parseInt(inputs[i].value) - 1;
        if (inputs[i].value < 0) inputs[i].value = 0;

    });
}

for(let i = 0; i < increment.length; i++) {
    increment[i].addEventListener('click', () => {
        inputs[i].value = parseInt(inputs[i].value) + 1;
    });
}