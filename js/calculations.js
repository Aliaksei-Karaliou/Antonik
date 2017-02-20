var finalize = false;
var firstValue = null;


function inverseNumber() {
    input.value = makeNumberGreatAgain((1 / input.value));
    finalize = true;
}

function squareRoot() {
    input.value = makeNumberGreatAgain(Math.sqrt(input.value));
    finalize = true;
}

function square() {
    input.value = makeNumberGreatAgain(input.value * input.value);
}

function abstractCalculation(action) {
    if (firstValue != null) {
        var temp = input.value;
        console.log(input.value, firstValue, finalize);
        input.value = action(temp, firstValue);
        if (!finalize) {
            firstValue = temp;
        }
    }
    else {
        firstValue = input.value;
    }
    console.log(input.value, firstValue, finalize);
    finalize = true;
}

function add() {
    abstractCalculation(function (a, b) {
        return parseFloat(a) + parseFloat(b);
    });
}

function minus() {
    abstractCalculation(function (a, b) {
        return parseFloat(a) - parseFloat(b);
    })
}

function multiply() {
    abstractCalculation(function (a, b) {
        return parseFloat(a) * parseFloat(b);
    })
}

function makeNumberGreatAgain(number) {
    return parseFloat(number).toFixed(maxNumberLength - 1).replace(/0+$/, '').replace(/\.$/, '');
}
