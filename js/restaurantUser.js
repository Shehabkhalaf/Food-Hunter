// Get Elements
let minorderElement = document.getElementById("minorder"),
    categoriesElement = document.getElementById("categories"),
    nameRestaurantElement = document.getElementById("nameRestaurant"),
    openElement = document.getElementById("open"),
    closeElement = document.getElementById("close"),
    statusElement = document.getElementById("status"),
    imgLogoElement = document.getElementById("imgLogo"),
    descriptionRestElement = document.getElementById("descriptionRest");



let foodFees;
let idPage = JSON.parse(localStorage.getItem("linkPage"));
let minOrder;

fetch("http://localhost/footer-hunter/implementation/getAllpartners.php")
    .then(res => res.json())
    .then(dataAll => {
        dataAll.forEach(data => {
            if (data.id === idPage) {
                // Add Data Restaurant
                imgLogoElement.setAttribute("src", data.logo);
                nameRestaurantElement.innerHTML = data.name;
                categoriesElement.innerHTML = data.category;
                openElement.innerHTML = data.open;
                closeElement.innerHTML = data.close;
                statusElement.innerHTML = data.status;
                minorderElement.innerHTML = data.minorder;
                descriptionRestElement.innerHTML = data.description;
                document.getElementById("totalFees").innerHTML = "EGP " + data.fees + ".00";
                document.getElementById("totalAmount").innerHTML = "EGP " + data.fees + ".00"
                foodFees = data.fees;
                minOrder = +data.minorder;
            }
        });
    })

let array = [];

fetch(`http://localhost/footer-hunter/implementation/getMeals.php?partnerid=${idPage}`)
    .then(res => res.json())
    .then(dataAll => {
        dataAll.forEach(data => {
            let div = document.createElement("div");
            div.setAttribute("class", "box d-flex pb-2 mb-3")

            div.innerHTML =
                `
                <div class="food d-flex">
                    <img src=${data.image} alt="">
                    <div class="title ps-2">
                        <h4 class="nameFood">${data.mealname}</h4>
                        <p class="description">${data.description}</p>
                    </div>
                </div>
                <div class="price ps-2 text-end">
                    <p>${data.price} EGP</p>
                    <button class="addOrder" id=${data.mealid}>add</button>
                </div>
            `
            document.getElementById("fooods").append(div)
        })
        // Add Food To Cart
        let addOrderButtons = document.querySelectorAll(".addOrder");
        addOrderButtons.forEach(addOrderButton => {
            addOrderButton.addEventListener("click", () => addToCard(dataAll.filter(data => data.mealid === addOrderButton.getAttribute("id"))[0]))
        })
    })


let listItems = [];

// ADD To Cart
function addToCard(data) {
    // Create Object Task Store Text and Place
    data.quantity = 1;
    const newPrduct = data;
    // Call Function Create Task
    createProduct(newPrduct);
    listItems.push(newPrduct);
}


let totalAm = 0;

// Create Product 
function createProduct(food) {
    let totalPrice = document.getElementById("totalPrice");
    let body = document.getElementById("bodyCart");
    // Create Element tr
    let div = document.createElement("div");
    // Add Attributes [Id]
    div.setAttribute("id", food.mealid);
    div.setAttribute("class", "product d-flex justify-content-between p-3")

    // Content Element
    div.innerHTML = `
    <input type="number"  id="${food.mealid}" class="quantityNew" min="1" name=""  value="${food.quantity}">
    <p class="nameFood">${food.mealname}</p>
    <p class="price ms-1 me-1">${food.price}</p>
    <button class="delete remove" id="delete" data-id=${food.mealid}><i class="fa-solid fa-minus"></i></button>
    `

    totalAm = +food.price + totalAm;
    totalPrice.innerHTML = "EGP " + totalAm;
    document.getElementById("totalAmount").innerHTML = "EGP " + (totalAm + +foodFees);

    body.appendChild(div);

    let quantityNew = document.querySelectorAll(".quantityNew")
    quantityNew.forEach(numberNew => {
        numberNew.addEventListener("change", (e) => {
            listItems.forEach(element => {
                if (element.mealid === e.target.getAttribute("id")) {
                    element.quantity = +e.target.value;
                }
            })
            let total = listItems.map(e => +e.quantity * +e.price).reduce((acc, ele) => acc + ele);
            totalPrice.innerHTML = "EGP " + total;
            document.getElementById("totalAmount").innerHTML = "EGP " + (total + +foodFees);
        })
    })

    // In Case Delete Element
    let remove = document.querySelectorAll(".remove");
    remove.forEach(item => {
        item.addEventListener("click", () => {
            listItems = listItems.filter(element => element.mealid !== item.getAttribute("data-id"));
            [...body.children].forEach(element => {
                if (element.getAttribute("id") === item.getAttribute("data-id")) {
                    element.remove();
                }
            })
            console.log(listItems)
            if (listItems.length === 0) {
                totalAm = 0;
                document.getElementById("checkout").classList.add("checkNone")
                totalPrice.innerHTML = "EGP " + "00.00";
                document.getElementById("totalAmount").innerHTML = "EGP " + +foodFees + ".00"
            } else {
                let total = listItems.map(e => +e.quantity * +e.price).reduce((acc, ele) => acc + ele);
                totalAm = total;
                if (totalAm < minOrder) {
                    document.getElementById("checkout").classList.add("checkNone")
                }
                totalPrice.innerHTML = "EGP " + total;
                document.getElementById("totalAmount").innerHTML = "EGP " + (total + +foodFees);
            }
        })
    })

    if (totalAm >= minOrder) {
        document.getElementById("checkout").classList.remove("checkNone")
    }

}


document.getElementById("checkout").addEventListener("click", () => {
    let des = "";
    let total = +foodFees;
    let rating = "5";
    let review = "lol"
    let feed = "ahmed";
    listItems.forEach((index, i) => {
        des = des + `
        order ${i + 1} : ${index.mealname} , quantity : ${index.quantity} 
        `
        total = (+index.price * +index.quantity) + total;
    })

    let meaPrice = total - +foodFees;

    Swal.fire({
        title: 'Are you sure to implement this request?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'done successfully',
                'Your order has been fulfilled.',
                'success'
            )
            setTimeout(() => {
                document.getElementById("buttonFeed").click();
            }, 1200)
            let select = 5,
                feedBack = "";
            document.getElementById("rating").addEventListener("change", (e) => {
                select = e.target.value;
            })
            let feed = document.getElementById("feedback");

            document.getElementById("feedBackButton").addEventListener("click", (e) => {
                feedBack = feed.value;
            })
            let dataUser = JSON.parse(localStorage.getItem("dataUser"))
            document.getElementById("bodyCart").innerHTML = "";
            document.getElementById("checkout").classList.add("checkNone")
            document.getElementById("totalPrice").innerHTML = "EGP 00.00";
            document.getElementById("totalAmount").innerHTML = "EGP " + foodFees + ".00";

            setTimeout(()=>{
                console.log("yes")
                const formData = new FormData();
                formData.append('userid', dataUser[0].id);
                formData.append('orderdetails', des);
                formData.append('totalPrice', total);
                formData.append('partnerid', idPage);
                formData.append('ratings', select);
                formData.append('feedback', feedBack);
                formData.append('fees', foodFees);
                formData.append('mealprice', meaPrice);
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'http://localhost/footer-hunter/implementation/makeOrder.php', true);
                xhr.send(formData);
            },10000)
        }
    })
})

