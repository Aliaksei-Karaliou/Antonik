function setInputValue(number) {
    let buf;
    number = number.toString();
    if (number.substring(0, 1) == "0" && number.length >= 2 && number.substring(1, 2) != ".") {
        number = number.substring(1);
    }
    if (!isNumber(number)) {
    } else {
        if (number.substring(number.length - 1) === '.') {
            buf = number;
        } else if (number.length > 0) {
            buf = makeNumberGreatAgain(number);
        } else {
            buf = 0;
        }
        console.log(buf, isNaN(buf));
        if (!isNaN(buf) && buf != Infinity) {
            input.value = buf;
        } else {
            input.value = "Impossible";
            finalize = true;
        }
    }
}

function getInputValue() {
    return input.value;
}

function onNumberClick(event) {
    const button = event.currentTarget;
    if (finalize) {
        finalize = false;
        setInputValue(0);
    }
    const inputValue = getInputValue();
    if (inputValue.length < 11) {
        setInputValue(inputValue + button.textContent);
    }
}

function deleteLast() {
    const inputValue = getInputValue();
    if (!inputValue.includes("e")) {
        setInputValue(inputValue.substring(0, inputValue.length - 1));
    }
}

function clear() {
    setInputValue(0);
}

function clearAll() {
    setInputValue(0);
    firstValue = null;
    secondValue = null;
    finalize = false;
}

function plusMinus() {
    const inputValue = getInputValue();
    if (inputValue != "0") {
        if (inputValue.substring(0, 1) != "-") {
            setInputValue("-" + inputValue);
        } else {
            setInputValue(inputValue.substring(1, inputValue.length));
        }
    }
}

function isNumber(possibleNumber) {
    return parseFloat(possibleNumber) == possibleNumber;
}
