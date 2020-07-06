/*
   author: Shahrina Ahmed 17999929
   this file sending data through xhr to requestAssign.php
   to check the unassigned booking and for bookings within next 2hours

*/
var xhr = createRequest();

function book(dataSource, divID, BookingNumber) {
    if (xhr)
     {
        
        var obj = document.getElementById(divID);
        // Sending  data assignForRequest file using POST method
        var requestbody = "BookingNumber=" + encodeURIComponent(BookingNumber);
        
        xhr.open("POST", dataSource, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
       
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
               
                obj.innerHTML = "<span>" + xhr.responseText + "</span>";
            } 
        } 
        xhr.send(requestbody);
    } 
}

function assign(dataSource, divID, date) {
    if (xhr) 
    {
        var obj = document.getElementById(divID);
        
        var requestbody = "date=" + encodeURIComponent(date);
        xhr.open("POST", dataSource, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                
                obj.innerHTML = "<span>" + xhr.responseText + "</span>";
            } 
        } 
        xhr.send(requestbody);
    }
    }