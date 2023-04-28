
// Get the modal
var deletemodal = document.getElementById("delete-modal");
var editmodal = document.getElementById("edit-modal");
var blockmodal = document.getElementById("block-modal");
var unblockmodal = document.getElementById("unblock-modal");
var addDrivermodal = document.getElementById("addDriver-modal");

var globalid="";
// When the user clicks on <span> (x), close the modal
function cancelEdit() {
  editmodal.style.display = "none";
  globalid="";
}
function cancelDelete() {
  deletemodal.style.display = "none";
}
function cancelBlock() {
  blockmodal.style.display = "none";
}
function cancelUnblock() {
  unblockmodal.style.display = "none";
}
function cancelAddDriver() {
  addDrivermodal.style.display = "none";
}
function closeShowimage() {
  showimagemodal.style.display = "none";
  globalid="";
}
// Confirm Add Driver
function confirmAddDriver() {
  addDrivermodal.style.display = "none";
  //using ajax
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      //document.getElementById("userslist").innerHTML=this.responseText;
      //var response= this.responseText;
      //alert("Delete: "+response+" Global id:"+globalid);
      searchDriver(document.getElementById("search-box").value);
    }
  }
  xmlhttp.open("POST","../../controller/employee/control_add_Driver.php?",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("userid="+globalid);
}
// Confirm Delete
function confirmDelete() {
  deletemodal.style.display = "none";
  //using ajax
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      //document.getElementById("userslist").innerHTML=this.responseText;
      //var response= this.responseText;
      //alert("Delete: "+response+" Global id:"+globalid);
      searchDriver(document.getElementById("search-box").value);
    }
  }
  xmlhttp.open("POST","../../controller/employee/control_delete_Driver.php?",true);
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
      document.getElementById("message").innerHTML=this.responseText;
      //var response= this.responseText;
      //alert("Delete: "+response+" Global id:"+globalid);
      searchDriver(document.getElementById("search-box").value)
    }
  }
  xmlhttp.open("POST","../../controller/employee/control_edit_driver.php?",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("edit-did="+document.getElementById('edit-did').innerHTML
                +"&edit-dname="+document.getElementById("edit-dname").value
                +"&edit-demail="+document.getElementById("edit-demail").value
                +"&edit-dcontact="+document.getElementById("edit-dcontact").value
                +"&edit-daddress="+document.getElementById("edit-daddress").value
                +"&edit-dlicense="+document.getElementById("edit-dlicense").value
                +"&edit-dcommission="+document.getElementById("edit-dcommission").value
                +"&edit-daccount="+document.getElementById("edit-daccount").value
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
      //document.getElementById("message").innerHTML=this.response;
      //var response= this.responseText;
      //alert("Delete: "+response+" Global id:"+globalid);
      searchDriver(document.getElementById("search-box").value);
    }
  }
  xmlhttp.open("POST","../../controller/employee/control_block_Driver.php?",true);
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
      //document.getElementById("message").innerHTML=this.response;
      //var response= this.responseText;
      //alert("Delete: "+response+" Global id:"+globalid);
      searchDriver(document.getElementById("search-box").value);
    }
  }
  xmlhttp.open("POST","../../controller/employee/control_unblock_Driver.php?",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("userid="+globalid);
}

// When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }
//Add
function validateAddDriver()
{
  var dname = document.getElementById("dname").value;
  var demail = document.getElementById("demail").value;
  var dcontact = document.getElementById("dcontact").value;
  var daddress = document.getElementById("daddress").value;
  var dlicense = document.getElementById("dlicense").value;
  var did = document.getElementById("did").value;
  var dcommission = document.getElementById("dcommission").value;
  if(dname=="" || demail=="" || dcontact=="" || daddress=="" || dlicense=="" || did=="" || dcommission =="")
  {
    document.getElementById("add-driver-error-message").innerHTML="Fill up all fields";
    //alert(dname+demail+dcontact+daddress+dlicense+did+dcommission);
    return false;
  }
  else
  {
    document.getElementById("add-driver-error-message").innerHTML="";
    //addDrivermodal.style.display = "none";
    //using ajax
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        alert("Successfully added.");
      }
    }
    xmlhttp.open("POST","../../controller/employee/control_add_Driver.php?",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("dname="+dname
                  +"&demail="+demail
                  +"&dcontact="+dcontact
                  +"&daddress="+daddress
                  +"&dlicense="+dlicense
                  +"&dcommission="+dcommission
                  +"&did="+did
                  );
    return true;
  }
}
function addDriver()
{
    addDrivermodal.style.display = "block";
    // document.getElementById("deletepara").innerHTML="Do you wand to delete ID: "+userid;
    // document.getElementById('delete-userimg').setAttribute("src", "../profile_image/"+userimage);
    //globalid=userid;
}
function deleteDriver(userid, userimage)
{
    deletemodal.style.display = "block";
    document.getElementById("deletepara").innerHTML="Do you wand to delete ID: "+userid;
    document.getElementById('delete-userimg').setAttribute("src", "../profile_image/"+userimage);
    globalid=userid;
}
//block
function blockDriver(userid, userimage)
{
  blockmodal.style.display = "block";
  document.getElementById("block-para").innerHTML="Do you wand to Block ID: "+userid;
  document.getElementById('block-userimg').setAttribute("src", "../profile_image/"+userimage);
  globalid=userid;
}
//unblock
function unblockDriver(userid, userimage)
{
  unblockmodal.style.display = "block";
  document.getElementById("unblock-para").innerHTML="Do you wand to unblock ID: "+userid;
  document.getElementById('unblock-userimg').setAttribute("src", "../profile_image/"+userimage);
  globalid=userid;
}
//edit
function editDriver(did, dname, demail, dcontact, daddress, dlicense, dcommission, daccount, dimage)
{
    editmodal.style.display = "block";
    // document.getElementById("edit-para").innerHTML="Do you wand to edit ID: "+userid;
    document.getElementById('edit-did').innerHTML=did;
    document.getElementById('edit-dname').setAttribute("value", dname);
    document.getElementById('edit-demail').setAttribute("value", demail);
    document.getElementById('edit-dcontact').setAttribute("value", dcontact);
    // document.getElementById('edit-paddress').setAttribute("value", paddress);
    document.getElementById('edit-daddress').innerHTML=daddress;
    document.getElementById('edit-dlicense').setAttribute("value", dlicense);
    document.getElementById('edit-dcommission').setAttribute("value", dcommission);
    document.getElementById('edit-daccount').setAttribute("value", daccount);
    document.getElementById('edit-userimg').setAttribute("src", "../profile_image/"+dimage);
}
// //Search
// function searchDriver(userid) {
 
//   var xmlhttp=new XMLHttpRequest();
//   xmlhttp.onreadystatechange=function() {
//     if (this.readyState==4 && this.status==200) {
//       document.getElementById("driver-list").innerHTML=this.responseText;
//     }
//   }
//   xmlhttp.open("POST","Driver_list.php?",true);
//   xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
//   xmlhttp.send("userid="+userid);
// }
function searchDriver(userid) {
 
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("driver-list").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("POST","driver_list.php?",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("userid="+userid);
}
  