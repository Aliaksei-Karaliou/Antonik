function onNumberClick(event) {
    var button = event.currentTarget;
    if (input.value.length < 16) {
        input.value += button.textContent;
    }
}

function deleteFirst() {
    input.value = input.value.substring(1, input.value.length);
    emptyInputCheck();
}

function deleteLast() {
    input.value = input.value.substring(0, input.value.length - 1);
    emptyInputCheck();
}

function emptyInputCheck() {
    if (input.value.length == 0) {
        input.value = "0";
    }
}

function clear() {
    input.value = "0";
}

function plusMinus() {
    if (input.value.substring(0, 1) != "-") {
        input.value = "-" + input.value;
    } else {
        deleteFirst();
    }
}