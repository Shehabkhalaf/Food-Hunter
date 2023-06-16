let emailUser = JSON.parse(localStorage.getItem("emailUser"));
fetch(`http://localhost/footer-hunter/implementation/getUserData.php?email=${emailUser}`).then(res => res.json()).then(data => {
    fetch(`http://localhost/footer-hunter/implementation/getOrdersUser.php?id=${data[0].id}`)
        .then(res => res.json())
        .then(dataAll => {
            dataAll.forEach(data => {
                let tr = document.createElement("tr");
                tr.innerHTML = `
            <th>${data.restaurant}</th>
            <td>${data.orderdetails}</td>
            <td>${data.totalPrice}</td>
            <td>${data.staus}</td>
        `
                document.getElementById("tableBody").append(tr)
            });
        })
})
