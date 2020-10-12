//this moves the signup form onto the page (and if the login form is open then that will automatically close)
function openForm() {
  document.getElementById("root").style.marginLeft = "5px";
  document.getElementById("hidebutton").style.marginLeft= "75px";
  document.getElementById("loginFormRoot").style.marginLeft= "-400px";
}
//closes the signup form
function closeForm() {
document.getElementById("root").style.marginLeft= "-400px";
document.getElementById("hidebutton").style.marginLeft= "-400px";
}
//this moves the login form onto the page (and if the signup form is open then that will automatically close)
function openForm2(){
document.getElementById("loginFormRoot").style.marginLeft = "5px";
document.getElementById("hidebutton2").style.marginLeft= "25px";
document.getElementById("root").style.marginLeft= "-400px";
document.getElementById("hidebutton").style.marginLeft= "-400px";
}
//closes the login form
function closeForm2(){
document.getElementById("loginFormRoot").style.marginLeft= "-400px";
}
