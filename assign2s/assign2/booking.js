var xhr = createRequest();

function booking(dataSource, ID) {
    if (xhr) {

        var name = document.getElementById("nameField")
        var phone = document.getElementById("phoneField")
        var unitNumber = document.getElementById("unitNumberField")
        var street = document.getElementById("streetField")
        var destination = document.getElementById("destinationField")

        var date = document.getElementById("dateField")
        var time = document.getElementById("timeField")
       
       
       
        var obj = document.getElementById(ID);
        // Send data booking.php file using POST method
        var requestbody = "name=" + encodeURIComponent(name.value)
                         + "&phone=" + encodeURIComponent(phone.value)
                         + "&unitNumber=" + encodeURIComponent(unitNumber.value)
                         + "&street=" + encodeURIComponent(street.value)
                         + "&destination=" + encodeURIComponent(destination.value);
                         + "&date=" + encodeURIComponent(date.value)
                         + "&time=" + encodeURIComponent(time.value)
                       
                        
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