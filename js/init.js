const numbersAndDot = [
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

for (let i = 0; i < numbersAndDot.length; i++) {
    numbersAndDot[i].addEventListener('click', onNumberClick);
}

const input = document.getElementById("input_line");
input.value = 0;
// Object.defineProperty(input, "value", {
//     set: function (v) {
//         alert(v);
//     }
// });

const deleteLastButton = document.getElementById("delete_last");
deleteLastButton.onclick = deleteLast;

const clearButton = document.getElementById("clear");
clearButton.onclick = clear;

const clearAllButton = document.getElementById("clear_all");
clearAllButton.onclick = clearAll;

const plusMinusButton = document.getElementById("plusminus");
plusMinusButton.onclick = plusMinus;

const inverseNumberButton = document.getElementById("inverse");
inverseNumberButton.onclick = inverseNumber;

const squareRootButton = document.getElementById("square_root");
squareRootButton.onclick = squareRoot;

const squareButton = document.getElementById("square");
squareButton.onclick = square;

const equalsButton = document.getElementById("equals");
equalsButton.onclick = equals;

const plusButton = document.getElementById("plus");
plusButton.onclick = add;

const minusButton = document.getElementById("minus");
minusButton.onclick = minus;

const multiplyButton = document.getElementById("multiply");
multiplyButton.onclick = multiply;

const divideButton = document.getElementById("divide");
divideButton.onclick = divide;

const factorialButton = document.getElementById("fact");
factorialButton.onclick = fact;

const sinusButton = document.getElementById("sin");
sinusButton.onclick = sin;

const cosinusButton = document.getElementById("cos");
cosinusButton.onclick = cos;

const tangensButton = document.getElementById("tg");
tangensButton.onclick = tg;

const cotangensButton = document.getElementById("ctg");
cotangensButton.onclick = ctg;

const percentButton = document.getElementById("percent");
percentButton.onclick = percent;