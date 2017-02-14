var button = document.getElementById("result");

button.onclick = function () {
    try {
        var argument1 = parseFloat(document.getElementById("arg1").value);
    }
    catch (error) {
        alert(button.value);
        return;
    }
    var sign = document.getElementById("arg1").value;
    var argument2 = parseFloat(document.getElementById("arg2").value);

    button.value = argument1 + argument2;

};
