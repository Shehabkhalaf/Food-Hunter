// Get Element
let boxes = document.getElementById("boxes");

let checkInput = document.querySelectorAll('input[type="checkbox"]');

let choose = []

checkInput.forEach(element => {
    element.addEventListener("change", (e) => {
        if (choose.length === 0) {
            choose.push(e.target.value)
        } else {
            var check = choose.filter(ele => ele !== e.target.value);
            choose.length === check.length ? choose.push(e.target.value) : choose = check;
        }
        console.log(choose)
    })
});

document.getElementById("apply").addEventListener("click",()=>{
    choose.length === 0 ? showRest() : showRest(choose);
})

function showRest(choose = "") {
    boxes.innerHTML = "";
    fetch("http://localhost/footer-hunter/implementation/getAllpartners.php")
        .then(res => res.json())
        .then(dataAll => {
            dataAll.forEach(data => {
                if (choose ==="") {
                    let a = document.createElement("a");
                    a.href = "restaurantUser.html"
                    a.id = data.id;
                    a.classList.add("link")
                    a.innerHTML = `
                            <div class="box d-flex">
                                <img src=${data.logo} alt="">
                                <div class="details">
                                    <h5 id="nameRestaurants">${data.name}</h5>
                                    <p class="categories" id="categories">${data.category}</p>
                                    <p class="footer">Within <span id="timeDelivery">${data.time}</span>mins   Delivery:<span id="delivery">${data.fees}</span>   min:<span id="min">${data.minorder}</span></p>
                                </div>
                            </div>        
                            `
                    boxes.append(a);
                } else {
                    choose.forEach(element => {
                        if (data.category.split(",").includes(element)) {
                            let a = document.createElement("a");
                            a.href = "restaurantUser.html"
                            a.id = data.id;
                            a.classList.add("link")
                            a.innerHTML = `
                                    <div class="box d-flex">
                                        <img src=${data.logo} alt="">
                                        <div class="details">
                                            <h5 id="nameRestaurants">${data.name}</h5>
                                            <p class="categories" id="categories">${data.category}</p>
                                            <p class="footer">Within <span id="timeDelivery">${data.time}</span>mins   Delivery:<span id="delivery">${data.fees}</span>   min:<span id="min">${data.minorder}</span></p>
                                        </div>
                                    </div>        
                                    `
                            boxes.append(a);
                        }
                    })
                }
            });

            let links = document.querySelectorAll(".link");
            links.forEach(link => {
                link.addEventListener("click", () => {
                    localStorage.setItem("linkPage", JSON.stringify(link.getAttribute("id")));
                })
            })
        })

}

showRest();


let emailUser = JSON.parse(localStorage.getItem("emailUser"));

fetch(`http://localhost/footer-hunter/implementation/getUserData.php?email=${emailUser}`).then(res=>res.json()).then(data=>localStorage.setItem("dataUser",JSON.stringify(data)))