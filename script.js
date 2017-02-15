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
    if (isNumber(value)) {
        input.value = value;
    }
}

function onPlus() {
    alert("Plus");
}

function deleteLast() {
    input.value = input.value.substring(0, input.value.length - 1);
    if (input.value.length == 0) {
        input.value = 0;
    }
}

function deleteAll() {
    input.value = 0;
}

function isNumber(possibleNumber) {
    return possibleNumber === parseFloat(possibleNumber).toString();
}