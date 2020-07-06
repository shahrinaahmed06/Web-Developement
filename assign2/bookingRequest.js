/*
    Author Shahrina Ahmed
    bookingRequest.js file is using POST to send the booking request
    through xhr.js
    Two method has defined in this file 
*/
var xhr = createRequest();

function bookRequest(dataSource, ID) {
    if (xhr) {

        var name = document.getElementById("nameField")
        var phone = document.getElementById("phoneField")
        var unit = document.getElementById("unitField")
        var streetNumber = document.getElementById("streetNumberField")
        var streetName = document.getElementById("streetNameField")
        var date = document.getElementById("dateField")
        var time = document.getElementById("timeField")
        var destination = document.getElementById("destinationField")

        var obj = document.getElementById(ID);
        // Send data bookingProcess.php file using POST method
        var requestbody = "name=" + encodeURIComponent(name.value)
            + "&phone=" + encodeURIComponent(phone.value)
            + "&unit=" + encodeURIComponent(unit.value)
            + "&streetNumber=" + encodeURIComponent(streetNumber.value)
            + "&streetName=" + encodeURIComponent(streetName.value)
            + "&date=" + encodeURIComponent(date.value)
            + "&time=" + encodeURIComponent(time.value)
            + "&destination=" + encodeURIComponent(destination.value);
        
        
            xhr.open("POST", dataSource, true);
        
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
            // Response on ready state
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                
                obj.innerHTML = "<span style='color:black'>" + xhr.responseText + "</span>";
            }
        }
        xhr.send(requestbody);
    }
}