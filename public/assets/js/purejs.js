window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("main_logo").style.display = "none";
    document.getElementById("stiky_logo").classList.add('d-block');
    document.getElementById("stiky_logo").classList.remove('d-none');
    // var element = ;
    document.getElementById("header").classList.add("stiky_header");
  } else {
    document.getElementById("main_logo").style.display = "block";
    document.getElementById("stiky_logo").classList.add('d-none');
    document.getElementById("stiky_logo").classList.remove('d-block');
    document.getElementById("header").classList.remove("stiky_header");
  }
}

// function OnFunc(){
// document.querySelector(".schedule_tabs").querySelector(".list").classList.add("active");
// }

document.querySelector("#pills-tab").querySelector(".nav-item").querySelector("button").classList.add("active");


//password matching of register form
    function Validate() {
        var password = document.getElementById("logPassword").value;
        var confirmPassword = document.getElementById("logConfirmPassword").value;
        if (password != confirmPassword) {
            const element =document.getElementById('confirmChackVal');
            element.innerHTML ='Passwords do not match.';
            element.classList.add('text-danger');
        }else{
            const elementconf =document.getElementById('confirmChackVal');
            elementconf.innerHTML ='Passwords has been matched.';
            elementconf.classList.remove('text-danger');
            elementconf.classList.add('text-success');
        }
        
    }
// input type password to text of login form
function Passshow(){
    document.querySelector('#logInPassword').type = 'text';
}

