// Get Elements
let namePartner = document.getElementById("namePartner");
let totalUsers = document.getElementById("totalUsers");
let averageRating = document.getElementById("averageRating");
let totalSales = document.getElementById("totalSales");
let totalOrders = document.getElementById("totalOrders");

// Get Email Local Storage
const data = JSON.parse(localStorage.getItem('data'));


fetch(`http://localhost/footer-hunter/implementation/getPartnerData.php?email=${data}`)
    .then(res => res.json())
    .then(data => {
        namePartner.innerHTML = data[0].name + " " + `<i class="fa-solid fa-shop"></i>`;
        localStorage.setItem("dataPartner", JSON.stringify(data[0]))
        fetch(`http://localhost/footer-hunter/implementation/getOrdersPartner.php?id=${data[0].id}`)
        .then(res => res.json())
        .then(data=>{
            console.log(data)
            totalOrders.innerHTML = data.length;
            if(data.length === 0) {
                totalSales.innerHTML = "0";
            }else {
                totalSales.innerHTML = data.map(ele=>ele.totalPrice).reduce((ele,acc)=>acc+ele);
            }
        })
        fetch(`http://localhost/footer-hunter/implementation/getUsersPartner.php?id=${data[0].id}`)
        .then(res => res.json())
        .then(data=>{
            totalUsers.innerHTML = data.length;
        })
        fetch(`http://localhost/footer-hunter/implementation/getfeedback.php?id=${data[0].id}`)
        .then(res => res.json())
        .then(data=>{
            if(data.length === 0) {
                averageRating.innerHTML = "0/0";
            }else {
                let total = data.map(e=> +e.ratings).reduce((ele,acc)=>ele+acc);
                averageRating.innerHTML = total / data.length + "/5";
            }

        })
    })



