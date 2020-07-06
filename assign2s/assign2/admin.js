var xhr = createRequest();

function booking(dataSource, displayID, Booking_Number) {
    if (xhr) {
        var obj = document.getElementById(displayID);
        // Send data manage.php file using POST method
        var requestbody = "Booking_Number=" + encodeURIComponent(Booking_Number);
        xhr.open("POST", dataSource, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        // Response on ready state
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
               
                obj.innerHTML = "<span>" + xhr.responseText + "</span>";
            } // end if
        } // end anonymous call-back function
        xhr.send(requestbody);
    } // end if
}

function assignment(dataSource, displayID, date) {
    if (xhr) {
        var obj = document.getElementById(displayID);
        // Send data manage.php file using POST method
        var requestbody = "date=" + encodeURIComponent(date);
        xhr.open("POST", dataSource, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        // Response on ready state
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                obj.innerHTML = "<span>" + xhr.responseText + "</span>";
            } // end if
        } // end anonymous call-back function
        xhr.send(requestbody);
    } // end if
}