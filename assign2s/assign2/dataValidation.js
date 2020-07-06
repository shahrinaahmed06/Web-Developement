// file simpleajax.js
var xhr = createRequest();

function getData(dataSource, ID) {
    
    alert("Your Booking Request is being Processing!!");
    
    var isValid = true;
    var data_invalid = "Your inputs are invalid because "

    if (aName === "" || aPhone === "" || aStreet === "" || aDestination === "" || aDate === "" || aTime === "") {
        isValid = false;
        data_invalid += " you have not provides all necessary details. ";
    }

    var Date_given = new Date(aDate + " " + aTime);
    
    var current_Date = new Date();
    if (current_Date.valueOf() > Date_given.valueOf())
    {
        isValid = false;
        data_invalid += " your Pickup Date is before current date. ";
    }

    if (aName.length > 40)
    {
        isValid = false;
        data_invalid += " your Name is very long. ";
    }

    if (aPhone.length > 20)
    {
        isValid = false;
        data_invalid += " your Phone number is very long. ";
    }

    if (aStreet.length > 50)
    {
        isValid = false;
        data_invalid += " your pickup address is too long. ";
    }

    if (aDestination.length > 20)
    {
        isValid = false;
        data_invalid += "your destination suburb is very long.";
    }

    var container = document.getElementsByClassName("container")[0];
    if (container.children.length > 2) {
        var elem = container.children[2];
        container.removeChild(elem);
    }
    var content = document.createElement("div");
    content.className = "content";
    var r = document.createElement("r");
    var message = "";
    if (!isValid)
    {
        r.innerHTML = "" + data_invalid;
        content.appendChild(r);
        container.appendChild(content);
    } else {
        if (xhr) {
            var requestBody = "&name=" + encodeURIComponent(aName) + 
                              "&phone=" + encodeURIComponent(aPhone) + 
                              "&unitNumber="  + encodeURIComponent(aUnitNumber) + 
                              "&street=" + encodeURIComponent(aStreet) + 
                              "&destination=" + encodeURIComponent(aDestination) +
                              "&date=" + encodeURIComponent(aDate) + 
                              "&time=" + encodeURIComponent(aTime);

            xhr.open("POST", url, true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    
                    message = xhr.responseText;
                    r.innerHTML = message;
                    content.appendChild(r);
                    container.appendChild(content);
                }
            };
            xhr.send(requestBody);
        } 
    }


}