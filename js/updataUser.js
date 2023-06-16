let nameInput = document.getElementById("name");
let emailInput = document.getElementById("email");
let locationInput = document.getElementById("location");
let phoneInput = document.getElementById("phone");


let emailUser = JSON.parse(localStorage.getItem("emailUser"));
let idUser;
fetch(`http://localhost/footer-hunter/implementation/getUserData.php?email=${emailUser}`).then(res => res.json())
    .then(data => {
        idUser = data[0].id;
        nameInput.value = data[0].name;
        emailInput.value = data[0].email;
        locationInput.value = data[0].location;
        phoneInput.value = data[0].phone;
    })

document.getElementById("updateData").addEventListener("click", () => {
    const formData = new FormData();
    formData.append('id', idUser);
    formData.append('location', locationInput.value);
    formData.append('name', nameInput.value);
    formData.append('email', emailInput.value);
    formData.append('phone', phoneInput.value);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/footer-hunter/implementation/updateUser.php', true);
    xhr.send(formData);
})
