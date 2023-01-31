let navopen=document.querySelector(".nvbar")
let classblur=document.querySelector(".containerbody")
function openNav(){
    navopen.classList.toggle("activenav")
   classblur.classList.toggle("classblur")
}
function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
}
function mypass(){
    var x = document.getElementById("signInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
 
  
 


  let indnum=document.querySelector(`.quant`)
  let indnum1=document.querySelector(`.quant1`)

  function increment(){
      indnum.stepUp();
      indnum1.value=indnum.value;
    }

    function decrement(){
        indnum.stepDown();
        indnum1.value=indnum.value;
  }

  

  

  let modalopen=document.getElementById("modopen")
  let modal=document.getElementById("mymodal")
  let closebtn=document.getElementById("closem")

  modalopen.onclick=function(){
    modal.style.display="block";
  }

  closebtn.onclick=function(){
    modal.style.display="none";
  }

  




function lood(){
setInterval(function(){
  document.getElementsByClassName("lodder-wrap")[0].style.display="none";
},200)
}

let oponer = document.getElementsByClassName("Settingbar")
function CloseNav(){
    oponer.classList.toggle("navgator")
}
  
