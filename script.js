const firstArgument = document.getElementById('arg1');
const secondArgument = document.getElementById('arg2');
const operations = document.getElementById('operations');

firstArgument.onclick = function () {
    var firstValue = prompt('Input first argument', '');
    firstArgument.innerHTML = firstValue;
};
operations.onchange = function () {
    var result="Sign is not valid";
    if (!isNumber(firstArgument.innerHTML)) {
        result = "Argument 1 is not valid";
    } else if (!isNumber(secondArgument.value)) {
        result = "Argument 2 is not valid";
    } else if (operations.value === "+") {
        result = makeNumberGreatAgain(parseFloat(firstArgument.innerHTML) + parseFloat(secondArgument.value));
    } else if (operations.value === "-") {
        result = makeNumberGreatAgain(parseFloat(firstArgument.innerHTML) - parseFloat(secondArgument.value));
    } else if (operations.value === "*") {
        result = makeNumberGreatAgain(parseFloat(firstArgument.innerHTML) * parseFloat(secondArgument.value));
    } else if (operations.value === "/") {
        if (parseFloat(secondArgument.value) == 0) {
            result = "Dividing by zero!";
        }
        else
        result = makeNumberGreatAgain(parseFloat(firstArgument.innerHTML) / parseFloat(secondArgument.value));
    } else if (operations.value === "%") {
        if (parseFloat(secondArgument.value) == 0) {
            result = "Dividing by zero!";
        }
        else
        result = makeNumberGreatAgain(parseFloat(firstArgument.innerHTML) % parseFloat(secondArgument.value));
    }
    var newWin = window.open("about:blank", "hello", "width=200,height=200");

    newWin.document.write(result)
};
function isNumber(possibleNumber) {
    return possibleNumber === parseFloat(possibleNumber).toString();
}

function makeNumberGreatAgain(number) {
    return parseFloat(number).toFixed(13).replace(/0+$/, '').replace(/\.$/, '');
}


