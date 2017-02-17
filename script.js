var numbers = [
    document.getElementById("1"),
    document.getElementById("2"),
    document.getElementById("3"),
    document.getElementById("4"),
    document.getElementById("5"),
    document.getElementById("6"),
    document.getElementById("7"),
    document.getElementById("8"),
    document.getElementById("9"),
    document.getElementById("0")
];

var input = document.getElementById("input_line");

numbers.forEach(function (item, i, numbers) {
    item.onclick = new function () {
        Console.log(item.value);
    };
});