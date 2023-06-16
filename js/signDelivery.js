let inputName = document.getElementById("name");
let inputEmail = document.getElementById("email");
let inputPassword = document.getElementById("password");
let inputPhone = document.getElementById("phone");
let inputLicense = document.getElementById("license");
let inputConfirmPassword = document.getElementById("confirmPassword");
let submit = document.getElementById("submit");

let nameTrue = false;
let emailTrue = false;
let passwordTrue = false;
let conPasswordTrue = false;
let licenseTrue = false;
let phoneTrue = false;

inputName.addEventListener("input",(e)=>{
    inputName.style.boxShadow = "none"
    if(e.target.value.length >=7 ){
        inputName.classList.add("true");
        inputName.classList.remove("false");
        nameTrue = true;
    }else {
        nameTrue = false;
        inputName.classList.add("false");
        inputName.classList.remove("true");
    }
})

inputEmail.addEventListener("input",(e)=>{
    inputEmail.style.boxShadow = "none"
    if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(inputEmail.value)){
        inputEmail.classList.add("true");
        inputEmail.classList.remove("false");
        emailTrue = true;
    }else {
        emailTrue = false;
        inputEmail.classList.add("false");
        inputEmail.classList.remove("true");
    }
})

inputPassword.addEventListener("input",(e)=>{
    inputPassword.style.boxShadow = "none"
    if(e.target.value.length >= 8 ){
        inputPassword.classList.add("true");
        inputPassword.classList.remove("false");
        passwordTrue = true;
    }else {
        passwordTrue = false;
        inputPassword.classList.add("false");
        inputPassword.classList.remove("true");
    }
})

inputConfirmPassword.addEventListener("input",(e)=>{
    inputConfirmPassword.style.boxShadow = "none"
    if(e.target.value.length === inputPassword.value.length ){
        inputConfirmPassword.classList.add("true");
        inputConfirmPassword.classList.remove("false");
        conPasswordTrue = true;
    }else {
        conPasswordTrue = false;
        inputConfirmPassword.classList.add("false");
        inputConfirmPassword.classList.remove("true");
    }
})

inputLicense.addEventListener("input",(e)=>{
    inputLicense.style.boxShadow = "none"
    if(e.target.value.length === 7 ){
        inputLicense.classList.add("true");
        inputLicense.classList.remove("false");
        licenseTrue = true;
    }else {
        licenseTrue = false;
        inputLicense.classList.add("false");
        inputLicense.classList.remove("true");
    }
})

inputPhone.addEventListener("input",(e)=>{
    inputPhone.style.boxShadow = "none"
    if(e.target.value.length === 11 ){
        inputPhone.classList.add("true");
        inputPhone.classList.remove("false");
        phoneTrue = true;
    }else {
        phoneTrue = false;
        inputPhone.classList.add("false");
        inputPhone.classList.remove("true");
    }
})


submit.addEventListener('submit', function (e) {
    if(nameTrue && emailTrue && passwordTrue && conPasswordTrue && licenseTrue && phoneTrue ) {
        const formData = new FormData();
        formData.append('name', inputName.value);
        formData.append('email', inputEmail.value);
        formData.append('phone', inputPhone.value);
        formData.append('password', inputPassword.value);
        formData.append('license', inputLicense.value);
    
    
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://localhost/footer-hunter/implementation/signUpDelivery.php', true);
    
        xhr.onload = function () {
            if (xhr.status === 200) {
                console.log('تم تحميل الصورة بنجاح.');
            } else {
                console.log('فشل تحميل الصورة.');
            }
        };
    
        xhr.send(formData);
        localStorage.setItem("emailDelivery",JSON.stringify(inputEmail.value));
    }else {
        e.preventDefault();
    }
});

