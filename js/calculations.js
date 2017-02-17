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

function plus() {
    if (firstValue != null) {
        if (isNumber(firstValue) && parseFloat(input.value)) {
            var temp = parseFloat(input.value);
            console.log(firstValue + " " + temp + " " + finalize);
            input.value = parseFloat(firstValue) + temp;
            if (!finalize) {
                firstValue = temp;
            }
        }
        else {
            alert("Unknown error");
            return;
        }
    } else {
        firstValue = input.value;
    }
    finalize = true;
}

function minus() {
    if (firstValue != null) {
        if (isNumber(firstValue) && isNumber(input.value)) {
            var temp = parseFloat(input.value);
            console.log(firstValue + " " + temp + " " + finalize);
            input.value = parseFloat(firstValue) - temp;
            if (!finalize) {
                firstValue = temp;
            }
        }
        else {
            alert("Unknown error");
            return;
        }
    } else {
        firstValue = input.value;
    }
    finalize = true;
}

function makeNumberGreatAgain(number) {
    return parseFloat(number).toFixed(maxNumberLength - 1).replace(/0+$/, '').replace(/\.$/, '');
}
