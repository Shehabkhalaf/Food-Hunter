let statuss = "";
let id;
fetch(`http://localhost/footer-hunter/implementation/requestsAdmin.php`)
    .then(res => res.json())
    .then(dataAll => {
        dataAll.forEach(data => {
            let div = document.createElement("div");
            div.setAttribute("class", "col-lg-10")
            div.setAttribute("id", "data-numRequest"+data.id)
            div.innerHTML =
                `
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Name : <span>${data.name}</span> </h5>
                    </div>
                    <div class="col-lg-6">
                        <h5>Email : <span>${data.email} </span></h5>
                    </div>
                    <div class="col-lg-6">
                        <h5>Phone : <span>${data.phone} </span></h5>
                    </div>
                    <div class="col-lg-6">
                        <h5>License : <span>${data.license}</span></h5>
                    </div>
                </div>
                <div class="buttons mt-3">
                    <button data-status="accept" data-id=${data.id} class="accept">Accept</button>
                    <button data-status="reject" data-id=${data.id} class="reject">Reject</button>
                </div>
            </div>
        </div>        
        `
            document.getElementById("requests").append(div)
        });

        let acceptButtons = document.querySelectorAll(".accept");
        let rejectButtons = document.querySelectorAll(".reject");

        acceptButtons.forEach(acceptButton => {
            acceptButton.addEventListener("click", () => {
                Swal.fire({
                    title: 'Confirmation of the approval request?',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        Swal.fire('operation accomplished successfully!', '', 'success')
                    }

                    id = acceptButton.getAttribute("data-id");
                    statuss = acceptButton.getAttribute("data-status");
                    addDelivery(id, statuss);
                })
            })
        })

        rejectButtons.forEach(rejectButton => {
            rejectButton.addEventListener("click", () => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your been deleted.',
                            'success'
                        )
                    }
                    id = rejectButton.getAttribute("data-id");
                    statuss = rejectButton.getAttribute("data-status");
                    addDelivery(id, statuss);
                })
            })
        })

    })



function addDelivery(id, statuss) {
    console.log(id)
    const formData = new FormData();
    formData.append('adminId',"1");
    formData.append('deliveryId', id);
    formData.append('status', statuss);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost/footer-hunter/implementation/hireDelivery.php', true);
    xhr.send(formData);

    document.getElementById(`data-numRequest${id}`).remove();
}

fetch(`http://localhost/footer-hunter/implementation/getAlldelivery.php`)
.then(res=>res.json())
.then(data=>{
    document.getElementById("totalDelivery").innerHTML = data.length;
})

fetch(`http://localhost/footer-hunter/implementation/getAllusersAdmin.php`)
.then(res=>res.json())
.then(data=>{
    document.getElementById("totalUsers").innerHTML = data.length;
})


fetch(`http://localhost/footer-hunter/implementation/partnersReportAdmin.php`)
.then(res=>res.json())
.then(data=>{
    document.getElementById("totalOrders").innerHTML = data.length;
})

