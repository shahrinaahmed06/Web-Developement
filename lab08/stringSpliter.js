function stringSpliter()
{
    var strings = prompt("String: ", "Write your Input Here");
    strings = strings.split(" ");
    for (var i = 0, max = strings.length; i < max; i++) {
        document.write(strings[i] + "<br>");
    }
}


