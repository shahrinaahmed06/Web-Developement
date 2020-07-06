// JavaScript Document

function makeTable() {
    var theTable = document.getElementById("tbl");
    //IE requires rows to be added to a tBody element
    //IE automatically creates a tBody element - delete it and then manually create
    if (theTable.firstChild != null) {
        var badIEBody = theTable.childNodes[0];
        theTable.removeChild(badIEBody);
    }
    var tBody = document.createElement("TBODY");
    tBody.setAttribute("id", "tbody")
    theTable.appendChild(tBody);

    var newRow = document.createElement("tr");
    var c1 = document.createElement("td");
    var v1 = document.createTextNode("7308");
    c1.appendChild(v1);
    newRow.appendChild(c1);
    var c2 = document.createElement("td");
    var v2 = document.createTextNode("software engineering");
    c2.appendChild(v2);
    newRow.appendChild(c2);
    tBody.appendChild(newRow);

    newRow = document.createElement("tr");
    c1 = document.createElement("td");
    v1 = document.createTextNode("7003");
    c1.appendChild(v1);
    newRow.appendChild(c1);
    c2 = document.createElement("td");
    v2 = document.createTextNode("Web Development");
    c2.appendChild(v2);
    newRow.appendChild(c2);
    tBody.appendChild(newRow);
}

function appendRow() {
    var string = prompt("Value", "Yes");
    
    var newRow = document.createElement("tr");
    newRow.style.backgroundColor = "red";
    var c1 = document.createElement("td");
    var v1 = document.createTextNode("XXXX");
    c1.appendChild(v1);
    newRow.appendChild(c1);
    var c2 = document.createElement("td");
    var v2 = document.createTextNode(string);
    c2.appendChild(v2);
    newRow.appendChild(c2);
    document.getElementById('tbody').appendChild(newRow);
}