
// Get the modal

//Search
function searchtrip(search) {
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("triplist").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("POST","trip_list.php?",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("search="+search);
}
function changeDriver(tripid)
{
  document.getElementById("change-driver-modal").style.display="block";
  document.getElementById("trip-id-for-change-driver").innerHTML=tripid;
  document.getElementById("change-driver-id-error").innerHTML="";
}
function confirm_changeDriver()
{
  document.getElementById("change-driver-modal").style.display="none";
}
function cancel_changeDriver()
{
  document.getElementById("change-driver-modal").style.display="none";
}
function submitChangeDriver()
{
  var driverid=document.getElementById("driver-id").value;
  var tripid=document.getElementById("trip-id-for-change-driver").innerHTML;
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      if(this.responseText=="success")
      {
        document.getElementById("change-driver-modal").style.display="none";
        searchtrip(document.getElementById("search-box").value);
        alert("Driver ID is set as "+driverid+" for trip ID "+tripid);
      }
      else
      {
        document.getElementById("change-driver-id-error").innerHTML=this.responseText;
      }
    }
  }
  xmlhttp.open("POST","../../controller/employee/control_change_trip_driver.php?",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("driverid="+driverid
                +"&tripid="+tripid);
}
  