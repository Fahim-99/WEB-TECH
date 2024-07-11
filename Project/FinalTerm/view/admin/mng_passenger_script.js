
// Get the modal
var deletemodal = document.getElementById("delete-modal");
var editmodal = document.getElementById("edit-modal");
var blockmodal = document.getElementById("block-modal");
var unblockmodal = document.getElementById("unblock-modal");
var showimagemodal = document.getElementById("showimage-modal");

var globalid="";
// When the user clicks on <span> (x), close the modal
function cancelEdit() {
  editmodal.style.display = "none";
  globalid="";
}
function cancelDelete() {
  deletemodal.style.display = "none";
  globalid="";
}
function cancelBlock() {
  blockmodal.style.display = "none";
  globalid="";
}
function cancelUnblock() {
  unblockmodal.style.display = "none";
  globalid="";
}
function closeShowimage() {
  showimagemodal.style.display = "none";
  globalid="";
}
// Confirm Delete
function confirmDelete() {
  deletemodal.style.display = "none";
  //using ajax
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      //document.getElementById("userslist").innerHTML=this.responseText;
      var response= this.responseText;
      //alert("Delete: "+response+" Global id:"+globalid);
      searchpassenger(document.getElementById("search-box").value)
    }
  }
  xmlhttp.open("POST","../../controller/employee/control_delete_passenger.php?",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("userid="+globalid);
}
//Confirmation of Edit
function confirmEdit() {
  editmodal.style.display = "none";
  //using ajax
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      //document.getElementById("message").innerHTML=this.responseText;
      //var response= this.responseText;
      //alert("Delete: "+response+" Global id:"+globalid);
      searchpassenger(document.getElementById("search-box").value)
    }
  }
  xmlhttp.open("POST","../../controller/employee/control_edit_passenger.php?",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("edit-pid="+document.getElementById('edit-pid').innerHTML
                +"&edit-pname="+document.getElementById("edit-pname").value
                +"&edit-pemail="+document.getElementById("edit-pemail").value
                +"&edit-pcontact="+document.getElementById("edit-pcontact").value
                +"&edit-paddress="+document.getElementById("edit-paddress").value
                );
}
// Confirm Block
function confirmBlock() {
  blockmodal.style.display = "none";
  //using ajax
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      //document.getElementById("userslist").innerHTML=this.responseText;
      var response= this.responseText;
      //alert("Delete: "+response+" Global id:"+globalid);
      searchpassenger(document.getElementById("search-box").value)
    }
  }
  xmlhttp.open("POST","../../controller/employee/control_block_passenger.php?",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("userid="+globalid);
}
// Confirm unBlock
function confirmUnblock() {
  unblockmodal.style.display = "none";
  //using ajax
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      //document.getElementById("userslist").innerHTML=this.responseText;
      var response= this.responseText;
      //alert("Delete: "+response+" Global id:"+globalid);
      searchpassenger(document.getElementById("search-box").value)
    }
  }
  xmlhttp.open("POST","../../controller/employee/control_unblock_passenger.php?",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("userid="+globalid);
}

// When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }
//edit
function editPassenger(pid, pname, pemail, pcontact, paddress, pimage)
{
    editmodal.style.display = "block";
    // document.getElementById("edit-para").innerHTML="Do you wand to edit ID: "+userid;
    document.getElementById('edit-pid').innerHTML=pid;
    document.getElementById('edit-pname').setAttribute("value", pname);
    document.getElementById('edit-pemail').setAttribute("value", pemail);
    document.getElementById('edit-pcontact').setAttribute("value", pcontact);
    // document.getElementById('edit-paddress').setAttribute("value", paddress);
    document.getElementById('edit-paddress').innerHTML=paddress;
    document.getElementById('edit-userimg').setAttribute("src", "../profile_image/"+pimage);
}
//delete
function deletePassenger(userid, userimage)
{
    deletemodal.style.display = "block";
    document.getElementById("deletepara").innerHTML="Do you wand to delete ID: "+userid;
    document.getElementById('delete-userimg').setAttribute("src", "../profile_image/"+userimage);
    globalid=userid;
}
//Show Image
function showImage(userimage)
{
    showimagemodal.style.display = "block";
    document.getElementById('show-userimg').setAttribute("src", "../profile_image/"+userimage);
}
//block
function blockPassenger(userid, userimage)
{
  blockmodal.style.display = "block";
  document.getElementById("block-para").innerHTML="Do you wand to Block ID: "+userid;
  document.getElementById('block-userimg').setAttribute("src", "../profile_image/"+userimage);
  globalid=userid;
}
//unblock
function unblockPassenger(userid, userimage)
{
  unblockmodal.style.display = "block";
  document.getElementById("unblock-para").innerHTML="Do you wand to unblock ID: "+userid;
  document.getElementById('unblock-userimg').setAttribute("src", "../profile_image/"+userimage);
  globalid=userid;
}
//Search
function searchpassenger(userid) {
 
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("userslist").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("POST","passenger_list.php?",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("userid="+userid);
}
// function search_driver(userid) {
 
//   var xmlhttp=new XMLHttpRequest();
//   xmlhttp.onreadystatechange=function() {
//     if (this.readyState==4 && this.status==200) {
//       document.getElementById("driver-list").innerHTML=this.responseText;
//     }
//   }
//   xmlhttp.open("POST","driver_list.php?",true);
//   xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
//   xmlhttp.send("userid="+userid);
// }
  