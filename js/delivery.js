let email = JSON.parse(localStorage.getItem("emailDelivery"))
let idDel;
fetch(`http://localhost/footer-hunter/implementation/getDeliveryData.php?email=${email}`)
    .then(res => res.json())
    .then(dataAll => {
        dataAll.forEach(data => {
            console.log(data)
            document.getElementById("name").innerHTML = data.name;
            document.getElementById("email").innerHTML = data.email;
            document.getElementById("phone").innerHTML = data.phone;
            document.getElementById("licenses").innerHTML = data.license;
            idDel = data.id
            fetch(`http://localhost/footer-hunter/implementation/showDeliveredOrder.php?id=${data.id}`)
                .then(res => res.json())
                .then(dataAll => {
                    document.getElementById("totalOrders").innerHTML = dataAll.length;
                    let total = dataAll.map(data => +data.fees).reduce((ele,acc)=>ele + acc);
                    document.getElementById("totalSales").innerHTML = total;
                })
        });
    })

fetch(`http://localhost/footer-hunter/implementation/showOrderRequestDelivery.php`)
    .then(res => res.json())
    .then(dataAll => {
        dataAll.forEach(data => {
            let div = document.createElement("div");
            div.setAttribute("class", "col-lg-10")
            div.setAttribute("id", "data-orderID" + data.id)
            div.innerHTML =
                `
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Order ID : <span>${data.id}</span> </h5>
                    </div>
                    <div class="col-lg-6">
                        <h5>Order Details : <span>${data.details} </span></h5>
                    </div>
                    <div class="col-lg-6">
                        <h5>Delivery Fees : <span>${data.fees} </span></h5>
                    </div>
                    <div class="col-lg-6">
                        <h5>Meal Price : <span>${data.mealPrice}</span></h5>
                    </div>
                    <div class="col-lg-6">
                        <h5>Order Time : <span>${data.orderTime}</span></h5>
                    </div>
                    <div class="col-lg-6">
                        <h5>Restaurant : <span>${data.restaurant}</span></h5>
                    </div>
                    <div class="col-lg-6">
                        <h5>Restaurant Address : <span>${data.partnerLocation}</span></h5>
                    </div>
                    <div class="col-lg-6">
                    <h5>User Name : <span>${data.userName}</span></h5>
                    </div>
                    <div class="col-lg-6">
                    <h5>User Phone : <span>${data.userPhone}</span></h5>
                    </div>
                    <div class="col-lg-6">
                    <h5>User Address : <span>${data.userLocation}</span></h5>
                    </div>
                </div>
                <div class="buttons mt-3">
                    <button data-status="accept" data-id=${data.id} class="accept">Accept</button>
                </div>
            </div>
        </div>        
        `
            document.getElementById("requests").append(div)
        });

        let acceptButtons = document.querySelectorAll(".accept");

        acceptButtons.forEach(acceptButton => {
            acceptButton.addEventListener("click", () => {
                let idButton = acceptButton.getAttribute("data-id");
                document.getElementById(`data-orderID${idButton}`).remove();
                const formData = new FormData();
                formData.append('orderId', acceptButton.getAttribute("data-id"));
                formData.append('deliveryId', idDel);
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'http://localhost/footer-hunter/implementation/deliverOrder.php', true);
                xhr.send(formData);
            })
        })
    })