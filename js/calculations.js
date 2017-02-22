const EMPTY_SIGN = -1;
const PLUS_SIGN = 0;
const MINUS_SIGN = 1;
const MULTIPLY_SIGN = 2;
const DIVIDE_SIGN = 3;

var finalize = false;
var firstValue = null;
var sign = EMPTY_SIGN;


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
    finalize = true;
}

function add() {
    firstValue = input.value;
    sign = PLUS_SIGN;
    finalize = true;
}

function minus() {
    firstValue = input.value;
    sign = MINUS_SIGN;
    finalize = true;
}

function multiply() {
    firstValue = input.value;
    sign = MULTIPLY_SIGN;
    finalize = true;
}

function divide() {
    firstValue = input.value;
    sign = DIVIDE_SIGN;
    finalize = true;
}

function equals() {
    var number = parseFloat(input.value);
    if (sign == PLUS_SIGN) {
        input.value = makeNumberGreatAgain(parseFloat(firstValue) + number);
    } else if (sign == MINUS_SIGN) {
        if (!finalize) {
            input.value = makeNumberGreatAgain(parseFloat(firstValue) - number);
        } else {
            input.value = makeNumberGreatAgain(number - parseFloat(firstValue));
        }
    } else if (sign == MULTIPLY_SIGN) {
        input.value = makeNumberGreatAgain(parseFloat(firstValue) * number);
    } else if (sign == DIVIDE_SIGN) {
        if (!finalize) {
            input.value = makeNumberGreatAgain(parseFloat(firstValue) / number);
        } else {
            input.value = makeNumberGreatAgain(number / parseFloat(firstValue));
        }
    } else {
        sign = EMPTY_SIGN;
    }
    if (!finalize) {
        firstValue = number;
    }
    finalize = true;
}

function intFact(number) {
    var result = 1;
    for (var i = 2; i <= number; i++) {
        result *= i;
    }
    return makeNumberGreatAgain(result);
}

function fact() {
    var value = parseFloat(input.value);
    if (value < 0) {
        input.value = NaN;
    }
    var int = Math.floor(value);
    var fractal = parseFloat(makeNumberGreatAgain(input.value - int));
    var message = Math.log10(intFact(int)) + fractal * Math.log10(int + 1);
    input.value = makeNumberGreatAgain(Math.pow(10, message));
    finalize = true;
}

function degreeToRadian(degree) {
    return degree * Math.PI / 180;
}

function sin() {
    input.value = makeNumberGreatAgain(Math.sin(degreeToRadian(input.value)));
    finalize = true;
}

function cos() {
    input.value = makeNumberGreatAgain(Math.cos(degreeToRadian(input.value)));
    finalize = true;
}


function tg() {
    input.value = makeNumberGreatAgain(Math.tan(degreeToRadian(input.value)));
    finalize = true;
}

function ctg() {
    input.value = makeNumberGreatAgain(1 / Math.tan(degreeToRadian(input.value)));
    finalize = true;
}

function makeNumberGreatAgain(number) {
    return parseFloat(number).toFixed(9).replace(/0+$/, '').replace(/\.$/, '');
}
