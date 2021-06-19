window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("main_logo").style.display = "none";
    document.getElementById("stiky_logo").style.display = "block";
    // var element = ;
    document.getElementById("header").classList.add("stiky_header");
  } else {
    document.getElementById("main_logo").style.display = "block";
    document.getElementById("stiky_logo").style.display = "none";
    document.getElementById("header").classList.remove("stiky_header");
  }
}
