let nameInput = document.getElementById("name");
let licenseInput = document.getElementById("license");
let phoneInput = document.getElementById("phone");


let emailDelivery = JSON.parse(localStorage.getItem("emailDelivery"));
let idDelivery;
fetch(`http://localhost/footer-hunter/implementation/getDeliveryData.php?email=${emailDelivery}`).then(res => res.json())
    .then(data => {
        console.log(data)
        idDelivery = data[0].id;
        nameInput.value = data[0].name;
        licenseInput.value = data[0].license;
        phoneInput.value = data[0].phone;
        console.log(idDelivery)
    })

document.getElementById("updateData").addEventListener("click", () => {
    const formData = new FormData();
    formData.append('id', idDelivery);
    formData.append('license', licenseInput.value);
    formData.append('name', nameInput.value);
    formData.append('phone', phoneInput.value);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/footer-hunter/implementation/updatedelivery.php', true);
    xhr.send(formData);
})
