var input = document.getElementById("input");

input.oninput = function () {
    if (!isNumber(input.value)) {
        input.value = input.value.substring(0, input.value.length - 1);
    }
};

function numberOnClick(number) {
    var value = input.value + number.toString();
    if (isNumber(value)) {
        input.value = value;
    }
}

function isNumber(possibleNumber) {
    return possibleNumber === parseFloat(possibleNumber).toString();
}