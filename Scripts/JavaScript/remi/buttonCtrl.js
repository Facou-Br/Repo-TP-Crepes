window.onload = function() {
    const decrement = document.getElementsByClassName('decrement');
    const increment = document.getElementsByClassName('increment');
    const inputs = document.getElementsByClassName('input');

    for(let i = 0; i < decrement.length; i++) {
        decrement[i].addEventListener('click', () => {
            inputs[i].value = parseInt(inputs[i].value) - 1;
            if (inputs[i].value < 0) inputs[i].value = 0;
            saveValueInSession('input' + i);
        });
    }

    for(let i = 0; i < increment.length; i++) {
        increment[i].addEventListener('click', () => {
            inputs[i].value = parseInt(inputs[i].value) + 1;
            saveValueInSession('input' + i);
        });
    }
}


function saveValueInSession(inputId) {
    var value = document.getElementById(inputId).value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/Scripts/PhP/Remi/addToCart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("id=" + inputId + "&value=" + value);
    console.log("id=" + inputId + ", value=" + value);
}