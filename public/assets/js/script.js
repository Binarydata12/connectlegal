var lawyerRegisterPage = false;
const handleClickOutside = (e) => {
    if(!lawyerRegisterPage){
        if (!e.target.closest('.sidebar')) {
            document.getElementById("mySidebar").style.left = '-300%';
        }
    }
};
document.addEventListener('click', handleClickOutside, true);

var form = document.getElementById("forgotPasswordCheck");

function handleForm(event) { event.preventDefault(); } 

form.addEventListener('submit', handleForm);

function w3_open_lawyer() {
    lawyerRegisterPage = true;
    showContent2();
    if(window.innerWidth >= 924){
        w3_open();
    }
}

function opencontactnow() {
document.getElementById("contactnowPopup").style.display = "block";
}

function closecontactnow(){
    document.getElementById("contactnowPopup").style.display = "none";
}

function openForm() {
w3_close();
document.getElementById("myForm1").style.display = "block";
}

function openLogin(){

    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
    document.getElementById("myForm1").style.display = 'block';
    document.getElementById("myForm2").style.display = 'none';
    document.getElementById("myForm3").style.display = 'none';
}

function openRegister(){

    document.getElementById("myForm1").style.display = 'none';
    document.getElementById("myForm2").style.display = 'block';
    document.getElementById("myForm3").style.display = 'none';
}

function closeForm() {
    document.getElementById("myForm1").style.display = 'none';
    document.getElementById("myForm2").style.display = 'none';
    document.getElementById("myForm3").style.display = 'none';
}

function w3_open() {
  document.getElementById("mySidebar").style.left = 0;
}

function w3_close() {
  document.getElementById("mySidebar").style.left = '-300%';
}
function showContent1() {

    document.getElementById("content1").style.display = 'block';
    document.getElementById("content2").style.display = 'none';

    document.getElementById("sidebar-menu-btn1").style.color= '#208C84';
    document.getElementById("sidebar-menu-btn2").style.color= 'black';
}

function showContent2() {

    document.getElementById("content1").style.display = 'none';
    document.getElementById("content2").style.display = 'block';
    
    document.getElementById("sidebar-menu-btn2").style.color= '#208C84';
    document.getElementById("sidebar-menu-btn1").style.color= 'black';
}

function openSignUpUser(){

    document.getElementById("myForm1").style.display = 'none';
    document.getElementById("myForm2").style.display = 'none';
    document.getElementById("myForm3").style.display = 'block';
}

function myAccFunc(number){
    var x = document.getElementById(`demoAcc${number}`);
    if (x.className.indexOf("show-item") == -1) {
        x.className += "show-item";
        x.previousElementSibling.style.backgroundColor = '#E8F8F2';
    } else { 
        x.className = x.className.replace("show-item", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-green", "");
        x.previousElementSibling.style.backgroundColor = '#fff';
    }
}

function openPostaQn(){
    closecontactnow();
    document.getElementById("openPostaQnPopup").style.display = 'block';
}

function closePostaQn(){
    document.getElementById("openPostaQnPopup").style.display = 'none';
}

function openOptions(){
    // document.getElementById("userOptions").style.display = 'block';
    // console.log('working');
    document.getElementById("userOptions").classList.toggle("userOptionsBlock");
}

function forgotPassword() {
    document.getElementById("myForm1").style.display = 'none';
    document.getElementById("forgotPassword").style.display = 'flex';
}

function closeForgotPassword() {
    document.getElementById("forgotPassword").style.display = 'none';
}

function sendResetPasswordLink(){
    document.getElementById("forgotPassword").style.display = 'none';
    document.getElementById("forgotPasswordConfirm").style.display = 'flex';
}

function closeForgotPasswordConfirm()
{
    document.getElementById("forgotPasswordConfirm").style.display = 'none';
}


