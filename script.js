var button = document.getElementById("result");

button.onclick = function () {

    var argument1, argument2;
    if (isNumber(document.getElementById("arg1").value)) {
        argument1 = parseFloat(document.getElementById("arg1").value);
    }
    else {
        button.value = "Argument 1 is not number";
        return;
    }
    if (isNumber(document.getElementById("arg2").value)) {
        argument2 = parseFloat(document.getElementById("arg2").value);
    }
    else {
        button.value = "Argument 2 is not number";
        return;
    }

    var sign = document.getElementById("sign").value;
    switch (sign) {
        case "+":
            button.value = makeNumberGreatAgain(argument1 + argument2);
            break;
        case "-":
            button.value = makeNumberGreatAgain(argument1 - argument2);
            break;
        case "*":
            button.value = makeNumberGreatAgain(argument1 * argument2);
            break;
        case "/":
            button.value = makeNumberGreatAgain(argument1 / argument2);
            break;
        case "%":
            button.value = argument1 % argument2;
            break;
        default:
            button.value = "Sign is not valid";
            break;
    }

};

function isNumber(possibleNumber) {
    return possibleNumber === parseFloat(possibleNumber).toString();
}

function makeNumberGreatAgain(number) {
    return parseFloat(number).toFixed(13).replace(/0+$/, '').replace(/\.$/, '');
}


