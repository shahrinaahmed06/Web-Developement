// file simpleajax.js
// using POST method
var xhr = createRequest();
function getData(dataSource, divID, aName, aPwd) {
 if(xhr) {
 var obj = document.getElementById(divID);
 var requestbody ="name="+encodeURIComponent(aName)+"&pwd="+encodeURIComponent(aPwd);
 xhr.open("POST", dataSource, true);
 xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 xhr.onreadystatechange = function() {
 alert(xhr.readyState); // to let us see the state of the computation
 if (xhr.readyState == 4 && xhr.status == 200) {
 obj.innerHTML = xhr.responseText;
 } // end if
 } // end anonymous call-back function
 xhr.send(requestbody);
 } // end if
} // end function getData() 