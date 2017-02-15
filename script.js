var input = document.getElementById("input");
var temp = null;

input.oninput = function () {
    if (!isNumber(input.value)) {
        var deleted = input.value.substring(input.value.length - 1);
        input.value = input.value.substring(0, input.value.length - 1);
        if (deleted == '+') {
            onPlus();
        }
    }
};

function onNumberClick(number) {
    var value = input.value + number.toString().replace(/^0+/, '');
    alert(value);
    if (isNumber(value)) {
        input.value = value;
    }
}

function onPlus() {
    alert("Plus");
}

function isNumber(possibleNumber) {
    return possibleNumber === parseFloat(possibleNumber).toString();
}