const EMPTY_SIGN = -1;
const PLUS_SIGN = 0;
const MINUS_SIGN = 1;
const MULTIPLY_SIGN = 2;
const DIVIDE_SIGN = 3;

let finalize = false;
let firstValue = null;
let secondValue = null;
let sign = EMPTY_SIGN;


function inverseNumber() {
    setInputValue((1 / getInputValue()));
    finalize = true;
}

function squareRoot() {
    if (getInputValue() >= 0) {
        setInputValue(Math.sqrt());
    } else {
        setInputValue(Infinity);
    }
    finalize = true;
}

function square() {
    setInputValue(getInputValue() * getInputValue());
    finalize = true;
}

function add() {
    firstValue = getInputValue();
    sign = PLUS_SIGN;
    finalize = true;
}

function minus() {
    firstValue = getInputValue();
    sign = MINUS_SIGN;
    finalize = true;
}

function multiply() {
    firstValue = getInputValue();
    sign = MULTIPLY_SIGN;
    finalize = true;
}

function divide() {
    firstValue = getInputValue();
    sign = DIVIDE_SIGN;
    finalize = true;
}

function equals() {
    if (firstValue != null) {
        if (secondValue == null) {
            secondValue = getInputValue();
        } else if (finalize) {
            firstValue = getInputValue();
        }
        let result;
        if (sign == PLUS_SIGN) {
            result = parseFloat(firstValue) + parseFloat(secondValue);
        } else if (sign == MINUS_SIGN) {
            result = parseFloat(firstValue) - parseFloat(secondValue);
        } else if (sign == MULTIPLY_SIGN) {
            result = parseFloat(firstValue) * parseFloat(secondValue);
        } else if (sign == DIVIDE_SIGN) {
            result = parseFloat(firstValue) / parseFloat(secondValue);
        }
        firstValue = result;
        setInputValue(result);
        finalize = true;
    }
}

function intFact(number) {
    let result = 1;
    for (let i = 2; i <= number; i++) {
        result *= i;
    }
    return makeNumberGreatAgain(result);
}

function fact() {
    let value = parseFloat(getInputValue());
    if (value < 0) {
        setInputValue(Infinity);
        return;
    }
    let int = Math.floor(value);
    let fractal = parseFloat(makeNumberGreatAgain(getInputValue() - int));
    let message = Math.log10(intFact(int)) + fractal * Math.log10(int + 1);
    setInputValue(Math.pow(10, message));
    finalize = true;
}

function degreeToRadian(degree) {
    return degree * Math.PI / 180;
}

function sinh() {
    setInputValue(Math.sinh(getInputValue()));
    finalize = true;
}

function cosh() {
    setInputValue(Math.cosh(getInputValue()));
    finalize = true;
}


function tgh() {
    setInputValue(Math.tanh(getInputValue()));
    finalize = true;
}

function ctgh() {
    setInputValue(1 / Math.tanh(getInputValue()));
    finalize = true;
}

function percent() {
    if (firstValue == null) {
        setInputValue(0);
    } else {
        secondValue = firstValue * getInputValue() / 100;
        setInputValue(secondValue);
        console.log(firstValue, secondValue);
    }
}

function pi() {
    setInputValue(Math.PI);
    finalize = true;
}

function makeNumberGreatAgain(number) {
    return parseFloat(number).toFixed(9).replace(/0+$/, '').replace(/\.$/, '');
}
