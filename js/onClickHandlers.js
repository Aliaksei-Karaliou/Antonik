function onNumberClick(event) {
    var button = event.currentTarget;
    var temp;
    if (finalize) {
        clear();
        finalize = false;
    }
    temp = input.value + button.textContent;
    if (isNumber(temp) && temp.length < 11) {
        input.value = temp;
    }
    if (input.value.substring(0, 1) == "0" && input.value.substring(1, 2) != ".") {
        input.value = input.value.substring(1, input.value.length);
        emptyInputCheck();
    }
}

function deleteLast() {
    if (!input.value.includes("e")) {
        input.value = input.value.substring(0, input.value.length - 1);
        emptyInputCheck();
    }
}

function emptyInputCheck() {
    if (input.value.length == 0) {
        input.value = "0";
    }
}

function clear() {
    input.value = "0";
}

function clearAll() {
    input.value = "0";
    firstValue = true;
    finalize = false;
}

function plusMinus() {
    if (input.value != "0") {
        if (input.value.substring(0, 1) != "-") {
            input.value = "-" + input.value;
        } else {
            input.value = input.value.substring(1, input.value.length);
        }
    }
}

function isNumber(possibleNumber) {
    return parseFloat(possibleNumber) == possibleNumber;
}

function checkInput() {
    alert("Ok")
}

