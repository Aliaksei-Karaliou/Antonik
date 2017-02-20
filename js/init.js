var numbersAndDot = [
    document.getElementById("1"),
    document.getElementById("2"),
    document.getElementById("3"),
    document.getElementById("4"),
    document.getElementById("5"),
    document.getElementById("6"),
    document.getElementById("7"),
    document.getElementById("8"),
    document.getElementById("9"),
    document.getElementById("0"),
    document.getElementById(".")
];

for (var i = 0; i < numbersAndDot.length; i++) {
    numbersAndDot[i].addEventListener('click', onNumberClick);
}

var input = document.getElementById("input_line");
input.value = "0";

var deleteLastButton = document.getElementById("delete_last");
deleteLastButton.onclick = deleteLast;

var clearButton = document.getElementById("clear");
clearButton.onclick = clear;

var clearAllButton = document.getElementById("clear_all");
clearAllButton.onclick = clearAll;

var plusMinusButton = document.getElementById("plusminus");
plusMinusButton.onclick = plusMinus;

var inverseNumberButton = document.getElementById("inverse");
inverseNumberButton.onclick = inverseNumber;

var squareRootButton = document.getElementById("square_root");
squareRootButton.onclick = squareRoot;

var squareButton = document.getElementById("square");
squareButton.onclick = square;

var plusButton = document.getElementById("plus");
plusButton.onclick = add;

var minusButton = document.getElementById("minus");
minusButton.onclick = minus;

var multiplyButton = document.getElementById("multiply");
multiplyButton.onclick = multiply;